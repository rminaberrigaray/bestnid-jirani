<?php
   session_start();
   if($_SESSION["nombre_usuario"])
   {
    require_once("conexion.php");
	
	if ($_FILES["imagen"]["tmp_name"] != "") {
		$fp = fopen ($_FILES["imagen"]["tmp_name"], 'r');
		if ($fp) {
			$datos = fread ($fp, filesize($_FILES["imagen"]["tmp_name"]));
			$datos = addslashes($datos);
		}
		fclose($fp);
	
		$sql="update imagen set
		nombre='".$_FILES["imagen"]["name"]."',
		imagen='".$datos."',
		tipo='".$_FILES["imagen"]["type"]."'
		where id_imagen=".$_POST["id_imagen"]."";
	
		$res=mysql_query($sql);
	}
	
	$sql="update subasta set
	nombre_producto='".$_POST["nombre"]."',
	descripcion='".$_POST["descripcion"]."',
	id_imagen='".$_POST["id_imagen"]."',
	id_categoria='".$_POST["categoria"]."',
	id_ganador=NULL
	WHERE id_subasta=".$_POST["id_subasta"]."";
	
	$res=mysql_query($sql);
?>
<html>
<head>
</head>
<body>
<form id="mensaje" action="subastas.php" method="post">
<input type="hidden" name="msj_exito" value="La subasta fue modificada correctamente">
</form>

<script type="text/javascript">
    function enviarMsj () {
        var frm = document.getElementById("mensaje");
        frm.submit();
    }
    window.onload = enviarMsj;
</script>

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