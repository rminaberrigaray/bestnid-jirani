<?php
	session_start();
	require_once("conexion.php");
	
	$fec=strtotime($_POST["fecha_fin"]." ".$_POST["hora"]);
	$fec=date("Y-m-d H:i:s", $fec);
	
	$fp = fopen ($_FILES["imagen"]["tmp_name"], 'r');
	if ($fp) {
		$datos = fread ($fp, filesize($_FILES["imagen"]["tmp_name"]));
		$datos = addslashes($datos);
	}
	fclose($fp);
	$sql="INSERT INTO imagen (nombre, imagen, tipo)
	VALUES ('".$_FILES["imagen"]["name"]."',
	'".$datos."',
	'".$_FILES["imagen"]["type"]."')";
	$resul=mysql_query($sql);
	$id_img = mysql_insert_id();
	
	$sql="SELECT id_categoria
	FROM categoria
	WHERE nombre = '".$_POST["categoria"]."'";
	$result=mysql_query($sql);
	$cat=mysql_fetch_array($result);
	$id_cat = $cat["id_categoria"];
	
	$sql="INSERT INTO subasta (nombre_producto, descripcion, nombre_usuario, fecha_inicio, fecha_fin, id_imagen, id_categoria, id_ganador, estado)
	VALUES ('".$_POST["nombre"]."',
	'".$_POST["descripcion"]."',
	'".$_SESSION["nombre_usuario"]."',
	NOW(),
	'".$fec."',
	".$id_img.",
	".$id_cat.",
	NULL,
	0)";
	$res=mysql_query($sql);
	
	echo "<script type=''>
	     alert('Su subasta ha sido registrada');
	     window.location='subastas.php';
		 echo 
         </script>";	
?>