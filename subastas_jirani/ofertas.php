<?php 
	session_start();
	require_once("conexion.php");
	if((isset($_SESSION["nombre_usuario"])))
	{
		include("vistaRegistrado.html");
		
	}
?>