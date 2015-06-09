<?php
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