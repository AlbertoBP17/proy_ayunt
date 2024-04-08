<?php

	include_once "bbdd.php";
	
	if (isset($_POST['dni']) and $_POST['dni']!="" and 
		isset($_POST['nombre']) and $_POST['nombre']!="" and
		isset($_POST['correo']) and $_POST['correo']!="" and
		isset($_POST['contraseña']) and $_POST['contraseña']!="") {

		$dni_form = $_POST['dni'];
		$nombre_form = $_POST['nombre'];
		$correo_form = $_POST['correo'];
		$contraseña_form = $_POST['contraseña'];

		$conexion = mysqli_connect($server, $user, $password, $bbdd);

		if (!$conexion) {
			die ("Error en la conexión a la base de datos: " . mysqli_connect_error());
		}

		$sql = "select * from usuarios where dni = '".$dni_form."'";
		$resultado_sql = mysqli_query($conexion, $sql);

		if(mysqli_num_rows($resultado_sql)==0){
			// Caso en el que no existe ya ese dni
			// HACER REGISTRO
			$sql = "insert into usuarios (dni, nombre, correo, contraseña) value ('".$dni_form."', '".$nombre_form."', '".$correo_form."', '".$contraseña_form."')";
			$resultado_sql = mysqli_query($conexion, $sql);

			if ($resultado_sql==true){
				echo "Usuario registrado correctamente<br/>";
			} else {
				echo "Error en la inserción del usuario ".mysqli_connect();	
			}
			
		} else {
			echo "ERROR. DNI ya existente en el sistema. Use otro distinto.<br/>";
		}

	} else {
		echo "ERROR. Todos los campos del formulario deben estar rellenos<br/>";
	}

	echo "<a href='sesion.php'>Volver e iniciar sesión</a>";

?>