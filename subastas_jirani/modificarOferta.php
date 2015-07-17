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
	 
	 <label>Nuevo monto:</label><br>
	 <div id="div_monto"></div>
	 $<input name="monto" type="number" min=1 value=<?php echo $_POST["monto"]; ?>><br>
	 <br>
	 <hr>
	 
	 <input type="hidden" name="id_oferta" value=<?php echo $_POST["id_oferta"]; ?>>
	 
	 <input type="submit" value="Modificar oferta" title="Modificar oferta" />
	 <input type="button" value="Cancelar" title="Cancelar" onClick="location.href = 'ofertas.php';" />
     &nbsp;&nbsp;
     
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