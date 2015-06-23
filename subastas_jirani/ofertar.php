<?php 
  session_start();
  include("vistaRegistrado.html"); 
  require_once("conexion.php");
  if(($_SESSION["nombre_usuario"]))
  {
?>

<script type="text/javascript">
	var a = document.getElementById("ofertar");
	a.className = "active";
</script>


</body>  
</html>
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
