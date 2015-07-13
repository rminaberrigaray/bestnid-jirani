<?php
  session_start();
  if(isset($_SESSION["nombre_usuario"]))
   {
      require_once("conexion.php");
      $sql="update usuario set
	  eliminado = 1
	  where nombre_usuario = '".$_GET["usuario"]."'";
	  $res=mysql_query($sql);
	  session_destroy();
?>

<form id="mensaje" action="index.php" method="post">
<input type="hidden" name="msj_exito" value="Su cuenta fue eliminada correctamente">
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