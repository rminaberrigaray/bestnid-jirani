<?php 
  session_start();
  require_once("conexion.php");
  	  $sql="INSERT INTO comentario (nombre_usuario, fecha_hora_pregunta, texto_pregunta, 
	  id_subasta, fecha_hora_respuesta, texto_respuesta)
	  VALUES ('".$_SESSION["nombre_usuario"]."',
	  NOW(),
	  '".$_POST["texto"]."',
	  ".$_POST["id_subasta"].",
	  null,null)";
	
	  $resul=mysql_query($sql);
?>
<html>
<head>
</head>
<body>
<?php
	if($_POST["prod_dueño"] == 1){
?>
    <form id="mensaje" action="verProductoPropio.php" method="get">
    <input type="hidden" name="idSubasta" value="<?php echo $_POST["id_subasta"] ?>">
    <input type="hidden" name="msj_exito" value="Se ha enviado exitosamente su comentario">
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
 else { ?>

    <form id="mensaje" action="verProducto.php" method="get">
    <input type="hidden" name="idSubasta" value="<?php echo $_POST["id_subasta"] ?>">
    <input type="hidden" name="msj_exito" value="Se ha enviado exitosamente su comentario">
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
</body>
</html>