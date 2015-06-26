<?php 
	session_start();
	include("vistaRegistrado.html"); 
	require_once("conexion.php");
	if(($_SESSION["nombre_usuario"])) {
		$sql="SELECT *
		FROM subasta
		WHERE id_subasta = ".$_GET["idSubasta"];
		$result=mysql_query($sql);
		if(mysql_num_rows($result) == 0) {
			echo "<script type='text/javascript'>
			alert('La subasta seleccionada no existe');
			window.location='subastas.php';
			</script>";
			die();
		}
		$subasta=mysql_fetch_array($result);
		if($subasta["nombre_usuario"] != $_SESSION["nombre_usuario"]) {
			echo "<script type='text/javascript'>
			alert('Acceso denegado: no es dueño de la subasta');
			window.location='subastas.php';
			</script>";
			die();
		}
		if(strtotime($subasta["fecha_fin"]) >= strtotime("today")) {
			echo "<script type='text/javascript'>
			alert('La subasta seleccionada aún está en curso');
			window.location='subastas.php';
			</script>";
			die();
		}
		if($subasta["id_ganador"] != NULL) {
			echo "<script type='text/javascript'>
			alert('La subasta seleccionada ya posee un ganador');
			window.location='subastas.php';
			</script>";
			die();
		}
		$sql="SELECT *
		FROM oferta
		WHERE id_subasta = ".$_GET["idSubasta"];
		$result=mysql_query($sql);
		if(mysql_num_rows($result) == 0) {
			echo("La subasta seleccionada no posee ninguna oferta");
		}
		else {
?>
<div id="div_ganador"></div>
<form name="ganador" action="addGanador.php" method="post">
<input type="hidden" name="id_subasta" value=<?php echo $subasta["id_subasta"] ?>>
<table width="100%" align="center" border="1" style="margin: 15px 5px; background-color: white">

<tr>
<td valign="top" align="center" colspan="5" >
<h3>Ofertas para "<?php echo $subasta["nombre_producto"];?>"</h3>
</td>
</tr>
<tr class="encabezado">

<td width="15%">
Usuario
</td>

<td width="15%";>
Fecha
</td>

<td width="10%">
Monto
</td>

<td width="45%">
Motivo
</td>

<td width="15%">
Ganador
</td>
<?php
			while($oferta=mysql_fetch_array($result)) {
?>
<tr>

<td width="15%"><center>
<?php
echo $oferta["nombre_usuario"];
?>
</td></center>

<td width="15%";><center>
<?php
$fecha = date_create($oferta["fecha"]);
		echo date_format($fecha, 'd-m-Y'); ?><br><?php
?>
</td></center>

<td width="10%"><center>
<?php
echo $oferta["monto"];
?>
</td></center>

<td width="45%"><center>
<?php
echo $oferta["descripcion"];
?></center>
</td>

<td width="15%"><center>
<input type="radio" name="winner" value=<?php echo $oferta["id_oferta"]; ?> /></center>
</td>
</tr>
<?php				
			}
?>
<td valign="top" align="center" colspan="5" >
<input type="button" class="button" value="Elegir ganador" title="Elegir ganador" onClick="verificarGanador()" style="margin: 5px" />
</td>
<?php
		}
?>
</table>
</form>


<?php
 }
	else {
		echo "<script type='text/javascript'>
		alert('Usted no esta logueado');
		window.location='index.php';
		</script>";
		die();
	}
?>