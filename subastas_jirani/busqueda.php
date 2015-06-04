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
		<li>
		<form action="busqueda.php" method="post">
		<input type="text" placeholder="Búsqueda" name="busqueda">
		<input type="submit" value="Buscar">
		</form>
		</li>
   </ul>		
</div>

<div align=center>
<form action="" method="post">Ordenar productos 
<select id="orden" name="orden" onchange="this.form.submit()">
	<option value=<?php if(isset($_POST["orden"])) $_POST["orden"] ?>></option>
	<option id="1" value="id_subasta desc">Lo más nuevo</option>
	<option id="2" value="id_subasta">Lo más antiguo</option>
	<option id="3" value="nombre_producto">Alfabético</option>
	<option id="4" value="nombre_usuario">Nombre de usuario</option>
</select>
<input type=hidden name="busqueda" value= <?php $_POST["busqueda"] ?>>
</form>
</div>

<?php
     $consul="SELECT * FROM subasta WHERE nombre_producto like '%".$_POST["busqueda"]."%'";
	 if(isset($_POST["orden"])) {
		$consul=$consul." ORDER BY ".$_POST["orden"];
	}
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