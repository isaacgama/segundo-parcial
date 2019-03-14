<?php 
require_once("_db.php");
switch ($_POST["accion"]) {
	case 'login':
	login();
	break;
	//usuarios
	case 'consultar_usuarios':
	consultar_usuarios();
	break;
	case 'insertar_usuarios':
	insertar_usuarios();
	break;
	case 'editar_usuarios':
		editar_usuarios($_POST["id"]);
	break;
	case 'editar_registro':
		editar_registro($_POST["id"]);
	break;
	case 'eliminar_registro':
		eliminar_usuarios($_POST["id"]);
	break;
	//feature
	case 'carga_foto':
	carga_foto();
	break;
	case 'consultar_features':
	consultar_features();
	break;
	case 'insertar_features':
	insertar_features();
	break;
	case 'eliminar_features':
	eliminar_features($_POST["id"]);
	break;
	case 'ceditar_features':
	ceditar_features($_POST["id"]);
	break;
	case 'editar_features':
	editar_features($_POST["id"]);
	break;


	//main
	break;
	case 'consultar_encabezado':
	consultar_encabezado();
	break;
	case 'insertar_header':
	insertar_encabezado();
	break;
	case 'eliminar_encabezado':
	eliminar_encabezado($_POST["id"]);
	break;
	case 'ceditar_encabezado':
	ceditar_encabezado($_POST["id"]);
	break;
	case 'editar_encabezado':
	editar_encabezado($_POST["id"]);
	break;

//works
	case 'consultar_works':
	consultar_works();
	break;
	case 'insertar_works':
	insertar_works();
	break;
	case 'consultar_ourteam':
	consultar_ourteam();
	break;
	case 'insertar_ourteam':
	insertar_ourteam();
	break;


	default:
	break;
}
function consultar_usuarios(){
	global $mysqli;
	$consulta = "SELECT * FROM usuarios";
	$resultado = mysqli_query($mysqli, $consulta);
	$arreglo = [];
	while($fila = mysqli_fetch_array($resultado)){
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); 
}


function editar_usuarios($id){
	global $mysqli;
	$nombre = $_POST["nombre"];
	$correo = $_POST["correo"];	
	$password = $_POST["password"];	
	$telefono = $_POST["telefono"];	
	$consulta = "UPDATE usuarios SET nombre_usr = '$nombre', correo_usr = '$correo', password = '$password', telefono_usr = '$telefono' WHERE id_usr = $id";
	$resultado = mysqli_query($mysqli, $consulta);
    echo "Se edito el usuario correctamente";

}
function editar_registro($id){
    global $mysqli;
    $consulta = "SELECT * FROM usuarios WHERE id_usr = '$id'";
    $resultado = mysqli_query($mysqli,$consulta);
    
    $fila = mysqli_fetch_array($resultado);
    echo json_encode($fila);
  }

function eliminar_usuarios($id){
	global $mysqli;
	$consulta = "DELETE FROM usuarios WHERE id_usr =$id";
	$resultado = mysqli_query($mysqli, $consulta);
	if ($resultado) {
		echo "Se elmino correctamente";
		# code...
	}else{
		echo "Se genero un error intenta nuevamente";
	}
}

function insertar_usuarios(){
	global $mysqli;
	$nombre_usr = $_POST["nombre"];
	$correo_usr = $_POST["correo"];	
	$password= $_POST["password"];	
	$telefono_usr = $_POST["telefono"];	
	$consul1 = "INSERT INTO usuarios VALUES('','$nombre_usr','$correo_usr','$password', '$telefono_usr', 1)";
	$resul1 = mysqli_query($mysqli, $consul1);
		echo "Se inserto el usuario en la BD ";
		
}

//---------------------------------------------------------------------------------------------------------
													//MAIN//
function consultar_encabezado(){
	global $mysqli;
	$consulta = "SELECT * FROM main";
	$resultado = mysqli_query($mysqli, $consulta);
	$arreglo = [];
	while($fila = mysqli_fetch_array($resultado)){
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); //Imprime el JSON ENCODEADO
}

function insertar_encabezado(){
	global $mysqli;
	$TituMa = $_POST["titulo"];
	$SubtituMA = $_POST["subtitulo"];	
	$BotMA = $_POST["boton"];	
	$consultain = "INSERT INTO main VALUES('','$TituMa','$SubtituMA','$BotMA')";
	$resultadoin = mysqli_query($mysqli, $consultain);
	$arregloin = [];
	while($filain = mysqli_fetch_array($resultadoin)){
		array_push($arregloin, $filain);
	}
	echo "Se inserto el usuario en la BD"; //Imprime el JSON ENCODEADO
}




function eliminar_encabezado($id){
	global $mysqli;
	$consulta = "DELETE FROM main WHERE idMa = $id";
	$resultado = mysqli_query($mysqli, $consulta);
	if ($resultado) {
		echo "Se elimino correctamente";
	}
	else{
		echo "Se genero un error intenta nuevamente";
	}
}
function ceditar_encabezado($id){
	global $mysqli;
	$consulta = "SELECT * FROM main WHERE idMa = '$id'";
	$resultado = mysqli_query($mysqli, $consulta);
	$fila = mysqli_fetch_array($resultado);
	    echo json_encode($fila);
	}

function editar_encabezado($id){
	global $mysqli;
	$TituMa = $_POST["titulo"];
	$SubtituMA = $_POST["subtitulo"];	
	$BotMA = $_POST["boton"];	
	$consultain = "UPDATE main SET TituMa = '$TituMa',SubtituMA = '$SubtituMA', BotMA = '$BotMA' WHERE idMa = $id";
	$resultadoin = mysqli_query($mysqli, $consultain);
    echo "Se edito Main correctamente";
}

/////FEATURES
function consultar_features(){
	global $mysqli;
	$consulta = "SELECT * FROM features";
	$resultado = mysqli_query($mysqli, $consulta);
	$arreglo = [];
	while($fila = mysqli_fetch_array($resultado)){
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); //Imprime el JSON ENCODEADO
}
function insertar_features(){
	global $mysqli;
	$img_fe = $_POST["imagen"];
	$titulo_fe = $_POST["titulo"];	
	$subtitulo_fe = $_POST["subtitulo"];	
	$consultain = "INSERT INTO features VALUES('','$img_fe','$titulo_fe','$subtitulo_fe')";
	$resultadoin = mysqli_query($mysqli, $consultain);
	$arregloin = [];
	while($filain = mysqli_fetch_array($resultadoin)){
		array_push($arregloin, $filain);
	}
	echo json_encode($arregloin); //Imprime el JSON ENCODEADO
}
function eliminar_features($id){
	global $mysqli;
	$consulta = "DELETE FROM features WHERE id_fe = $id";
	$resultado = mysqli_query($mysqli, $consulta);
	if ($resultado) {
		echo "Se elimino correctamente";
	}
	else{
		echo "Se genero un error intenta nuevamente";
	}
}
function ceditar_features($id){
	global $mysqli;
	$consulta = "SELECT * FROM features WHERE id_usr = '$id'";
	$resultado = mysqli_query($mysqli, $consulta);
	$fila = mysqli_fetch_array($resultado);
	    echo json_encode($fila);
	}

function editar_features($id){
	global $mysqli;
	$img_fe = $_POST["imagen"];
	$titulo_fe = $_POST["titulo"];	
	$subtitulo_fe = $_POST["subtitulo"];	
	$consultain = "UPDATE features SET img_fe = '$img_fe',titulo_fe= '$titulo_fe', subtitulo_fe = '$subtitulo_fe' WHERE id_fe = $id";
	$resultadoin = mysqli_query($mysqli, $consultain);
    echo "Se edito Feature correctamente";
}
function carga_foto(){
	if (isset($_FILES["foto"])) {
		$file = $_FILES["foto"];
		$nombre = $_FILES["foto"]["name"];
		$temporal = $_FILES["foto"]["tmp_name"];
		$tipo = $_FILES["foto"]["type"];
		$tam = $_FILES["foto"]["size"];
		$dir = "../img/usuarios/";
		$respuesta = [
			"archivo" => "img/usuarios/logotipo.png",
			"status" => 0
		];
		if(move_uploaded_file($temporal, $dir.$nombre)){
			$respuesta["archivo"] = "img/usuarios/".$nombre;
			$respuesta["status"] = 1;
		}
		echo json_encode($respuesta);
	}
}
//---------------------------------------------------------------------------------------------------------

function consultar_works(){
	global $mysqli;
	$consul2 = "SELECT * FROM works";
	$resul2 = mysqli_query($mysqli, $consulta);
	$arre2 = [];
	while($fila2 = mysqli_fetch_array($resul2)){
		array_push($arre2, $fila2);
	}
	echo json_encode($arre2); 
}
function insertar_works(){
	global $mysqli;
	$imgW = $_POST["imagen"];
	$proNameW= $_POST["proyecto"];	
	$WebW = $_POST["website"];	
	$consul3= "INSERT INTO works VALUES('','$imgW','$proNameW','$WebW')";
	$resul3 = mysqli_query($mysqli, $consultain);
	$arre3 = [];
	while($fila3 = mysqli_fetch_array($resul3)){
		array_push($arre3, $fila3);
	}
	echo json_encode($arre3);
}


function consultar_ourteam(){
	global $mysqli;
	$consul4 = "SELECT * FROM ourteam";
	$resul4 = mysqli_query($mysqli, $consul4);
	$arre4 = [];
	while($fila4 = mysqli_fetch_array($resul4)){
		array_push($arre4, $fila4);
	}
	echo json_encode($arre4);
}
function insertar_ourteam(){
	global $mysqli;
	$imgO = $_POST["imagen"];
	$nomO = $_POST["nombre"];	
	$cargO = $_POST["cargo"];	
	$consul5 = "INSERT INTO ourteam VALUES('','$imgO','$nomO','$cargO')";
	$resul5 = mysqli_query($mysqli, $consul5);
	$arre5 = [];
	while($fila5 = mysqli_fetch_array($resul5)){
		array_push($arre5, $fila5);
	}
	echo json_encode($arregloin);
}

function login(){
		global $mysqli;

		$correo = $_POST["correo"];
		$pass = $_POST["password"];	

		$consulta = "SELECT * FROM usuarios WHERE correo_usr = '$correo'";
		$resultado = $mysqli->query($consulta);
		$fila = $resultado->fetch_assoc();
		
		if ($fila == 0) 
			{

				echo "[2]";

			}


		else if ($fila["password"] != $pass) 
			{
				$consulta = "SELECT * FROM usuarios WHERE correo_usr = '$correo' AND password = '$pass'";
				$resultado = $mysqli->query($consulta);
				$fila = $resultado->fetch_assoc();

				echo "[0]";

				
			}
				else if($correo == $fila["correo_usr"] && $pass == $fila["password"])
				{

					echo "[1]"	;
					session_start();
					error_reporting(0);

					$_SESSION['usuarios']=$correo;
					echo $correo;
					echo $_SESSION['usuarios'];
  					
					
				}
			}

?>