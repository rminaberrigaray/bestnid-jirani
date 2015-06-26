<?php
  session_start();
  if($_SESSION["nombre_usuario"])
   {
      require_once("conexion.php");
      $sql="update subasta set
	  estado='1'
	  where id_subasta = ".$_GET["idSubasta"]."";
	  $res=mysql_query($sql);
	  
	  echo "<script type=''>
	     alert('La subasta fue dada de baja correctamente');
	     window.location='subastas.php';
         </script>";
   }
    else
	{
	 echo "<script type='javascript'>
	 alert('Usted no se encuentra logueado');
	 window.location='../index.php';
	 </script>";
	
	}

?>