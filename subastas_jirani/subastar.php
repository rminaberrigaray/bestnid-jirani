<?php 
  include("vistaRegistrado.html"); 
  require_once("conexion.php");
  session_start();
  if(($_SESSION["nombre_usuario"]))
  {
?>
<div class="menu" style="margin-top:0px">
   <ul class="nav">
	     <li><a href="#">Categoría</a>
	       <ul>
		     <li><a href="#">Ropa y Accesorios</a></li>
		     <li><a href="#">Muebles</a></li>
		     <li><a href="#">Electrónica</a></li>
			 <li><a href="#">Instrumentos Musicales</a></li>
			 <li><a href="#">Juegos</a></li>
			 <li><a href="#">Joyas y Relojes</a></li>
			 <li><a href="#">Electrodomésticos</a></li>
	       </ul>
		 </li>
        <li><a href="perfil.php">Inicio</a></li>
        <li><a href="contacto.php">Contacto</a></li>
		<li><a class="active" href="quienesR.php">Quienes somos</a></li>
		<li><a href="subastar.php">Subastar</a></li>
		<li><a href="ayudaR.php">Ayuda</a></li>			
   </ul>		
</div>

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
