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
AND s.estado=0
AND s.fecha_fin > CURDATE()
ORDER BY s.fecha_inicio desc";

$result=mysql_query($consul);
if (($result != false) && (mysql_num_rows($result) > 0)) {
?>
<table width="800px" align="left" border="1" style="margin: 15px 5px; background-color: white">

<tr>
<td valign="top" align="center" colspan="6" >
<h3>Subastas activas</h3>
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
		mostrar_subasta($subasta);
		mostrar_botones_vigente($subasta);
	}
?>
</table>
<?php
}
else {
	echo("Usted no tiene ninguna subasta activa");
}

$consul="SELECT *
FROM subasta s
INNER JOIN imagen i ON s.id_imagen = i.id_imagen
INNER JOIN categoria c ON s.id_categoria= c.id_categoria
WHERE s.nombre_usuario = '".$_SESSION["nombre_usuario"]."'
AND s.fecha_fin <= CURDATE()
ORDER BY s.fecha_inicio desc";

$result=mysql_query($consul);
if (($result != false) && (mysql_num_rows($result) > 0)) {
?>
<table width="800px" align="left" border="1" style="margin: 15px 5px; background-color: white">

<tr>
<td valign="top" align="center" colspan="5" >
<h3>Subastas finalizadas</h3>
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

</tr>
<?php
	while($subasta=mysql_fetch_array($result))
	{
		mostrar_subasta($subasta);
		mostrar_boton_finalizada($subasta);
	}
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
