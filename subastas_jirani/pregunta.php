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
	'".$_POST["pregunta"]."',
	".$_POST["id_subasta"].",
	null,null)";
	
	$resul=mysql_query($sql);
	
	echo "<script type=''>
	     alert('Se ha enviado su comentario');
	     window.location='subastas.php';
         </script>";
	
  }

   else
   {
	   echo "<script type='text/javascript'>
	   alert('Para comentar necesita registrarse');
	   window.location='registrarse.php';
	   </script>";
   }
?>