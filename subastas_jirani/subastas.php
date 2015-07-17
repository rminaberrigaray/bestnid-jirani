<?php 
  session_start();
  require_once("conexion.php");
  if(isset($_SESSION["nombre_usuario"]))
  {
    include("vistaRegistrado.html"); 
?>

<script type="text/javascript">
	var a = document.getElementById("subastas");
	a.className = "active";
</script>

<?php if(isset($_POST["msj_exito"])) {?> <div class="exito"> <?php echo $_POST["msj_exito"]; ?> </div> <?php } ?>
<?php if(isset($_POST["msj_error"])) {?> <div class="error"> <?php echo $_POST["msj_error"]; ?> </div> <?php } ?>
<?php if(isset($_POST["msj_mensaje"])) {?> <div class="mensaje"> <?php echo $_POST["msj_mensaje"]; ?> </div> <?php } ?>

<center><a href="subastar.php">
<input type="button" value="Realizar una subasta" class="button" title="Subastar"/></a></center>

<?php
$consul="SELECT *
FROM subasta s
INNER JOIN imagen i ON s.id_imagen = i.id_imagen
INNER JOIN categoria c ON s.id_categoria= c.id_categoria
WHERE s.nombre_usuario = '".$_SESSION["nombre_usuario"]."' 
AND s.estado=0
AND s.fecha_fin > NOW()
ORDER BY s.fecha_inicio desc";

$result=mysql_query($consul);
if (($result != false) && (mysql_num_rows($result) > 0)) {
?>
<table width="100%" align="left" border="1" style="margin: 15px 5px; background-color: white">

<tr>
<td class="caption" colspan="6" >
Subastas activas
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
AND s.fecha_fin <= NOW()
AND s.estado = 0
ORDER BY s.fecha_inicio desc";

$result=mysql_query($consul);
if (($result != false) && (mysql_num_rows($result) > 0)) {
?>
<table width="100%" align="left" border="1" style="margin: 15px 5px; background-color: white">

<tr>
<td class="caption" colspan="5" >
Subastas finalizadas
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
		if($subasta["id_ganador"] != NULL){
		   mostrar_boton_ganador($subasta);
		}
		else {
		mostrar_boton_finalizada($subasta);
		}
	}
}
?>
</table>
<br>
</body>
</html>
<?php
}
else
{

?>
<form id="mensaje" action="index.php" method="post">
<input type="hidden" name="msj_mensaje" value="Usted no está logueado">
</form>

<script type="text/javascript">
    function enviarMsj () {
        var frm = document.getElementById("mensaje");
        frm.submit();
    }
    window.onload = enviarMsj;
</script>	 

	 
<?php	   
   }
?>