<?php
	session_start();
	require_once("conexion.php");
	
	$sql="INSERT INTO oferta (nombre_usuario, descripcion, fecha, monto, id_subasta)
	VALUES ('".$_SESSION["nombre_usuario"]."',
	'".$_POST["descripcion"]."',
	CURDATE(),
	".$_POST["monto"].",
	".$_POST["id_subasta"].")";
	echo $sql;
	$resul=mysql_query($sql);
	
	header("Location: ofertas.php");
	die();
?>