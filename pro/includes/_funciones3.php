<?php
	require_once("conectar.php");
	require_once("funciones.php");

	$nombre = $_POST['nombre'];
	$password = $_POST['password'];
	
	$filas = validarusuario('usuarios', $nombre, $password);
		if ($filas > 0 ) 
			{
				$permi=selectWherevar('usuarios',$nombre,$password);
	            $accseso=mysqli_fetch_array($permi);
				if ($accseso['status']==1) {
								
				session_start();
				error_reporting(0);
				$_SESSION['usuario'] = $nombre;
				header("location: ../consultaUsuarios.php");
				}
				else{
					echo "Usuario Desabilitado Contacte con el Administrador";
				}
			}
		else 
			{
				echo "Error en la contraseña o usuario";
			}
?>		