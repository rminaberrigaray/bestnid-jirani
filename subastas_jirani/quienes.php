<?php
<<<<<<< HEAD
   session_start();
   if(isset($_SESSION["nombre_usuario"]))
   { 
	include("vistaRegistrado.html");
   }
   
   else     
       {
	   include("vistaVisitante.html");
	   }
	   
   
?>
=======
   require_once("conexion.php");
   session_start();
   if(isset($_SESSION['nombre_usuario']))
   { include("vistaRegistrado.html");}
   
   else{include("vistaVisitante.html");}
 ?> 

>>>>>>> origin/master
