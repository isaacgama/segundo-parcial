<?php 
//require_once("conectar.php")
	switch ($_POST["accion"]) {
		case 'login':
			login();
			break;
		
		default:
			# code...
			break;
	}

	function login (){

	$usuario= 'usuario';
	$password= 'password';
		
	$filas = validarusuario('login', $usuario, $password);
		if ($filas > 0) 
			{
				session_start();
				error_reporting(0);
				$_SESSION['usuario'] = $usuario;
				header("Location: menu.php");
			}
		else 
			{
				echo "Error en la contraseña o contraseña";
			}
?>