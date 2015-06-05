<?php
   require_once("conexion.php");
   if(isset($_SESSION['nombre_usuario']))
   { include("vistaRegistrado.html");}
   
   else{include("vistaVisitante.html");}
 ?> 
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