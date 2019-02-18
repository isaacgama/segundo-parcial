	<?php  
	require_once("conectar.php");
	require_once("funciones.php");

	$nombre = $_POST['nombre'];
	$password = $_POST['password'];
	
	$filas = validarusuario('usuario', $nombre, $password);
		if ($filas > 0) 
			{
				session_start();
				error_reporting(0);
				$_SESSION['usuario'] = $nombre;
				header("Location: menu.php");
			}
		else 
			{
				echo "Error en la contraseña o usuario";
			}
?>		

