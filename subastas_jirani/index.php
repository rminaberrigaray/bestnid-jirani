<?php
   require_once("conexion.php");
   session_start();
   if(isset($_SESSION["nombre_usuario"]))
   { 
	include("vistaRegistrado.html");
   }
   
   else     
       {include("vistaVisitante.html");}
  
 ?> 

<div align=center style="margin-top: 22px;">
<form action="" method="post">Ordenar productos 
<<<<<<< HEAD
<select id="order" name="orden" onchange="this.form.submit()">
	<option id="0" value="fecha_inicio desc">Lo más nuevo</option>
	<option id="1" value="fecha_inicio">Lo más antiguo</option>
	<option id="2" value="nombre_producto">Alfabético</option>
</select>

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
<select id="orden" name="orden" onchange="this.form.submit()">
	<option value=<?php if(isset($_POST["orden"])) $_POST["orden"] ?>></option>
	<option id="1" value="id_subasta desc">Lo más nuevo</option>
	<option id="2" value="id_subasta">Lo más antiguo</option>
	<option id="3" value="nombre_producto">Alfabético</option>
	<option id="4" value="nombre_usuario">Nombre de usuario</option>
</select>
>>>>>>> origin/master
</form>
</div>

<?php
<<<<<<< HEAD
     $consul="SELECT s.nombre_producto, s.id_imagen, i.id_imagen, i.imagen, s.fecha_inicio, s.fecha_fin
     FROM subasta s
     INNER JOIN imagen i ON s.id_imagen = i.id_imagen";
=======
     $consul="SELECT * FROM subasta";
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
	 <br>
	 <input style="margin-left:110px"type="button" value="Ofertar" title="Ofertar" onClick="ofertar.php"/>
   </div>	  
</div>	 
<?php
	 }
?>
</div>
</body>  
</html>