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
<section id="detalles">
<div class="registros">
<div> <h3>
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
 
?>

</div>
<div> <h3>Categoría:</h3>
<?php
echo $subasta["nombre"];
?></div><br>

</div>
</section>
<section id="comenta">
<h4>
    <label>Pregunta:</label><br>
   <?php
    $consul="SELECT * FROM comentario 
    WHERE id_subasta =".$_GET["idSubasta"]."";
    $result=mysql_query($consul);
	
    while($coment=mysql_fetch_array($result)) {
    ?>
	<div class="nombre">
	nely
	</div>
	<div class="comentario" style="color: #F04646;">
     <?php echo $coment["texto_pregunta"] ?>
	</div>
    <?php
	}
	?>
   
   
   <br>
   <form name="pregunta" method="post" action="pregunta.php">
	
     <label>Comentario:</label><br>
	 <div id="div_descripcion"></div>
     <textarea type="text" name="pregunta" cols="50" rows="5" maxlength="255" onKeyDown="cuenta()" onKeyUp="cuenta()"></textarea><br>
   	 <div id="chars" style="font-size:12px">Caracteres restantes: 255</div>
	 <br>
	 
	 <input type="hidden" name="id_subasta" value=<?php echo $_GET["idSubasta"]; ?>>
	 
     <input type="submit" value="Enviar" title="Enviar"/>
     
   </form>
   <br>
   
   
   <h4>
</section>



</body>  
</html>