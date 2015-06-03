<?php include("vistaVisitante.html"); ?>
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
        <li><a href="index.php">Inicio</a></li>
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