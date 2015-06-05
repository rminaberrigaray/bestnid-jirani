<?php 
  include("vistaRegistrado.html"); 
  require_once("conexion.php");
  session_start();
  if(($_SESSION["nombre_usuario"]))
  {
?>


<div class="subasta">

   <h4>
   <br>
   <form enctype="multipart/form-data" name="subasta" method="post" action="addSubasta.php">
     <label>Nombre del producto:</label><br>
     <input type="text" name="nombre" ><br>
	 <div id="div_name"></div>
	
     <label>Descripcion:</label><br>
     <textarea type="text" name="descripcion" cols="50" rows="5" maxlength="500">   </textarea><br>
	 <div id="div_descrip"></div>
	 
     <label>Categoria:</label> <br>
     <select name="categoria">
     <option value="0">Seleccione una categoria</option>
     <?php
	 $consul="SELECT * FROM categoria";
     $result=mysql_query($consul);
	 
     while($categoria=mysql_fetch_array($result))
     {
       ?>
        <option value="<?php echo $categoria["nombre"]; ?>"><?php echo $categoria["nombre"]; ?></option>
       <?php
     }
	
     ?>
     </select>
	 <br>
	 <label>Imagen:</label><br>
	 <input name="imagen" type="file"/>
	 <div id="div_imagen"></div><br>

	 <input type="button" value="Cancelar" title="Cancelar" onClick="history.back();" />
     &nbsp;&nbsp;
     <input type="button" value="Subastar" title="Subastar" onClick="verificarSubasta()"/>
     
   </form>
   <h4>


</div>
</body>  
</html>
<?php
   }
   else
   {
	   echo "<script type='text/javascript'>
	   alert('Usted no esta logueado');
	   window.location='index.php';
	   </script>";
   }
?>
