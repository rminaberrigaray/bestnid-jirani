<?php
$con = mysql_connect("localhost","root","1234");
$bd = mysql_select_db("grupo28");
mysql_query("SET NAMES 'utf8'");

function mostrar_subasta($subasta) {
?>
<tr class="registros">

<td width="30px"><center>
<a href="verProducto.php?idSubasta=<?php echo $subasta["id_subasta"];?>">
<?php
echo '<img src="data:image/jpeg;base64,'.base64_encode($subasta["imagen"]).'" style="margin-left: 25px;  width: 150px;
  height: 100px;"/>';
?></a>
</td></center>

<td width="20%";><center style="width: 100%;">
<?php
$fecha = date_create($subasta["fecha_inicio"]);
		echo date_format($fecha, 'd-m-Y H:i:s'); ?><br><?php
$fecha = date_create($subasta["fecha_fin"]);
		echo date_format($fecha, 'd-m-Y H:i:s');
?>
</td></center>

<td width="100px"><center>
<?php
echo $subasta["nombre_producto"];
?>
</td></center>

<td width="100px"><center>
<?php
echo $subasta["nombre"];
?></center>
</td>
<?php
}

function mostrar_botones_vigente($subasta) {
?>
<td width="100px"><center>
<a href="modificarSubasta.php?idSubasta=<?php echo $subasta["id_subasta"];?>">
<input type="button" value="Editar" class="button" title="Editar"/> </a>
</center>
</td>

<td width="100px"><center>
<a href="javascript:void(0)" onClick="eliminarSubasta('<?php echo $subasta["id_subasta"];?>')" >
<input type="button" value="Eliminar" class="button" title="Eliminar"/></a>
</center>
</td>
</tr>
<?php
}

function mostrar_boton_finalizada($subasta) {
?>
<td width="100px"><center>
<a href="elegirGanador.php?idSubasta=<?php echo $subasta["id_subasta"];?>">
<input type="button" value="Elegir ganador" class="button" title="Elegir ganador"/> </a>
</center>
</td>
<?php
}
?>