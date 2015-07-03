<?php 
  session_start();
  if((isset($_SESSION["nombre_usuario"])))
  {
	require_once("conexion.php");
	include("vistaRegistrado.html");
	
  	 $sql="update comentario set
	 fecha_hora_respuesta=CURDATE(),
	 texto_respuesta='".$_POST["texto"]."'
	 WHERE id_comentario=".$_POST["idComentario"]."";
	 $resul=mysql_query($sql);
	
	 echo "<script type=''>
	     alert('Se ha enviado su respuesta');
	     window.location='verProducto.php?idSubasta=+".$_POST["id_subasta"]."';
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