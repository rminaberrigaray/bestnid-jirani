<?php
   require_once("conexion.php");
   session_start();
   
   if(($_SESSION["nombre_usuario"]))
    {
?>

<!-- Copyright 2014(c) Nauth WS http://www.nauth.com.ar -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
   <title>Subastas Bestnid</title>
   <link rel="stylesheet" href="estilo.css" type="text/css">
   
   <script language="javascript" type="text/javascript" src="lib/funciones.js"></script>
 
</head>
<body onLoad="limpiar();">
 
   <header>
      <div>
	  <a href="index.php" title="Subastas Bestnid"> 
      <img class="imagen" src="imagenes/logo4.png"/>
	  <h4><a href="salir.php">Cerrar Sesión</a></h4>
	  </a>
      </div>
   </header>
   
 <div class="menu" style="margin-top:0px">
   <ul class="nav">
	     <li><a href="#">Categoría</a>
	       <ul>
		     <li><a href="#">Ropa y Accesorios</a></li>
		     <li><a href="#">Muebles</a></li>
		     <li><a href="#">Electrónica</a></li>
			 <li><a href="#">Instrumentos Musicales</a></li>
			 <li><a href="#">Juegos</a></li>
			 <li><a href="#">Joyas y Relojes</a></li>
			 <li><a href="#">Electrodomésticos</a></li>
	       </ul>
		 </li>
        <li><a class="active" href="index.php">Inicio</a></li>
        <li><a href="contacto.php">Contacto</a></li>
		<li><a href="quienes.php">Quienes somos</a></li>
		<li><a href="subastar.php">Subastar</a></li>
		<li><a href="ayuda.php">Ayuda</a></li>			
   </ul>		
</div>
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