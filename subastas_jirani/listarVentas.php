<?php
	require_once("conexion.php");
	include("funcionesAdministrador.php");
	$fec_ini=strtotime($_POST["fecha_ini"]);
	$fec_ini=date("Y-m-d", $fec_ini);
	$fec_fin=strtotime($_POST["fecha_fin"]);
	$fec_fin=date("Y-m-d", $fec_fin);
	$sql="SELECT *,
     	s.nombre_usuario as vendedor,
		o.nombre_usuario as comprador,
		g.fecha as fecha_venta 
		FROM ganador g INNER JOIN oferta o ON g.id_oferta = o.id_oferta 
		INNER JOIN subasta s ON o.id_subasta = s.id_subasta
		WHERE g.fecha BETWEEN '".$fec_ini."'
		AND '".$fec_fin."'";
		
		$result=mysql_query($sql);
	if(mysql_num_rows($result) == 0) {
		echo "<script type=''>
			alert('No se realizó ninguna venta entre las fechas seleccionadas');
			window.location='consultaVentas.php';
			</script>";
	}
	else {
	?>
<table width="100%" align="center" border="1" style="margin: 15px 5px; background-color: white">

<tr>
<td valign="top" align="center" colspan="5" >
<h3>Ventas</h3>
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