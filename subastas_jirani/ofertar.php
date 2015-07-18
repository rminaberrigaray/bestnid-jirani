<?php 
  session_start();
  require_once("conexion.php");
  if((isset($_SESSION["nombre_usuario"])))
  {
	include("vistaRegistrado.html");
	if(!isset($_POST["id_subasta"])) {
?>

<form id="mensaje3" action="index.php" method="post">
<input type="hidden" name="msj_mensaje" value="No seleccionó una subasta válida">
</form>

<script type="text/javascript">
    function enviarMsj3 () {
        var frm = document.getElementById("mensaje3");
        frm.submit();
    }
    window.onload = enviarMsj3;
</script>	 

<?php	 
		die();
	}
	
	$subasta=$_POST["id_subasta"];
	$usr=$_SESSION["nombre_usuario"];
	$sql="SELECT *
	FROM oferta
	WHERE id_subasta = ".$subasta."
	AND nombre_usuario = '".$usr."'
	AND eliminado IS NULL";
	$result=mysql_query($sql);
	if(mysql_num_rows($result) != 0) {
?>

<form id="mensaje2" action="ofertas.php" method="post">
<input type="hidden" name="msj_mensaje" value="Ya realizó una oferta por este producto, puede modificarla si así lo desea">
</form>

<script type="text/javascript">
    function enviarMsj2 () {
        var frm = document.getElementById("mensaje2");
        frm.submit();
    }
    window.onload = enviarMsj2;
</script>	 

<?php	   
		die();
	}
?>

<div class="oferta">

   <h4>
   <br>
   <form enctype="multipart/form-data" name="oferta" method="post" action="addOferta.php">
	
     <label>Motivo por el cual quiere el producto:</label><br>
	 <div id="div_descripcion"></div>
     <textarea type="text" name="descripcion" cols="50" rows="5" maxlength="255" onKeyDown="cuenta()" onKeyUp="cuenta()"></textarea><br>
   	 <div id="chars" style="font-size:12px">Caracteres restantes: 255</div>
	 <br>
	 
	 <label>Monto ofrecido:</label><br>
	 <div id="div_monto"></div>
	 $<input name="monto" type="number"><br>
	 <br>
	 <hr>
	 
	 <input type="hidden" name="id_subasta" value=<?php echo $_POST["id_subasta"]; ?>>
	 
	 <input type="button" value="Realizar oferta" title="Realizar oferta" onClick="verificarOferta()"/>
     &nbsp;&nbsp;
	 <input type="button" value="Cancelar" title="Cancelar" onClick="location.href = 'verProducto.php?idSubasta=<?php echo $_POST["id_subasta"]; ?>';" /></a>
     
    </form>
   <h4>


</div>


</body>  
</html>
<?php
   }
   else
   {
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