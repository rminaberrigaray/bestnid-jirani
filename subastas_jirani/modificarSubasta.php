<?php 
  session_start();
  if(($_SESSION["nombre_usuario"]))
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
	 $consul="SELECT * FROM categoria
     WHERE id_categoria NOT IN (SELECT id_categoria
     FROM categoria WHERE id_categoria =3)";
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
     <input id="file-upload" name="imagen" type="file" accept="image/*" value="">
	 
	 <script>
	 function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
 
            reader.onload = function (e) {
                var filePreview = document.createElement('img');
                filePreview.id = 'file-preview';
                //e.target.result contents the base64 data from the image uploaded
                filePreview.src = e.target.result;
                console.log(e.target.result);
 
                var previewZone = document.getElementById('div_imagen');
                previewZone.appendChild(filePreview);
            }
 
            reader.readAsDataURL(input.files[0]);
        }
    }
 
    var fileUpload = document.getElementById('file-upload');
    fileUpload.onchange = function (e) {
        readFile(e.srcElement);
    }
	</script>
	</input>
	<br>
	<?php
	 
     echo '<img src="data:image/jpeg;base64,'.base64_encode($reg["imagen"]).'"/>';
     ?>
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
	   echo "<script type='text/javascript'>
	   alert('Usted no esta logueado');
	   window.location='index.php';
	   </script>";
   }
?>