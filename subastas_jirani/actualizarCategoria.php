<?php
	require_once("conexion.php");
	include("funcionesAdministrador.php");
?>
<script type="text/javascript">
	var a = document.getElementById("categorias");
	a.className = "active";
</script>

<?php if(isset($_POST["msj_mensaje"])) {?> <div class="mensaje"> <?php echo $_POST["msj_mensaje"]; ?> </div> <?php } ?>
<?php
    $consul="SELECT * FROM categoria 
    WHERE id_categoria = ".$_GET["idCategoria"]." ";
    $categoria=mysql_query($consul);	
	if ($reg=mysql_fetch_array($categoria))
	{
     ?>

     <h4>
     <form name="categoria" method="post" action="updateCategoria.php">
	
     <label>Actualizar categoria</label><br><br>
     <label style="margin-left: 3px">Nombre:</label>
     <input type="text" name="nombre" value="<?php echo $reg["nombre"];?>"><br>
	 <div id="div_name"></div>
	 <hr>
	 
	 <input type="hidden" name="idCategoria" value=<?php echo $reg["id_categoria"]; ?>>
	 <input type="button" value="Cancelar" title="Cancelar" onClick="history.back();" />
     &nbsp;&nbsp;
     <input type="button" value="Enviar" title="Enviar" onClick="validarCategoria();"/>
     
     </form>
     <br>  
     <h4>
	 <?php
	}
	?>