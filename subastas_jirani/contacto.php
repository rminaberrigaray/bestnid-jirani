<?php

   session_start();
<<<<<<< HEAD
   if(isset($_SESSION["nombre_usuario"]))
   { 
	include("vistaRegistrado.html");
=======
   if(($_SESSION["nombre_usuario"]))
    {
?>
 
</body>  
</html>
<?php
>>>>>>> origin/master
   }
   
   else     
       {
	   echo "<script type='text/javascript'>
	   alert('Usted no esta logueado');
	   window.location='index.php';
	   </script>";
	   }
	   
   
?>
