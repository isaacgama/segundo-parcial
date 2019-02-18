<?php 
	session_start();
	error_reporting(0);
	$varsesion = $_SESSION['usuario'];

	if (isset($varsesion)){
	?>
<!DOCTYPE html>
<html>
<head>
	<title>
		<h1>hola</h1>
	</title>
</head>
<body>

</body>
</html>
<?php 
	}
	else 
	{
		header("Location:index.php");
	}
?>