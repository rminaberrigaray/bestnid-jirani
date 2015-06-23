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





</body>  
</html>