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
	
	echo "<script type=''>
	     alert('Su oferta ha sido registrada');
	     window.location='ofertas.php';
		 echo 
         </script>";	
?>