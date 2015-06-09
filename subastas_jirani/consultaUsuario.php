 <?php 
 
	  if ($_POST["user"] != null)
	  {
	    require_once("conexion.php");
	    $consul="SELECT nombre_usuario FROM usuario where nombre_usuario = '".$_POST["user"]."'";
		
        $result=mysql_query($consul);
		
        if(mysql_num_rows($result) != 0)
        {
	      echo "<script type='text/javascript'>
	      alert('El usuario ya existe. Por favor vuelva a ingresar otro');
	      window.location='registrarse.php';
	      </script>";
        }
		else
		{
			
		 $sql=" INSERT INTO usuario 
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
	   
         echo "<script type=''>
	     alert('Se ha registrado exitosamente');
	     window.location='index.php';
		 echo 
         </script>";	  
	      
		}
	  }
?>