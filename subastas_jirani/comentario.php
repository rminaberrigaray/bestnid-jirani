<?php 
  session_start();
  if((isset($_SESSION["nombre_usuario"])))
  {
	require_once("conexion.php");
	include("vistaRegistrado.html");
	
  	  $sql="INSERT INTO comentario (nombre_usuario, fecha_hora_pregunta, texto_pregunta, 
	  id_subasta, fecha_hora_respuesta, texto_respuesta)
	  VALUES ('".$_SESSION["nombre_usuario"]."',
	  NOW(),
	  '".$_POST["texto"]."',
	  ".$_POST["id_subasta"].",
	  null,null)";
	
	  $resul=mysql_query($sql);
	
	  echo "<script type=''>
	     alert('Se ha enviado su comentario');
	     window.location='verProducto.php?idSubasta=+".$_POST["id_subasta"]."';
         </script>";
	}
	die();
?>