<?php
  session_start();
  if(isset($_SESSION["nombre_usuario"]))
   {
      require_once("conexion.php");
      $sql="update oferta set
	  eliminado = 1
	  where id_oferta = ".$_GET["idOferta"];
	  $res=mysql_query($sql);
?>

<form id="mensaje" action="ofertas.php" method="post">
<input type="hidden" name="msj_exito" value="Su oferta fue eliminada correctamente">
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
    else
	{
?>
<form id="mensaje2" action="index.php" method="post">
<input type="hidden" name="msj_mensaje" value="Usted no está logueado">
</form>

<script type="text/javascript">
    function enviarMsj2 () {
        var frm = document.getElementById("mensaje2");
        frm.submit();
    }
    window.onload = enviarMsj2;
</script>	 

	 
<?php	   
   }
?>