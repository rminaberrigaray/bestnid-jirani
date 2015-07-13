<?php
$con = mysql_connect("localhost","root","1234");
$bd = mysql_select_db("grupo28");
mysql_query("SET NAMES 'utf8'");

function mostrar_subasta($subasta) {
?>
<tr class="registros">

<td width="30px"><center>
<a href="verProductoPropio.php?idSubasta=<?php echo $subasta["id_subasta"];?>">
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
function mostrar_boton_ganador($subasta) {
?>
<td width="100px"><center>
<input type="button" value="Tiene ganador" class="button" title="Tiene ganador"
style="background: -webkit-linear-gradient(left, #261CC0,#261CC0);"/>
</center>
</td>
<?php
}

function mostrar_oferta($oferta) {
?>
<tr>

<td width="15%"><center>
<?php
echo $oferta["nombre_producto"];
?>
</td></center>

<td width="15%"><center>
<a href="verProducto.php?idSubasta=<?php echo $oferta["id_subasta"];?>">
<?php
echo '<img src="data:image/jpeg;base64,'.base64_encode($oferta["imagen"]).'" style="margin-left: 25px;  width: 150px;
  height: 100px;"/>';
?></a>
</td></center>

<td width="15%";><center>
<?php
$fecha = date_create($oferta["fecha"]);
		echo date_format($fecha, 'd-m-Y'); ?><br><?php
?>
</td></center>

<td width="10%"><center>
<?php
echo $oferta["monto"];
?>
</td></center>

<td width="30%"><center>
<?php
echo $oferta["motivo"];
?></center>
</td>


<?php
}

function mostrar_boton_pendiente($oferta) {
?>
<td width="15%">
<form action="modificarOferta.php" method="post">
<input name="id_subasta" type="hidden" value=<?php echo $oferta["id_subasta"]; ?>>
<input name="id_oferta" type="hidden" value=<?php echo $oferta["id_oferta"]; ?>>
<input name="monto" type="hidden" value=<?php echo $oferta["monto"]; ?>>
<input name="motivo" type="hidden" value="<?php echo $oferta["motivo"]; ?>">
<input type="submit" value="Modificar oferta" class="button" title="Modificar oferta"/>
</form>
</td>

</tr>
<?php
}

function mostrar_ganador($oferta) {
?>
<td width="15%"><center>
<?php
	if($oferta["id_ganador"] == NULL) {
?>
<img title="La subasta aún no tiene ganador" src="imagenes/iconos/Knob Help.png">
<?php
	}
	else {
		$query="SELECT *
		FROM ganador
		WHERE id_oferta = ".$oferta["id_oferta"];
		$res=mysql_query($query);
		if (mysql_num_rows($res) > 0) {
?>
<img title="Es ganador de la subasta" src="imagenes/iconos/Knob Valid Blue.png">
<?php
		}
		else {
	
?>
<img title="No es ganador de la subasta" src="imagenes/iconos/Knob Cancel.png">

<?php
		}
	}
?>
</center></td>
</tr>
<?php
}
?>
