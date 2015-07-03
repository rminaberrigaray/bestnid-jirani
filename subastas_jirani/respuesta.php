<?php
  require_once("conexion.php");
  session_start();
  if(isset($_SESSION["nombre_usuario"]))
  { 
	include("vistaRegistrado.html");
	$sql="select * from comentario c
    inner join subasta s on c.id_subasta=s.id_subasta
    where c.id_comentario = ".$_POST["idComentario"]." and
	s.nombre_usuario = '".$_SESSION["nombre_usuario"]."'";
	
	$resul=mysql_query($sql);
	if(mysql_num_rows($resul) == 0)
	{
	     echo "<script type=''>
	     alert('Usted no es dueño de la subasta, por lo tanto no puede responder esto');
	     window.location='verProducto.php?idSubasta=+".$_POST["id_subasta"]."';
         </script>";
    }
	else 
	{
     ?> 
     <script type="text/javascript">
       var a = document.getElementById("index");
	   a.className = "active";
     </script>
	 <h4>
     <form id="comentario" method="post" action="updateComentario.php">
	
     <label>Respuesta:</label><br>
	 <div id="div_comentario"></div>
     <textarea type="text" id="texto" name="texto" cols="50" rows="5"></textarea><br>
   	 <br>
	 <input type="hidden" name="idComentario" value="<?php echo $_POST["idComentario"]; ?>">
	 <input type="hidden" name="id_subasta" value="<?php echo $_POST["id_subasta"];?>">
	 <input type="button" value="Cancelar" title="Cancelar" onClick="history.back();" />
     &nbsp;&nbsp;
     <input type="submit" value="Enviar" title="Enviar"/>
     
     </form>
     <br>  
     <h4><?php
	}
   }
 else
	   {
	     echo "<script type=''>
	     alert('Usted no se encuentra logueado');
	     window.location='index.php';
         </script>";
	   }
?>
</body>  
</html>