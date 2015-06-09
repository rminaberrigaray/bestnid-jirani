<?php
   session_start();
   if($_POST["nom"]!=null)
   {
   require_once("conexion.php");
   $consul="select * from usuario
   where
   nombre_usuario='".$_POST["nom"]."' and
   contraseña='".$_POST["clave"]."'
   ";
    $resul=mysql_query($consul);
    if(mysql_num_rows($resul) == 0)
    {
	   echo "<script type='text/javascript'>
	   alert('El Usuario no existe O no coincide con la contraseña');
	   window.location='index.php';
	   </script>";
    }
   else
   {
	   $_SESSION["nombre_usuario"]=$_POST["nom"];
	   header("Location: index.php");
   }
	   }
	   else
	   {
		   echo "<script type='text/javascript'>
	       alert('Usted entro a un area restringida!');
	       window.location='index.php';
	       </script>";
	   }
?>

<!-- Copyright 2014(c) Nauth WS http://www.nauth.com.ar -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
   <title>Subastas Bestnid</title>
</head>

<body>

</body>
</html>