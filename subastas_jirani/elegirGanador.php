<?php 
	session_start();
	require_once("conexion.php");
	if(isset($_SESSION["nombre_usuario"])) {
		include("vistaRegistrado.html"); 
		$err=FALSE;
		if(isset($_GET["idSubasta"])) {
			$sql="SELECT *
			FROM subasta
			WHERE id_subasta = ".$_GET["idSubasta"];
			$result=mysql_query($sql);
			if(mysql_num_rows($result) == 0) {
				$msj="La subasta seleccionada no existe";
				$err=TRUE;
				$tipo="msj_error";
			}
			$subasta=mysql_fetch_array($result);
		}
		else {
			$err=TRUE;
			$tipo="msj_error";
			$msj="No seleccionó ninguna subasta";
		}
		if( !$err && ($subasta["nombre_usuario"] != $_SESSION["nombre_usuario"])) {
			$msj="Acceso denegado: no es dueño de la subasta";
			$err=TRUE;
			$tipo="msj_error";
		}
		if( !$err && (strtotime($subasta["fecha_fin"]) >= strtotime("today")) ) {
			$msj="La subasta seleccionada aún está en curso";
			$err=TRUE;
			$tipo="msj_mensaje";
		}
		if( !$err && ($subasta["id_ganador"] != NULL)) {
			$msj="La subasta seleccionada ya posee un ganador";
			$err=TRUE;
			$tipo="msj_mensaje";
		}
		
		if($err) {
?>
<form id="mensaje" action="subastas.php" method="post">
<input type="hidden" name="<?php echo $tipo ?>" value="<?php echo $msj ?>">
</form>

<script type="text/javascript">
    function enviarMsj () {
        var frm = document.getElementById("mensaje");
        frm.submit();
    }
    window.onload = enviarMsj;
</script>
<?php
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
?>
<form id="mensaje2" action="index.php" method="post">
<input type="hidden" name="msj_mensaje" value="Usted no está logueado">
</form>

<script type="text/javascript">
    function enviarMsj2 () {
        var frm = document.getElementById("mensaje2");
        frm.submit();
    }
    window.onload = enviarMsj2;
</script>
	 
<?php	   
	}
?>