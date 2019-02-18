
<!DOCTYPE html>
<html>
<head>
	<meter></meter>
	<title>
		INDEX
	</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/login.css">
</head>
<body class="text-center">
    <form class="form-signin">
  <img class="mb-4" src="../img/logo.jpeg" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Hola Humano</h1>
  <label for="inputEmail" class="sr-only">Email</label>
  <input type="correo" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
  <label for="inputPassword" class="sr-only">Contrasena</label>
  <input type="password" id="inputPassword" class="form-control" placeholder="Contrasena" required>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" id="buttonSing" type="button">Sign in</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
</form>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>


	<script>
		$("#buttonSing").click(function(){
			//1. obtener el valor del email
			let correo = $("#inputEmail").val();
			//val = a valor 

			//2. obtener el valor de password
			let password = $("#inputPassword").val();
			 //alert("tu correo es" + correo + password);
			let obj = {
				"accion" : "login",
				"nombre" : correo,
				"password" : password,
			
			};

			$.post("_funciones.php", obj, function(){

			});
			
			//3. enviar a validar esos valores
			
			//4. en caso de ser valido redireccionar a usuario.php
			//5. no ser valido, enviar un mensaje de error

					});

	</script>
</body>
</html>
