<?php 
  session_start();
  require_once("conexion.php");
  if((isset($_SESSION["nombre_usuario"])))
  {
	include("vistaRegistrado.html");
	if(!isset($_POST["id_subasta"])) {
?>

<form id="mensaje2" action="index.php" method="post">
<input type="hidden" name="msj_mensaje" value="No seleccionó una subasta válida">
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
   <form enctype="multipart/form-data" name="oferta" method="post" action="editarOferta.php">
	
     <label>Motivo por el cual quiere el producto:</label><br>
	 <div id="div_descripcion"></div>
     <textarea type="text" name="descripcion" cols="50" rows="5" maxlength="255" onKeyDown="cuenta()" onKeyUp="cuenta()"><?php echo $_POST["motivo"]; ?></textarea><br>
   	 <div id="chars" style="font-size:12px">Caracteres restantes: <?php echo 255 - strlen($_POST["motivo"]); ?></div>
	 <br>
	 
	 <label>Monto ofrecido:</label><br>
	 <div id="div_monto"></div>
	 $<input name="monto" type="number" value=<?php echo $_POST["monto"]; ?>><br>
	 <br>
	 <hr>
	 
	 <input type="hidden" name="id_oferta" value=<?php echo $_POST["id_oferta"]; ?>>
	 
	 <input type="button" value="Cancelar" title="Cancelar" onClick="history.back();" />
     &nbsp;&nbsp;
     <input type="button" value="Modificar oferta" title="Modificar oferta" onClick="verificarOferta()"/>
     
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