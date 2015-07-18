<?php
	require_once("conexion.php");
	include("funcionesAdministrador.php");
?>
<script type="text/javascript">
	var a = document.getElementById("categorias");
	a.className = "active";
</script>

<?php if(isset($_POST["msj_mensaje"])) {?> <div class="mensaje"> <?php echo $_POST["msj_mensaje"]; ?> </div> <?php } ?>

<h4>
     <form name="categoria" id="categoria" method="post" action="addCategoria.php">
	
     <label>Crear un categoria</label><br><br>
     <label style="margin-left: 3px">Nombre:</label>
     <input type="text" name="nombre"><br>
	 <div id="div_name"></div>
	 <hr>
	 <input type="button" value="Cancelar" title="Cancelar" onClick="history.back();" />
     &nbsp;&nbsp;
     <input type="button" value="Enviar" title="Enviar" onClick="validarCategoria();"/>
     
     </form>
     <br>  
     <h4>