<script type="text/javascript" src="./calendario/calendarDateInput.js">

/***********************************************
* Jason's Date Input Calendar- By Jason Moon http://calendar.moonscript.com/dateinput.cfm
* Script featured on and available at http://www.dynamicdrive.com
* Keep this notice intact for use.
***********************************************/

</script>

<?php 
  session_start();
  include("vistaRegistrado.html"); 
  require_once("conexion.php");
  if(($_SESSION["nombre_usuario"]))
  {
?>

<script type="text/javascript">
	var a = document.getElementById("subastar");
	a.className = "active";
</script>


<div class="subasta">

   <h4>
   <br>
   <form enctype="multipart/form-data" name="subasta" method="post" action="addSubasta.php">
     <label>Nombre del producto:</label><br>
     <input type="text" name="nombre" ><br>
	 <div id="div_nombre"></div>
	 <br>
	
     <label>Descripción:</label><br>
     <textarea type="text" name="descripcion" cols="50" rows="5" maxlength="500"></textarea><br>
	 <div id="div_descripcion"></div>
	 <br>
	 
     <label>Categoría:</label> <br>
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
     </select> <br>
	 <div id="div_categoria"></div>
	 <br>
	 
	 <label>Imagen:</label><br>
	 <input name="imagen" type="file"/> <br>
	 <div id="div_imagen"></div>
	 <br>
	
	 <label>Fecha y hora de fin:</label><br>
	 <script>DateInput('fecha_fin', true, 'YYYY-MM-DD', '<?php echo date("Y-M-d", strtotime("+15 days")) ?>')</script>
	 <input name="hora" type="time" value="00:00"> <br>
	 <div id="div_fecha"></div>
	 <br>
	 <hr>
	 <input type="button" value="Cancelar" title="Cancelar" onClick="history.back();" />
     &nbsp;&nbsp;
     <input type="button" value="Crear subasta" title="Crear subasta" onClick="verificarSubasta()"/>
     
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
