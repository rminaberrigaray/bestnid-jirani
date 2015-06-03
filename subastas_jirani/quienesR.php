<?php
   include("vistaRegistrado.html");
   require_once("conexion.php");
   session_start();
   if(($_SESSION["nombre_usuario"]))
    {
?>
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
        <li><a href="perfil.php">Inicio</a></li>
        <li><a href="contacto.php">Contacto</a></li>
		<li><a class="active" href="quienesR.php">Quienes somos</a></li>
		<li><a href="subastar.php">Subastar</a></li>
		<li><a href="ayudaR.php">Ayuda</a></li>			
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