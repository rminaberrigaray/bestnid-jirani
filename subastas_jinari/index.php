
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
 
 <form name="form" action="login.php" method="post" >
 <fieldset> 
   <legend> Iniciar Sesi&oacute;n:</legend>
   
   <label id="usuario">Usuario</label>
   <input type="text" name="nom"/><br>
   
   <label>Contraseña</label>
   <input type="password"  name="clave" /><br>
   <input type="button" value="Ingresar" title="Ingresar" onClick="validarlog()" style="margin-left:85px" />
   
 </fieldset>  
</form>
<br>

<div class="menu">
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
		<li><a href="registrarse.php">Registrarse</a></li>
		<li><a href="ayuda.php">Ayuda</a></li>			
   </ul>		
</div>





</body>  
</html>