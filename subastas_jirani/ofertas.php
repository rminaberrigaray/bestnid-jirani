<?php 
	session_start();
	require_once("conexion.php");
	if((isset($_SESSION["nombre_usuario"])))
	{
		include("vistaRegistrado.html");

		$sql="SELECT *,
		o.descripcion AS motivo
		FROM oferta o
		INNER JOIN subasta s ON o.id_subasta = s.id_subasta
		INNER JOIN imagen i ON s.id_imagen = i.id_imagen
		WHERE o.nombre_usuario = '".$_SESSION["nombre_usuario"]."'
		AND s.fecha_fin > NOW()
		AND eliminado IS NULL";
		$result=mysql_query($sql);
		if(mysql_num_rows($result) == 0) {
			echo("<div class=\"mensaje\">Usted no tiene ninguna oferta pendiente</div>");
		}
		else {
?>

<?php if(isset($_POST["msj_exito"])) {?> <div class="exito"> <?php echo $_POST["msj_exito"]; ?> </div> <?php } ?>
<?php if(isset($_POST["msj_mensaje"])) {?> <div class="mensaje"> <?php echo $_POST["msj_mensaje"]; ?> </div> <?php } ?>

<table width="100%" align="center" border="1" style="margin: 15px 5px; background-color: white">

<tr>
<td class="caption" colspan="7" >
Mis ofertas pendientes
</td>
</tr>
<tr class="encabezado">

<td width="15%">
Producto
</td>

<td width="15%">
Imagen
</td>

<td width="10%";>
Fecha
</td>

<td width="10%">
Monto
</td>

<td width="20%">
Motivo
</td>

<td width="15%">

</td>

<td width="15%">

</td>

<?php
			while($oferta=mysql_fetch_array($result)) {
					mostrar_oferta($oferta);
					mostrar_boton_pendiente($oferta);
			}
		}
?>
</table>

<?php
 $sql="SELECT *,
		o.descripcion AS motivo
		FROM oferta o
		INNER JOIN subasta s ON o.id_subasta = s.id_subasta
		INNER JOIN imagen i ON s.id_imagen = i.id_imagen
		WHERE o.nombre_usuario = '".$_SESSION["nombre_usuario"]."'
		AND s.fecha_fin <= NOW()
		AND eliminado IS NULL";
		$result=mysql_query($sql);
		if(mysql_num_rows($result) == 0) {
			echo("<div class=\"mensaje\">Usted no tiene ofertas finalizadas</div>");
		}
		else {
?>

<table width="100%" align="center" border="1" style="margin: 15px 5px; background-color: white">

<tr>
<td class="caption" colspan="6" >
Mis ofertas finalizadas
</td>
</tr>
<tr class="encabezado">

<td width="15%">
Producto
</td>

<td width="15%">
Imagen
</td>

<td width="15%";>
Fecha
</td>

<td width="10%">
Monto
</td>

<td width="30%">
Motivo
</td>

<td width="15%">
Es ganador
</td>

<?php
			while($oferta=mysql_fetch_array($result)) {
					mostrar_oferta($oferta);
					mostrar_ganador($oferta);
			}
		}
?>
</table>

<?php
 }
	else {
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