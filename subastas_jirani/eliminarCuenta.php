<?php
  session_start();
  if(isset($_SESSION["nombre_usuario"]))
   {
      require_once("conexion.php");
	  include("perfil.php");
	  
	  if((isset($_POST["msjEliminar"]))){
		 $subastas="update subasta set estado = 1 
		 where nombre_usuario = '".$_SESSION["nombre_usuario"]."'";
		 $res=mysql_query($subastas);
		 
	     $sql="update usuario set
	     eliminado = 1
	     where nombre_usuario = '".$_SESSION["nombre_usuario"]."'";
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
	     die();
	    }
	 
	  else {
	     $consulta="SELECT * 
	     FROM oferta o
         INNER JOIN subasta s ON o.id_subasta = s.id_subasta
         where s.nombre_usuario = '".$_SESSION["nombre_usuario"]."' and 
	     o.eliminado is NULL and
	     s.fecha_fin >= NOW()";
	     $result=mysql_query($consulta);
	     if(mysql_num_rows($result) != 0) {
		 ?>

             <form id="mensaje" action="perfil.php" method="post">
             <input type="hidden" name="msj_error" value="No puede eliminar su cuenta porque sus subastas poseen ofertas">
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
	      else {
		     $consulta="SELECT * 
	         FROM oferta o
             INNER JOIN subasta s ON o.id_subasta = s.id_subasta
             where o.nombre_usuario = '".$_SESSION["nombre_usuario"]."'and 
	         s.fecha_fin >= NOW() AND 
		     o.eliminado IS NULL";
	         $result=mysql_query($consulta); 
	  
	         if(mysql_num_rows($result) != 0){
             ?>
                 <form id="mensaje1" action="perfil.php" method="post">
                 <input type="hidden" name="msj_error" value="Posee ofertas pendientes, debe eliminarlas para poder eliminar su cuenta">
                 </form>

                 <script type="text/javascript">
                 function enviarMsj1 () {
                     var frm = document.getElementById("mensaje1");
                     frm.submit();
                    }
                 window.onload = enviarMsj1;
                 </script>	 
                 <?php	 
		         die();
		        }
		      else {				
		       ?> 
			     <form id="mensaje3" action="eliminarCuenta.php" method="post">
                 <input type="hidden" name="msjEliminar" value="usuario">
                 </form>
			 
			     <script type="text/javascript">
                 function enviarMsj3 () {
				     var frm = document.getElementById("mensaje3");
                     if (confirm("¿Realmente desea eliminar su cuenta?"))
                       {
                         window.location="eliminarCuenta.php";
				         frm.submit();
                        }
                    }
                 window.onload = enviarMsj3;
                 </script>
		         <?php
		        }
		  
	        }
	    }
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