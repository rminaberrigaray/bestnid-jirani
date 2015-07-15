<?php 
	session_start();
	require_once("conexion.php");
	if((isset($_SESSION["nombre_usuario"])))
	{
		include("vistaRegistrado.html");
		$sql="SELECT *
		FROM usuario
		WHERE nombre_usuario = '".$_SESSION["nombre_usuario"]."'";
		$result=mysql_query($sql);
		$usr=mysql_fetch_array($result);
?>

<style>
	input.perf {
		float: right;
		margin: 5px 0px;
		padding: 5px;
		width: 40%;
	}
	
	label {
		float: left;
		margin: 5px 0px;
		padding: 5px;
		width: 40%;
	}
</style>

<?php if(isset($_POST["msj_exito"])) {?> <div class="exito"> <?php echo $_POST["msj_exito"]; ?> </div> <?php } ?>

<form name="modificar" action="editarCuenta.php" method="post">

<div class="perfil">

<label>Nombre de usuario:</label>
<input type="text" name="nombre_usuario" class="perf" readonly value="<?php echo $usr["nombre_usuario"]; ?>" style="background-color: #F0EAD5">
<br>

<label>Contraseña (<a href="javascript:void(0)" id="swap" onclick="mostrarOcultar()">mostrar</a>):</label> 
<input id="pass" type="password" name="contraseña" class="perf" value="<?php echo $usr["contraseña"]; ?>" required>
<br>

<label>Nombre:</label>
<input type="text" name="nombre" class="perf" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ']{2,25}" value="<?php echo $usr["nombre"]; ?>" required oninput="checkName(this)">
<br>

<label>Apellido:</label>
<input type="text" name="apellido" class="perf" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ']{2,25}" value="<?php echo $usr["apellido"]; ?>" required oninput="checkSurname(this)">
<br>

<label>E-mail:</label>
<input type="email" name="email" class="perf" value="<?php echo $usr["email"]; ?>" required >

</div>
<br>
<hr>

<center>

<input type="submit" value="Guardar cambios" class="button" title="Guardar cambios" />
</form>
&nbsp &nbsp &nbsp
<a href="javascript:void(0)" onClick="eliminarCuenta('<?php echo $_SESSION["nombre_usuario"];?>')" >
<input type="button" value="Eliminar mi cuenta" class="button" title="Eliminar mi cuenta"/></a>

</center>

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