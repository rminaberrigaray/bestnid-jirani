<?php

   session_start();
   if(isset($_SESSION["nombre_usuario"]))
   { 
	include("vistaRegistrado.html");
   }
   
   else     
       {
	   echo "<script type='text/javascript'>
	   alert('Usted no esta logueado');
	   window.location='index.php';
	   </script>";
	   }
	   
   
?>
<script type="text/javascript">
	var a = document.getElementById("contacto");
	a.className = "active";
</script>