<?php 
	session_start();
	require_once("conexion.php");
	if((isset($_SESSION["nombre_usuario"])))
	{
		include("vistaRegistrado.html");

		$sql="SELECT *,
		o.descripcion AS motivo
		FROM oferta o
		INNER JOIN subasta s ON o.id_subasta = s.id_subasta
		INNER JOIN imagen i ON s.id_imagen = i.id_imagen
		WHERE o.nombre_usuario = '".$_SESSION["nombre_usuario"]."'";
		$result=mysql_query($sql);
		if(mysql_num_rows($result) == 0) {
			echo("<div class=\"mensaje\">Usted no ha realizado ninguna oferta</div>");
		}
		else {
?>

<?php if(isset($_POST["msj_exito"])) {?> <div id="div_mensaje" class="exito"> <?php echo $_POST["msj_exito"]; ?> </div> <?php } ?>

<table width="100%" align="center" border="1" style="margin: 15px 5px; background-color: white">

<tr>
<td valign="top" align="center" colspan="5" >
<h3>Mis ofertas</h3>
</td>
</tr>
<tr class="encabezado">

<td width="15%">
Producto
</td>

<td width="15%">
Imagen
</td>

<td width="15%";>
Fecha
</td>

<td width="10%">
Monto
</td>

<td width="45%">
Motivo
</td>

<?php
			while($oferta=mysql_fetch_array($result)) {
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

<td width="45%"><center>
<?php
echo $oferta["motivo"];
?></center>
</td>

</tr>
<?php				
			}
		}
?>
</table>

<?php
 }
	else {
?>

<form id="mensaje" action="index.php" method="post">
<input type="hidden" name="msj_mensaje" value="Usted no está logueado">
</form>

<script type="text/javascript">
    function enviarMsj () {
        var frm = document.getElementById("mensaje");
        frm.submit();
    }
    window.onload = enviarMsj;
</script>	 

<?php	   
	}
?>