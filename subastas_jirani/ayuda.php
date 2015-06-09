		     <li><a href="#">Muebles</a></li>
			 <li><a href="#">Juegos</a></li>
			 <li><a href="#">Joyas y Relojes</a></li>
	       </ul>
		 </li>
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