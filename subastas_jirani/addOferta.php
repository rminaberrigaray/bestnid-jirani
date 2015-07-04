<?php
	session_start();
	require_once("conexion.php");
	
	$sql="INSERT INTO oferta (nombre_usuario, descripcion, fecha, monto, id_subasta)
	VALUES ('".$_SESSION["nombre_usuario"]."',
	'".$_POST["descripcion"]."',
	CURDATE(),
	".$_POST["monto"].",
	".$_POST["id_subasta"].")";
	$resul=mysql_query($sql);
	
?>

<html>
<head>
</head>
<body>
<form id="mensaje" action="ofertas.php" method="post">
<input type="hidden" name="msj_exito" value="Su oferta ha sido registrada">
</form>

<script type="text/javascript">
    function enviarMsj () {
        var frm = document.getElementById("mensaje");
        frm.submit();
    }
    window.onload = enviarMsj;
</script>

</body>
</html>