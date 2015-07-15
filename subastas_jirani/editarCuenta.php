<?php 
	session_start();
	if((isset($_SESSION["nombre_usuario"])))
	{
		require_once("conexion.php");
		$sql="UPDATE usuario SET
		email = '".$_POST["email"]."',
		contraseña = '".$_POST["contraseña"]."',
		nombre = '".$_POST["nombre"]."',
		apellido = '".$_POST["apellido"]."'
		WHERE nombre_usuario = '".$_POST["nombre_usuario"]."'";
		$result=mysql_query($sql);
?>
<form id="mensaje2" action="perfil.php" method="post">
<input type="hidden" name="msj_exito" value="Sus datos fueron modificados correctamente">
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