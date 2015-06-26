<?php include("vistaVisitante.html"); ?>

<div class="reg">

  <h3>
   <br>
   <form name="registro" method="post" action="consultaUsuario.php" style="margin-left:110px">
     <label>Datos:</label><br>
     <label style="margin-left: 3px">Nombre:</label>
     <input type="text" name="nombre" required /><br>
	 <div id="div_name"></div>
	 
     <label>Apellido:</label>
     <input type="text" name="apellido" required /><br>
	 <div id="div_apellido"></div>
	 
     <label style="margin-left:17px">E-mail:</label> 
     <input type="email" placeholder="mail@example.com" name="email" required /><br>
	 <div id="div_mail"></div>
	 
	 <label style="margin-right:1px; margin-left:3px">Usuario:</label>
     <input type="text" name="user" required /><br>
	 <div id="div_user"></div>
	 
     <label style="margin-right:1px; margin-left:22px">Clave:</label>
     <input type="password" name="clave" required />
	 <div id="div_clave"></div>
	 <input type="button" value="Registrarme" title="Registrarme" onClick="validarReg()" style="margin-left:95px" >
     
   </form>
  </h3> 
</div>
</body>  
</html>