

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
        <li><a href="index.php">Inicio</a></li>
        <li><a href="contacto.php">Contacto</a></li>
		<li><a href="quienes.php">Quienes somos</a></li>
		<li><a class="active" href="registrarse.php">Registrarse</a></li>
		<li><a href="ayuda.php">Ayuda</a></li>		
   </ul>		
</div>

<div class="reg">

  <h3>
   <br>
   <form name="registro" method="post" action="consultaUsuario.php" style="margin-left:110px">
     <label>Datos:</label><br>
     <label style="margin-left: 3px">Nombre:</label>
     <input type="text" name="nombre" required/><br>
	 <div id="div_name"></div>
	 
     <label>Apellido:</label>
     <input type="text" name="apellido" required/><br>
	 <div id="div_apellido"></div>
	 
     <label style="margin-left:17px">E-mail:</label> 
     <input type="text" placeholder="mail@example.com" name="email" required/><br>
	 <div id="div_mail"></div>
	 
	 <label style="margin-right:1px; margin-left:3px">Usuario:</label>
     <input type="text" name="user" required/><br>
	 <div id="div_user"></div>
	 
     <label style="margin-right:1px; margin-left:22px">Clave:</label>
     <input type="password" name="clave" required/><br><br>
	 <div id="div_clave"></div>
	 <input type="button" value="Registrarme" title="Registrarme" onClick="validarReg()" style="margin-left:95px" >
     
   </form>
  </h3> 
</div>
</body>  
</html>