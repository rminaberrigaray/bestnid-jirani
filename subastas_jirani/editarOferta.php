<?php
	session_start();
	require_once("conexion.php");
	
	$sql="update oferta set
	descripcion = '".$_POST["descripcion"]."',
	monto = '".$_POST["monto"]."',
	fecha = CURDATE()
	WHERE id_oferta=".$_POST["id_oferta"]."";
	
	$res=mysql_query($sql);
	
?>

<html>
<head>
</head>
<body>
<form id="mensaje" action="ofertas.php" method="post">
<input type="hidden" name="msj_exito" value="Su oferta ha sido modificada">
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