<?php
	session_start();
	require_once("conexion.php");
	
	$sql="INSERT INTO ganador (fecha, id_oferta)
	VALUES (CURDATE(), ".$_POST["winner"].")";
	$result=mysql_query($sql);
	$id_ganador = mysql_insert_id();
	
	$sql="UPDATE subasta
	SET id_ganador = ".$id_ganador."
	WHERE id_subasta = ".$_POST["id_subasta"];
	echo $sql;
	$resul=mysql_query($sql);
	
?>

<html>
<head>
</head>
<body>
<form id="mensaje" action="subastas.php" method="post">
<input type="hidden" name="msj_exito" value="El ganador fue registrado exitosamente">
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