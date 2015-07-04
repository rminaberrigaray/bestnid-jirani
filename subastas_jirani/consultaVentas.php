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

<?php if(isset($_POST["msj_mensaje"])) {?> <div class="mensaje"> <?php echo $_POST["msj_mensaje"]; ?> </div> <?php } ?>

<form name="consulta_ventas" method="post" action="listarVentas.php">

<label>Fecha inicial:</label><br>
	 <div id="div_fechas"></div>
	 <script>DateInput('fecha_ini', true, 'YYYY-MM-DD', '<?php echo date("Y-M-d", strtotime("today")) ?>')</script>
	 <br>
	 <label>Fecha final:</label><br>
	 <script>DateInput('fecha_fin', true, 'YYYY-MM-DD', '<?php echo date("Y-M-d", strtotime("today")) ?>')</script>
	 <hr>
	 <input type="button" value="Consultar" title="Consultar" onClick="verificarFechas()"/>

</form>
