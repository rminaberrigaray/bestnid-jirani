<?php
   include("vistaRegistrado.html");
   require_once("conexion.php");
   session_start();
   if(($_SESSION["nombre_usuario"]))
    {
?>
<?php
   }
   else
   {
	   echo "<script type='text/javascript'>
	   alert('Usted no esta logueado');
	   window.location='index.php';
	   </script>";
   }
?>