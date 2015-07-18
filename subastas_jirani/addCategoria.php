<?php
	session_start();
	require_once("conexion.php");
	$sql="SELECT * FROM categoria
	WHERE nombre = '".$_POST["nombre"]."' ";
	$resul=mysql_query($sql);
	if(mysql_num_rows($resul) !=0){ ?>
      <form id="mensaje" action="crearCategoria.php" method="post">
      <input type="hidden" name="msj_mensaje" value="Ya existe una categoria con ese nombre">
      </form>

      <script type="text/javascript">
      function enviarMsj () {
        var frm = document.getElementById("mensaje");
        frm.submit();
       }
       window.onload = enviarMsj;
      </script>	 
	  <?php	  
      die();	  
	}
	
	
	$sql="INSERT INTO categoria (nombre)
	VALUES ('".$_POST["nombre"]."') ";
	$resul=mysql_query($sql);
	?>
    <form id="mensaje" action="verCategorias.php" method="post">
    <input type="hidden" name="msj_exito" value="Se ha creado con exito la categoria">
    </form>

    <script type="text/javascript">
    function enviarMsj () {
        var frm = document.getElementById("mensaje");
        frm.submit();
    }
    window.onload = enviarMsj;
    </script>
