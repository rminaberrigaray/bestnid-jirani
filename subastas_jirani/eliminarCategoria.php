<?php
	session_start();
	require_once("conexion.php");
	include("verCategorias.php");
	if((isset($_POST["catEliminar"]))){
	 $sql="update categoria set
	eliminado = 1
    where id_categoria = ".$_POST["catEliminar"]."";
	
	$res=mysql_query($sql);
    ?>

    <form id="mensaje2" action="verCategorias.php" method="post">
	<input type="hidden" name="msj_exito" value="La categoria fue eliminada correctamente">
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
	else {
	$sql="SELECT * FROM subasta
	WHERE id_categoria = ".$_GET["idCategoria"]." 
	and fecha_fin > NOW()
	and estado = 0";
	$resul=mysql_query($sql);
	if(mysql_num_rows($resul) !=0){ ?>
      <form id="mensaje" action="verCategorias.php" method="post">
      <input type="hidden" name="msj_mensaje" value="No puede eliminar la categoria porque tiene subastas adheridas">
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
	 ?> 
			 <form id="mensaje3" action="eliminarCategoria.php" method="post">
               <input type="hidden" name="catEliminar" value="<?php echo $_GET["idCategoria"];?>">
             </form>
			 
			 <script type="text/javascript">
              function enviarMsj3 () {
				var frm = document.getElementById("mensaje3");
               if (confirm("¿Realmente desea eliminar la categoria?"))
               {
                 window.location="eliminarCategoria.php";
				 frm.submit();
               }
              }
              window.onload = enviarMsj3;
              </script>
		      <?php	
		
		
		
		
	 }
	}
	
	