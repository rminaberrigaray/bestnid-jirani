<?php
   require_once("conexion.php");
<<<<<<< HEAD
   session_start();
   if(isset($_SESSION["nombre_usuario"]))
   { 
	include("vistaRegistrado.html");
   }
   
   else     
       {include("vistaVisitante.html");}
  
 ?> 
<div align="center">
<form action="" method="post">Ordenar productos 
<select id="order" name="orden" onchange="this.form.submit()">
	<option id="0" value="fecha_inicio desc">Lo más nuevo</option>
	<option id="1" value="fecha_inicio">Lo más antiguo</option>
	<option id="2" value="nombre_producto">Alfabético</option>
</select>
<input type="hidden" name="busqueda" value= <?php $_POST["busqueda"] ?>>

<?php if(isset($_POST["orden"])) { ?>
<script type="text/javascript">
	var valor = "<?php echo $_POST["orden"]; ?>";
	var lista = document.getElementById("order").options;
	for (var opcion = 0; opcion < lista.length; opcion++) {
		if (lista[opcion].value == valor) {
			lista[opcion].selected = true;
			break;
		}
	}
</script>
<?php } ?>

=======
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
>>>>>>> origin/master
</form>
</div>

<?php
<<<<<<< HEAD

   $consul="SELECT s.nombre_producto, s.id_imagen, i.id_imagen, i.imagen, s.fecha_inicio, s.fecha_fin
     FROM subasta s
     INNER JOIN imagen i ON s.id_imagen = i.id_imagen
	 WHERE s.nombre_producto like '%".$_POST["busqueda"]."%'";

=======
     $consul="SELECT * FROM subasta WHERE nombre_producto like '%".$_POST["busqueda"]."%'";
>>>>>>> origin/master
	 if(isset($_POST["orden"])) {
		$consul=$consul." ORDER BY ".$_POST["orden"];
	}
     $result=mysql_query($consul);
     while($subasta=mysql_fetch_array($result))
     {
?>

<div class="products">
   <div class="item box normal cent active" id="item_box_3994">
<<<<<<< HEAD
     <div class="title"><?php echo ($subasta["nombre_producto"]); ?> 
	 <a href="#"></a>
	 </div>
	 <br>
	 <div class="photo">
	  <a href="#"></a>
	   <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($subasta["imagen"]).'" style="margin-left: 25px;"/>'; 
	     ?>
	 </div>
	 <br>
	 <div class="inicio">Inicio de subasta: <?php 
		$fecha = date_create($subasta["fecha_inicio"]);
		echo date_format($fecha, 'd-m-Y H:i:s'); 
	 ?> </div>
	 <br>
	 <div class="fin">Fin de subasta: <?php 
		$fecha = date_create($subasta["fecha_fin"]);
		echo date_format($fecha, 'd-m-Y H:i:s');
	 ?> </div>
=======
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
>>>>>>> origin/master
	 <br>
	 <input style="margin-left:110px"type="button" value="Ofertar" title="Ofertar" onClick="ofertar.php"/>
   </div>	  
</div>	 
<?php
	 }
?>
</body>  
</html>