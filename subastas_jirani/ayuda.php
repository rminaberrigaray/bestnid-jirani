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
<script type="text/javascript">
	var a = document.getElementById("ayuda");
	a.className = "active";
</script>
<html>
<body>
</body>  
</html>