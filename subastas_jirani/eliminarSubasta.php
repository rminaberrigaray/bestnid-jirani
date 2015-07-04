<?php
  session_start();
  if(isset($_SESSION["nombre_usuario"]))
   {
      require_once("conexion.php");
      $sql="update subasta set
	  estado='1'
	  where id_subasta = ".$_GET["idSubasta"]."";
	  $res=mysql_query($sql);
?>

<form id="mensaje" action="subastas.php" method="post">
<input type="hidden" name="msj_exito" value="La subasta fue eliminada correctamente">
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