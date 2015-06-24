<?php 
  session_start();
  require_once("conexion.php");
  if((isset($_SESSION["nombre_usuario"])))
  {
	include("vistaRegistrado.html");
	if(!isset($_POST["id_subasta"])) {
		echo "<script type='text/javascript'>
		alert('No seleccionó una subasta válida');
		window.location='index.php';
		</script>";
		die();
	}
	
	$subasta=$_POST["id_subasta"];
	$usr=$_SESSION["nombre_usuario"];
	$sql="SELECT *
	FROM oferta
	WHERE id_subasta = ".$subasta."
	AND nombre_usuario = '".$usr."'";
	$result=mysql_query($sql);
	if(mysql_num_rows($result) != 0) {
		echo "<script type='text/javascript'>
		alert('Ya realizó una oferta por esta subasta, puede modificarla si así lo desea');
		window.location='ofertas.php';
		</script>";
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
	 
	 <input type="button" value="Cancelar" title="Cancelar" onClick="history.back();" />
     &nbsp;&nbsp;
     <input type="button" value="Realizar oferta" title="Realizar oferta" onClick="verificarOferta()"/>
     
   </form>
   <h4>


</div>


</body>  
</html>
<?php
   }
   else
   {
	   echo "<script type='text/javascript'>
	   alert('Usted no esta logueado');
	   window.location='index.php';
	   </script>";
   }
?>
