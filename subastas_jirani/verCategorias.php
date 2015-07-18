<?php
	require_once("conexion.php");
	include("funcionesAdministrador.php");
?>
<script type="text/javascript">
	var a = document.getElementById("categorias");
	a.className = "active";
</script>

<?php if(isset($_POST["msj_exito"])) {?> <div class="exito"> <?php echo $_POST["msj_exito"]; ?> </div> <?php } ?>
<?php if(isset($_POST["msj_mensaje"])) {?> <div class="mensaje"> <?php echo $_POST["msj_mensaje"]; ?> </div> <?php } ?>

<a href="crearCategoria.php">
<input type="button" value="Crear Categoria" class="button" title="Crear Categoria"/></a>

<form style="margin-top:-28px;" align="center" action="verCategorias.php" method="post">
  <input type="text" placeholder="Buscar categoria" name="busqueda">
  <input type="submit" value="Buscar">
</form>


<?php
	$sql="SELECT * FROM categoria 
	WHERE eliminado = 0 ";
	
	if(isset($_POST["busqueda"])){
		$sql=$sql." AND nombre like '%".$_POST["busqueda"]."%'";
	}
	$sql=$sql." order by nombre asc";	
	$result=mysql_query($sql);
	if(mysql_num_rows($result) > 0) {
?>

<table width="80%" border="1" style="background-color: white">

<tr>
<td class="caption"  colspan="4" >
Categorias
</td>
</tr>
<tr class="encabezado">

<td width="20%">
Nombre 
</td>

<td width="20%";>
Actualizar
</td>

<td width="20%">
Eliminar
</td>

<?php
	while($categoria=mysql_fetch_array($result)) {
?>
<tr>
	<td width="20%"><center>
	<?php
	echo $categoria["nombre"];
	?>
	</td></center>

	<td width="20%"><center>
	<a href="actualizarCategoria.php?idCategoria=<?php echo $categoria["id_categoria"];?>" title="Actualizar">
	<img src="imagenes/iconos/Knob Refresh.png"></a>
	</td></center>

	<td width="20%"><center>
	<a href="eliminarCategoria.php?idCategoria=<?php echo $categoria["id_categoria"];?>" title="Eliminar" >
    <img src="imagenes/iconos/Knob Remove Red.png"></a>
	</td></center>

</tr>
<?php
	}
?>
</table><?php
}
	 else {
?>
<div id="div_mensaje" class="mensaje"> Su búsqueda no produjo ningún resultado </div>
<?php
	 }
?>