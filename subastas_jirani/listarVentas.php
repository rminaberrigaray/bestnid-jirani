<?php
	require_once("conexion.php");
	include("funcionesAdministrador.php");
?>
<script type="text/javascript" src="./calendario/calendarDateInput.js">

/***********************************************
* Jason's Date Input Calendar- By Jason Moon http://calendar.moonscript.com/dateinput.cfm
* Script featured on and available at http://www.dynamicdrive.com
* Keep this notice intact for use.
***********************************************/

</script>

<script type="text/javascript">
	var a = document.getElementById("ventas");
	a.className = "active";
</script>

<?php if(isset($_POST["msj_mensaje"])) {?> <div id="msj" class="mensaje"> <?php echo $_POST["msj_mensaje"]; ?> </div> <?php } ?>

<form name="consulta_ventas" method="post" action="listarVentas.php">
<div id="div_fechas"></div>
<table style="width:50%; background-color: white; border: 1px solid;">
  <tr>
	  <td valign="top" align="center" colspan="3" >
	  Filtrar ventas entre dos fechas
	  </td>
  </tr>
  <tr>
	  <td>
	  Fecha inicial:
	  </td>
	  <td>
	  Fecha final:
	  </td>
  </tr>
  <tr>
	<td>
	<script>DateInput('fecha_ini', true, 'YYYY-MM-DD', '<?php echo date("Y-M-d", (isset($_POST["fecha_ini"])) ? strtotime($_POST["fecha_ini"]) : strtotime("today")) ?>')</script>
	</td>
    <td>
	<script>DateInput('fecha_fin', true, 'YYYY-MM-DD', '<?php echo date("Y-M-d", (isset($_POST["fecha_fin"])) ? strtotime($_POST["fecha_fin"]) : strtotime("today")) ?>')</script>
	</td>		
    <td>
	<input type="button" value="Filtrar" title="Filtrar usuarios" onClick="verificarFechas()"/>
	</td>
  </tr>
</table>
</form>



<?php
	$sql="SELECT *,
     	s.nombre_usuario as vendedor,
		o.nombre_usuario as comprador,
		g.fecha as fecha_venta 
		FROM ganador g INNER JOIN oferta o ON g.id_oferta = o.id_oferta 
		INNER JOIN subasta s ON o.id_subasta = s.id_subasta";
	if(isset($_POST["fecha_ini"])) {
		$fec_ini=strtotime($_POST["fecha_ini"]);
		$fec_ini=date("Y-m-d", $fec_ini);
		$fec_fin=strtotime($_POST["fecha_fin"]);
		$fec_fin=date("Y-m-d", $fec_fin);
		$sql = $sql." WHERE g.fecha BETWEEN '".$fec_ini."'
		AND '".$fec_fin."'";
	}
		
		$result=mysql_query($sql);
	$cant=mysql_num_rows($result);
?>

Cantidad de ventas listadas: <?php echo $cant;
if ($cant != 0) {
?>
<table width="100%" align="center" border="1" style="margin: 15px 5px; background-color: white">

<tr class="caption">
<td colspan="5">
Ventas
</td>
</tr>
<tr class="encabezado">

<td width="20%">
Vendedor
</td>

<td width="30%">
Producto
</td>

<td width="20%";>
Fecha
</td>

<td width="10%">
Monto
</td>

<td width="20%">
Ganador
</td>
</tr>
<?php
			while($venta=mysql_fetch_array($result)) {
?>

<td width="20%"><center>
<?php
echo $venta["vendedor"];
?>
</td></center>

<td width="30%";><center>
<?php
echo $venta["nombre_producto"];
?>
</td></center>

<td width="20%"><center>
<?php
$fecha = date_create($venta["fecha_venta"]);
		echo date_format($fecha, 'd-m-Y'); ?><br><?php
?>
</td></center>

<td width="10%"><center>
<?php
echo $venta["monto"];
?></center>
</td>

<td width="20%"><center>
<?php
echo $venta["comprador"];
?> </center>
</td>
</tr>

<?php
			}
	}
?>