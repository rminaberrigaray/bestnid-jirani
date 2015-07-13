<?php 
  session_start();
  if((isset($_SESSION["nombre_usuario"])))
  {
	require_once("conexion.php");
	include("vistaRegistrado.html");
	
  	 $sql="update comentario set
	 fecha_hora_respuesta=CURDATE(),
	 texto_respuesta='".$_POST["texto"]."'
	 WHERE id_comentario=".$_POST["idComentario"]."";
	 $resul=mysql_query($sql);
	 ?>
	 <form id="mensaje" action="verProductoPropio.php" method="get">
     <input type="hidden" name="idSubasta" value="<?php echo $_POST["id_subasta"] ?>">
     <input type="hidden" name="msj_exito" value="Se ha enviado exitosamente su respuesta">
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