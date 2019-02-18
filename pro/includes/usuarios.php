<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<body>
	<?php 
	require_once("conectar.php");
	?>
	<form action="insertarUsuario.php" method="POST">

		<div class="campo">
			<label for="correo">Correo Electrónico</label>
			<input type="text" name="correo">
		<div class="campo">
		<div class="campo">
			<label for="password">contraseña</label>
			<input type="text" name="password">
		</div>
			<input type="submit" value="Insertar">
		</div>
	</form>
</body>
</html>