<?php
	session_start();
	require_once("conexion.php");
	
	$sql="update categoria set
	nombre = '".$_POST["nombre"]."'
	WHERE id_categoria =".$_POST["idCategoria"]."";
	
	$res=mysql_query($sql);
	
?>

<html>
<head>
</head>
<body>
<form id="mensaje" action="verCategorias.php" method="post">
<input type="hidden" name="msj_exito" value="La categoria ha sido modificada">
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