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
	
	header("Location: subastas.php");
	die();
?>