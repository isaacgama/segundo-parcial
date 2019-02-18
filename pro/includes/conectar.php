
<?php
	$db = "desarrolloweb"; //Está será el nombre de mi base de datos
	$usuario = "holamundo"; //Está será el nombre de mi usuario
	$password = "holamundo123"; //Está será la contraseña de mi usuario
	$server = "gpcamaras.com"; //Está será la URL de mi servidor

	$conectar = mysqli_connect($server, $usuario, $password, $db);
	if(!$conectar) {
		echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
	?>