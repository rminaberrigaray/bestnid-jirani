<?php
   session_start();
   if($_SESSION["nombre_usuario"])
   {
    require_once("conexion.php");
	
	if ($_FILES["imagen"]["tmp_name"] != "") {
		$fp = fopen ($_FILES["imagen"]["tmp_name"], 'r');
		if ($fp) {
			$datos = fread ($fp, filesize($_FILES["imagen"]["tmp_name"]));
			$datos = addslashes($datos);
		}
		fclose($fp);
	
		$sql="update imagen set
		nombre='".$_FILES["imagen"]["name"]."',
		imagen='".$datos."',
		tipo='".$_FILES["imagen"]["type"]."'
		where id_imagen=".$_POST["id_imagen"]."";
	
		$res=mysql_query($sql);
	}
	
	$sql="update subasta set
	nombre_producto='".$_POST["nombre"]."',
	descripcion='".$_POST["descripcion"]."',
	id_imagen='".$_POST["id_imagen"]."',
	id_categoria='".$_POST["categoria"]."',
	id_ganador=NULL
	WHERE id_subasta=".$_POST["id_subasta"]."";
	
	$res=mysql_query($sql);
	echo "<script type=''>
	     alert('La subasta fue modificada correctamente');
	     window.location='subastas.php';
         </script>";
  }
	else
	    {
	     echo "<script type=''>
	     alert('Usted no se encuentra logueado');
	     window.location='index.php';
         </script>";
	    }
	
	die();
?>