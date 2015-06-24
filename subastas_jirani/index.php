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
<script type="text/javascript">
	var a = document.getElementById("index");
	a.className = "active";
</script>

<div align=center style="margin-top: 22px;">
<form action="" method="post">Ordenar productos 
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

</form>
</div>

<?php
     $consul="SELECT *
     FROM subasta s
     INNER JOIN imagen i ON s.id_imagen = i.id_imagen";
	 if(isset($_POST["orden"])) {
		$consul=$consul." ORDER BY ".$_POST["orden"];
	 }
	 else {
		$consul=$consul." ORDER BY fecha_inicio desc";
	 }
     $result=mysql_query($consul);
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
?>
</div>
</body>  
</html>