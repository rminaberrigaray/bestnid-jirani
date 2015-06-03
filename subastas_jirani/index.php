<?php
   require_once("conexion.php");
   include("vistaVisitante.html");
?>
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
		<li><a href="quienes.php">Quienes somos</a></li>
		<li><a href="registrarse.php">Registrarse</a></li>
		<li><a href="ayuda.php">Ayuda</a></li>			
   </ul>		
</div>
<?php
     $consul="SELECT * FROM subasta";
     $result=mysql_query($consul);
	 
     while($subasta=mysql_fetch_array($result))
     {
?>
 
<div class="products">
   <div class="item box normal cent active" id="item_box_3994">
     <div class="title"><?php echo $subasta["nombre_producto"]; ?> 
	 <a href="#">
	 </div>
	 <br>
	 <div class="photo">
	   <a href="#"></a>
	   <img src="galeria/5.jpg">
	 </div>
	 <br>
	 <div class="descrip"><?php echo $subasta["descripcion"]; ?> </div>
	 <br>
	 <input style="margin-left:110px"type="button" value="Ofertar" title="Ofertar" onClick="ofertar.php"/>
   </div>	  
</div>	 
<?php
	 }
?>
</body>  
</html>