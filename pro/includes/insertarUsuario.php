<?php 
	require_once("conectar.php");
	require_once("funciones.php");

	$correo = $_POST['correo'];
	$password = $_POST['password'];
	insertUsuario($correo, $password);
	header("Location:usuarios.php");
?>