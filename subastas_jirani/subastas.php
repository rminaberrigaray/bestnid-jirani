<?php 
  session_start();
  include("vistaRegistrado.html"); 
  require_once("conexion.php");
  if(($_SESSION["nombre_usuario"]))
  {
?>

<script type="text/javascript">
	var a = document.getElementById("subastas");
	a.className = "active";
</script>




<?php
$consul="SELECT *
FROM subasta s
INNER JOIN imagen i ON s.id_imagen = i.id_imagen
INNER JOIN categoria c ON s.id_categoria= c.id_categoria
WHERE s.nombre_usuario = '".$_SESSION["nombre_usuario"]."'
ORDER BY s.fecha_inicio desc";

$result=mysql_query($consul);
if ($result != false) {
?>
<table width="800px" align="left" border="1">

<tr>
<td valign="top" align="center" colspan="6" >
<h3>Mis subastas</h3>
</td>
</tr>
<tr class="encabezado">

<td width="30px">
Imagen
</td>

<td width="20%";>
Vigencia
</td>

<td width="100px">
Nombre
</td>

<td width="100px">
Categoría
</td>

<td width="25px">&nbsp;

</td>
<td width="25px">&nbsp;

</td>
</tr>

<?php
while($subasta=mysql_fetch_array($result))
{
?>
<tr class="registros">

<td width="30px"><center>
<?php
echo '<img src="data:image/jpeg;base64,'.base64_encode($subasta["imagen"]).'" style="margin-left: 25px;  width: 150px;
  height: 100px;"/>';
?>
</td></center>

<td width="20%";><center style="width: 100%;">
<?php
$fecha = date_create($subasta["fecha_inicio"]);
		echo date_format($fecha, 'd-m-Y H:i:s'); ?><br><?php
$fecha = date_create($subasta["fecha_fin"]);
		echo date_format($fecha, 'd-m-Y H:i:s');
?>
</td></center>

<td width="100px"><center>
<?php
echo $subasta["nombre_producto"];
?>
</td></center>

<td width="100px"><center>
<?php
echo $subasta["nombre"];
?></center>
</td>

<td width="100px"><center>
<a href="modificarSubasta.php?idSubasta=<?php echo $subasta["id_subasta"];?>">
<input type="button" value="Editar" class="button" title="Editar"/> </a>
</center>
</td>

<td width="100px"><center>
<a href="javascript:void(0)" onClick="eliminarSubasta('<?php echo $subasta["id_subasta"];?>')" >
<input type="button" value="Eliminar" class="button" title="Eliminar"/></a>
</center>
</td>
</tr>
<?php
}
}
else {
	echo("Usted no ha realizado ninguna subasta");
}
?>



</table>
<br><center><a href="subastar.php">
<input type="button" value="Realizar una subasta" class="button" title="Subastar"/></a></center>
</body>  
</html>
<?php
   }
   else
   {
	   echo "<script type='text/javascript'>
	   alert('Usted no esta logueado');
	   window.location='index.php';
	   </script>";
   }
?>
