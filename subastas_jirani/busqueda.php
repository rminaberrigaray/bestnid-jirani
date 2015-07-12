<?php
   require_once("conexion.php");
   session_start();
   if(isset($_SESSION["nombre_usuario"]))
   { 
	include("vistaRegistrado.html");
   }
   
   else {
	include("vistaVisitante.html");
   }
   
   $consul="SELECT *
     FROM subasta s
     INNER JOIN imagen i ON s.id_imagen = i.id_imagen
	 WHERE s.nombre_producto like '%".$_POST["busqueda"]."%' and s.estado=0
	 and DATE(s.fecha_fin) >= CURDATE()";

	 if(isset($_SESSION["nombre_usuario"])){
	   $consul=$consul." and s.nombre_usuario != '".$_SESSION["nombre_usuario"]."'"; }
	   
	 if(isset($_POST["orden"])) {
		$consul=$consul." ORDER BY ".$_POST["orden"];
	}
	else {
		$consul=$consul." ORDER BY fecha_inicio desc";
	 }
     $result=mysql_query($consul);
	 if(mysql_num_rows($result) > 0) {
	 
?> 
<div align="center">
<form action="" method="post">Ordenar productos 
<select id="order" name="orden" onchange="this.form.submit()">
	<option id="0" value="fecha_inicio desc">Lo más nuevo</option>
	<option id="1" value="fecha_inicio">Lo más antiguo</option>
	<option id="2" value="nombre_producto">Alfabético</option>
</select>
<input type="hidden" name="busqueda" value= <?php echo $_POST["busqueda"] ?>>

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

</form>
</div>

<?php
		 while($subasta=mysql_fetch_array($result))
		 {
?>

<div class="products">
   <div class="item box normal cent active" id="item_box_3994">
     <div style="center"><?php echo ($subasta["nombre_producto"]); ?> 
	 </div>
	 <br>
	 <div>
	   <a href="verProducto.php?idSubasta=<?php echo $subasta["id_subasta"];?>">
	    <?php echo '<img src="data:image/*;base64,'.base64_encode($subasta["imagen"]).'" style="margin-left: 25px;
		width: 170px;height: 150px;"/>'; 
	     ?></a>
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
	 <form method="post" action="ofertar.php">
	 <input type="hidden" name="id_subasta" value=<?php echo $subasta["id_subasta"]; ?>>
	 <input style="margin-left:80px" type="submit"  class="button" value="Ofertar" title="Ofertar">
	 </form>
   </div>
</div>
<?php
		}
	 }
	 else {
?>
<div id="div_mensaje" class="mensaje"> Su búsqueda no produjo ningún resultado </div>
<?php
	 }
?>
</body>  
</html>