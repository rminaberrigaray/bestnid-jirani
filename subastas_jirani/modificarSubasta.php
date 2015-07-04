<?php 
  session_start();
  if (isset($_SESSION["nombre_usuario"]))
  {
	include("vistaRegistrado.html");
	require_once("conexion.php");
	$consul="SELECT * FROM subasta s INNER JOIN imagen i ON s.id_imagen = i.id_imagen
    INNER JOIN categoria c ON s.id_categoria= c.id_categoria
    WHERE s.id_subasta = ".$_GET["idSubasta"]." ";
    $subasta=mysql_query($consul);	

	if ($reg=mysql_fetch_array($subasta))
	{
?>
	
 <div class="subasta">
   <h4>
   <form enctype="multipart/form-data" name="subasta" method="post" action="editarSubasta.php">
     <label>Nombre del producto:</label><br>
	 <div id="div_nombre"></div>
     <input type="text" name="nombre" value="<?php echo $reg["nombre_producto"];?>"><br>
	 <br>
	
     <label>Descripción:</label><br>
	 <div id="div_descripcion"></div>
     <textarea type="text" name="descripcion" cols="50" rows="5" maxlength="500"><?php echo $reg["descripcion"];?></textarea><br>
	 <br>
	 
     <label>Categoría:</label> <br>
	 <div id="div_categoria"></div>
     <select name="categoria">
     <option value="<?php echo $reg["id_categoria"];?>" selected><?php echo $reg["nombre"];?></option>
     <?php 
	 $id=  $reg["id_categoria"];
	 $consul="SELECT * FROM categoria
     WHERE id_categoria NOT IN (SELECT id_categoria
     FROM categoria WHERE id_categoria = '$id' )";
     $result=mysql_query($consul);
	 
     while($categoria=mysql_fetch_array($result))
     {
       ?>
        <option value="<?php echo $categoria["id_categoria"]; ?>"><?php echo $categoria["nombre"]; ?></option>
       <?php
     }
	
     ?>
     </select> <br>
	 <br>
	 
	 <label>Imagen:</label><br>
	 <div id="div_imagen"></div>
	 
	 
     <input type="file" name="imagen" class="upload-image" data-placeholder= "<?php echo ("data:image/*;base64,".base64_encode($reg["imagen"])); ?>" modificar="true" />

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
	<br>
	<br>
	 <label>Fecha y hora de fin:</label><br>
	 <?php $fecha = date_create($reg["fecha_fin"]);
		echo date_format($fecha, 'd-m-Y H:i:s');?>
	 <div id="div_fecha"></div>

	 <hr>
	
	 <input type="hidden" name="id_subasta" value="<?php echo $_GET["idSubasta"];?>">
	 <input type="hidden" name="id_imagen" value="<?php echo $reg["id_imagen"];?>">
	 <input type="hidden" name="fecha_fin" value="<?php echo date("Y-M-d", strtotime("+15 days"));?>">
	 
	 <input type="button" value="Cancelar" title="Cancelar" onClick="history.back();" />
     &nbsp;&nbsp;
     <input type="button" value="Modificar subasta" title="Modificar subasta" onClick="verificarSubasta()"/>
     
   </form>
   <h4>
   </div>
   <?php
   }
   ?>
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