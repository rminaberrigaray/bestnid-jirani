<?php
	require_once("conexion.php");
	session_start();
	$consul="select * from administrador
	where
	nombre_usuario='".$_SESSION["nombre_usuario"]."'";
	$resul=mysql_query($consul);
	if(mysql_num_rows($resul) > 0) {
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
   <title>Subastas Bestnid</title>
   <link rel="stylesheet" href="estilo.css" type="text/css">
   <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <script language="javascript" type="text/javascript" src="lib/funciones.js"></script>
 
</head>
<body onLoad="limpiar();" >
	<div class="contenedor">
   <header>
   <div>
   <h4 style=" margin-left: 800px;
    margin-top: -2px"><?php echo $_SESSION["nombre_usuario"]; ?>&nbsp &nbsp &nbsp <a href="salir.php">Cerrar Sesión</a>
	</div>
	<div>
	<?php
			echo('<a href="index.php" title="Funciones usuario registrado" style="margin-left: 800px">Funciones usuario registrado</a>');
	?>
	</div>
      <div>
	  <a href="index.php" title="Subastas Bestnid"> 
      <img class="imagen" src="imagenes/logo4.png" style="margin-top: -25px" />
	  </a>
      </div>
   </header> 
   <div class="menu" style="margin-top:0px">
   <ul class="nav">

        <li><a id="ventas" href="consultaVentas.php">Ventas entre dos fechas</a></li>
		</li>
		<li><a id="usuarios" href="verUsuarios.php">Lista de usuarios</a></li>
		</li>
   </ul>		
</div>
<br>
</body>  
</html>  
	<?php
	}
		else {

?>
<form id="mensaje" action="index.php" method="post">
<input type="hidden" name="msj_error" value="Acceso denegado">
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
?>
