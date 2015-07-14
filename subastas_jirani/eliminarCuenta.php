<?php
  session_start();
  if(isset($_SESSION["nombre_usuario"]))
   {
      require_once("conexion.php");
	  
	  
	  $consulta="SELECT * 
	  FROM oferta o
      INNER JOIN subasta s ON o.id_subasta = s.id_subasta
      where s.nombre_usuario = '".$_SESSION["nombre_usuario"]."'and 
	  s.fecha_fin >= NOW()";
	  $result=mysql_query($consulta);
	  if(mysql_num_rows($result) != 0) {
		 ?>

         <form id="mensaje3" action="index.php" method="post">
         <input type="hidden" name="msj_error" value="No puede eliminar su cuenta porque sus subastas poseen ofertas">
         </form>

         <script type="text/javascript">
         function enviarMsj3 () {
             var frm = document.getElementById("mensaje3");
             frm.submit();
            }
         window.onload = enviarMsj3;
         </script>	 
         <?php	 
		 die();
	    }
	  
      $sql="update usuario set
	  eliminado = 1
	  where nombre_usuario = '".$_GET["usuario"]."'";
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