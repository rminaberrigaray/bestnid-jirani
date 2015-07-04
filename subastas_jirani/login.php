<?php
   session_start();
   if(isset($_POST["nom"]))
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
?>
<form id="mensaje" action="index.php" method="post">
<input type="hidden" name="msj_error" value="El nombre de ususario no existe o no coincide con la contraseña">
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
	   $_SESSION["nombre_usuario"]=$_POST["nom"];
	   header("Location: index.php");
	   die();
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
