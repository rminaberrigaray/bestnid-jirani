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
	var a = document.getElementById("usuarios");
	a.className = "active";
</script>

<form name="consulta_ventas" method="post" action="verUsuarios.php">
<div id="div_fechas"></div>
<table style="width:50%; background-color: white; border: 1px solid;">
  <tr>
	  <td valign="top" align="center" colspan="3" >
	  Filtrar usuarios entre dos fechas
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
	$sql="SELECT * FROM usuario";
	if(isset ($_POST["fecha_ini"])) {
		$fec_ini=strtotime($_POST["fecha_ini"]);
		$fec_ini=date("Y-m-d", $fec_ini);
		$fec_fin=strtotime($_POST["fecha_fin"]);
		$fec_fin=date("Y-m-d", $fec_fin);
		$sql=$sql." WHERE fecha_alta BETWEEN '".$fec_ini."' AND '".$fec_fin."'";
	}
	$sql=$sql." ORDER BY fecha_alta";
	$result=mysql_query($sql);
	$cant=mysql_num_rows($result);
?>

Cantidad de usuarios listados: <?php echo $cant; 
if ($cant != 0 ) {
?>
<table width="80%" border="1" style="background-color: white">

<tr>
<td class="caption" colspan="4" >
Usuarios registrados
</td>
</tr>
<tr class="encabezado">

<td width="20%">
Nombre de usuario
</td>

<td width="20%">
Fecha de alta
</td>

<td width="30%";>
Nombre y apellido
</td>

<td width="30%">
Email
</td>

<?php
	while($usuario=mysql_fetch_array($result)) {
?>
<tr>
	<td width="20%"><center>
	<?php
	echo $usuario["nombre_usuario"];
	?>
	</td></center>

	<td width="20%"><center>
	<?php
	$fecha = date_create($usuario["fecha_alta"]);
	echo date_format($fecha, 'd-m-Y'); 
	?>
	</td></center>

	<td width="30%";><center>
	<?php
	echo $usuario["nombre"]." ".$usuario["apellido"];
	?>
	</td></center>

	<td width="30%"><center>
	<?php
	echo $usuario["email"];
	?>
	</td></center>

</tr>
<?php
	}
}
?>
</table>