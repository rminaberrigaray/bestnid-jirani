 <?php 
 
	  if ($_POST["user"] != null)
	  {
	    require_once("conexion.php");
	    $consul="SELECT nombre_usuario FROM usuario where nombre_usuario = '".$_POST["user"]."'";
		
        $result=mysql_query($consul);
		
        if(mysql_num_rows($result) != 0)
        {
?>
<form id="mensaje" action="registrarse.php" method="post">
<input type="hidden" name="msj_error" value="El usuario ya existe. Por favor ingrese otro">
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
			
		 $sql=" INSERT INTO usuario (nombre_usuario, email, contraseña, fecha_alta, nombre, apellido, direccion)
		 VALUES ('".$_POST["user"]."',
		 '".$_POST["email"]."',
		 '".$_POST["clave"]."',
		 CURDATE(),
		 '".$_POST["nombre"]."',
		 '".$_POST["apellido"]."',
		 null)";
		 
         $res=mysql_query($sql);
		 
		 $sql="INSERT INTO usuario_registrado
		 VALUES ('".$_POST["user"]."')";
		 $res=mysql_query($sql);
		 
		 session_start();
         $_SESSION["nombre_usuario"]=$_POST["user"];
	   
?>
<form id="mensaje2" action="index.php" method="post">
<input type="hidden" name="msj_exito" value="Se ha registrado exitosamente">
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
	  }
?>