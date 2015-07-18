<script type="text/javascript" src="./calendario/calendarDateInput.js">

/***********************************************
* Jason's Date Input Calendar- By Jason Moon http://calendar.moonscript.com/dateinput.cfm
* Script featured on and available at http://www.dynamicdrive.com
* Keep this notice intact for use.
***********************************************/

</script>

<?php 
  session_start();
  require_once("conexion.php");
  if(isset($_SESSION["nombre_usuario"]))
  {
	include("vistaRegistrado.html");
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
	 <div id="div_nombre"></div>
     <input type="text" name="nombre" ><br>
	 <br>
	
     <label>Descripción:</label><br>
	 <div id="div_descripcion"></div>
     <textarea type="text" name="descripcion" cols="50" rows="5" maxlength="500"></textarea><br>
	 <br>
	 
     <label>Categoría:</label> <br>
	 <div id="div_categoria"></div>
     <select name="categoria">
     <option value="0">Seleccione una categoria</option>
     <?php
	 $consul="SELECT * FROM categoria
	 WHERE eliminado = 0 
	 order by nombre asc";
     $result=mysql_query($consul);
	 
     while($categoria=mysql_fetch_array($result))
     {
       ?>
        <option value="<?php echo $categoria["nombre"]; ?>"><?php echo $categoria["nombre"]; ?></option>
       <?php
     }
	
     ?>
     </select> <br>
	 <br>
	 
	 <label>Imagen:</label><br>
	 <div id="div_imagen"></div>
	  <input type="file" name="imagen" class="upload-image" data-placeholder="" />

	 <script>
		Array.prototype.forEach.call(
			document.getElementsByClassName("upload-image"),
			function(fileElement) {
				var previewElement = document.createElement("img");
				previewElement.style.display = "block";
				previewElement.style.maxWidth = "200px";
				previewElement.style.maxHeight = "200px";
				fileElement.parentNode.insertBefore(previewElement, fileElement);
				
				var fileReader = new FileReader();
				
				fileReader.onload = function(event) {
					previewElement.src = event.target.result;
				};
				
				fileElement.addEventListener("change", updateImagePreview, false);
				updateImagePreview();
				
				function updateImagePreview() {
					var file = fileElement.files[0];
					if (file) {
						fileReader.readAsDataURL(file);
					} else {
						var placeholderSrc = fileElement.getAttribute("data-placeholder");
						if (placeholderSrc) {
							previewElement.src = placeholderSrc;
						} else {
							previewElement.removeAttribute("src");
						}
					}
				}
			}
		);
</script>
<br><br>
	
	 <label>Fecha y hora de fin:</label><br>
	 <div id="div_fecha"></div>
	 <script>DateInput('fecha_fin', true, 'YYYY-MM-DD', '<?php echo date("Y-M-d", strtotime("+15 days")) ?>')</script>
	 <input name="hora" type="time" value="00:00"> <br>
	 <br>
	 <hr>
	 <input type="button" value="Crear subasta" title="Crear subasta" onClick="verificarSubasta()"/>
	 &nbsp;&nbsp;
	 <input type="button" value="Cancelar" title="Cancelar" onClick="location.href = 'subastas.php';" />
     
     
     
   </form>
   <h4>


</div>
</body>  
</html>
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