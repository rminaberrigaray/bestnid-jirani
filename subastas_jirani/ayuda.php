<<<<<<< HEAD
=======
<?php
   require_once("conexion.php");
   session_start();
   if(isset($_SESSION['nombre_usuario']))
   { include("vistaRegistrado.html");}
   
   else{include("vistaVisitante.html");}
 ?> 
<div class="menu">
   <ul class="nav">
	     <li><a href="#">Categoría</a>
	       <ul>
		     <li><a href="#">Ropa y Accesorios</a></li>
>>>>>>> origin/master
		     <li><a href="#">Muebles</a></li>
			 <li><a href="#">Juegos</a></li>
			 <li><a href="#">Joyas y Relojes</a></li>
	       </ul>
		 </li>
<<<<<<< HEAD
=======
        <li><a href="index.php">Inicio</a></li>
		<li><a href="quienes.php">Quienes somos</a></li>
		<li><a class="active" href="ayuda.php">Ayuda</a></li>			
>>>>>>> origin/master
   </ul>		
<?php
   require_once("conexion.php");
   session_start();
   if(isset($_SESSION["nombre_usuario"]))
   { 
	include("vistaRegistrado.html");
   }
   
   else     
       {include("vistaVisitante.html");}
  
?> 
<html>
<body>
</body>  
</html>