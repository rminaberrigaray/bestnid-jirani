<?php
   require_once("conexion.php");
   session_start();
   if(isset($_SESSION["nombre_usuario"]))
   { 
	include("vistaRegistrado.html");
   }
   
   else     
       {include("vistaVisitante.html");}
  
 ?> 
<script type="text/javascript">
	var a = document.getElementById("index");
	a.className = "active";
</script>

<?php
$consul="SELECT *
FROM subasta s
INNER JOIN imagen i ON s.id_imagen = i.id_imagen
INNER JOIN categoria c ON s.id_categoria= c.id_categoria
WHERE s.id_subasta =".$_GET["idSubasta"]."
";
$result=mysql_query($consul);
$subasta=mysql_fetch_array($result);
?>

<div class="registros">
<div> <h3>
<form method="post" action="ofertar.php">
<input type="hidden" name="id_subasta" value="<?php echo $subasta["id_subasta"]; ?>">
<input style="margin-left:300px; margin-top:10px;" type="submit"  class="button" value="Ofertar" title="Ofertar">
</form>
<?php
echo $subasta["nombre_producto"];?></h3></div><br>
<?php
echo '<img src="data:image/jpeg;base64,'.base64_encode($subasta["imagen"]).'" style="margin-left: px;"/>';?>
<br>
<div> <h3>Descripción:</h3>
<?php
echo $subasta["descripcion"];?></div><br>
<div><h3>Vigencia:</h3>
<?php
$fecha = date_create($subasta["fecha_inicio"]);
		echo date_format($fecha, 'd-m-Y H:i:s'); ?><br><?php
$fecha = date_create($subasta["fecha_fin"]);
		echo date_format($fecha, 'd-m-Y H:i:s');
 
?></div>
<div> <h3>Categoría:</h3>
<?php
echo $subasta["nombre"];
?></div><br>
</div>
<hr>
<h4>
    
<?php  
if(isset($_SESSION["nombre_usuario"]))
  { ?>
    <br>
    <form id="comentario" method="post" action="comentario.php">
	
     <label>Comentario:</label><br>
	 <div id="div_comentario"></div>
     <textarea type="text" id="texto" name="texto" cols="50" rows="5"></textarea>
	 <br>
     
	 <input type="hidden" name="id_subasta" value="<?php echo $subasta["id_subasta"];?>">
	
     <input type="submit" value="Enviar" title="Enviar" /> 
   </form>
   
   
	<br>
<?php
  }
   $consul="SELECT *, 
	c.nombre_usuario as pregunta, 
	s.nombre_usuario as responde 
	FROM comentario c INNER JOIN subasta s ON c.id_subasta = s.id_subasta
	WHERE c.id_subasta  =".$_GET["idSubasta"]."
	ORDER BY c.fecha_hora_pregunta DESC";
    $result=mysql_query($consul);
	
while($coment=mysql_fetch_array($result)) {
?>
	 <label>Pregunta:</label><br>
	 <div class="nombre">
	 <?php echo $coment["pregunta"];?>&nbsp;<?php
	 $fecha = date_create($coment["fecha_hora_pregunta"]);
     echo date_format($fecha, 'd-m-Y'); ?>
	 </div>
	 
	 <div class="comentario" style="color: #F04646;">
     <?php echo $coment["texto_pregunta"] ?>
	 </div>
    
	 <?php
	 if(($coment["texto_respuesta"] == null)&&(isset($_SESSION["nombre_usuario"])))
	 { ?>
	   <form name="comentario" method="post" action="respuesta.php">
	   <input type="hidden" name="idComentario" value="<?php echo $coment["id_comentario"]; ?>">
	   <input type="hidden" name="id_subasta" value="<?php echo $coment["id_subasta"];?>">
	   <input type="submit" name="respuesta" value="Responder" title="Responder"/>
	   </form><br>
       <?php
	 }
	  else {
		if($coment["texto_respuesta"] != null)
	    { ?>
	    <div style="margin-left: 50px;">
	    <label>Respuesta:</label><br>
	    <div class="nombre">
	    <?php echo $coment["responde"];?>&nbsp;<?php
	    $fecha = date_create($coment["fecha_hora_respuesta"]);
        echo date_format($fecha, 'd-m-Y'); ?> </div>
	    <div class="comentario" style="color: #F04646;">
        <?php echo $coment["texto_respuesta"] ?> </div>
		</div>
	    <?php
	   }
	  }
}
?>

</body>  
</html>