<?php

	session_start();
	
	include_once "bbdd.php";

	$correo_form = "";
	$contraseña_form = "";

	if (isset($_POST['correo']) and $_POST['correo']!="" and 
		isset($_POST['contraseña']) and $_POST['contraseña']!="") {

		$correo_form = $_POST['correo'];
		$contraseña_form = $_POST['contraseña'];

	$conexion = mysqli_connect($server, $user, $password, $bbdd);

	if ($conexion==false) {
			die("Error en la conexión a la base de datos: " .mysqli_connect_error());
		}

	$sql = "select * from usuarios where correo = '".$correo_form."'";
	$resultado_sql = mysqli_query($conexion, $sql);

	if(mysqli_num_rows($resultado_sql)==1){
			$correo = mysqli_fetch_array($resultado_sql, MYSQLI_ASSOC);
			if($contraseña_form==$correo['contraseña']){
				echo "Credenciales correctas<br/>";
				header ("Location: principal.html");
			} else {
				echo "ERROR. El correo y/o la contraseña son incorrectos<br/>";	
			}
		} else {
			echo "ERROR. El correo y/o la contraseña son incorrectos<br/>";
		}

	} else {
		echo "ERROR. El correo y/o la contraseña no están rellenos<br/>";
	}

		echo "<a href='sesion.php'>Volver al menú principal para iniciar sesión</a>";
?>
