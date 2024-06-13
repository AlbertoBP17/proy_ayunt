<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Ayuntamiento Rociana del Condado</title>
        <link rel="stylesheet" type="text/css" href="../estilos/style.css"/>
        <link rel="icon" type="image/icon" href="../imagenes/favicon.ico" sizes="any"/>
    </head>
    <body class="principal">
        <div id="titulo">
            <p class="texto_titulo">Ayuntamiento Rociana del Condado</p>
        </div>
        <div id="form_conect">
            <form name="conectarse" method="POST" action="compruebalogin.php">
                <fieldset class="fondo_form">
                    <legend>Control de usuarios</legend>
                        <br/>
                        <label id="correo">Correo: &nbsp;</label>
                        <input id="correo" name="correo" type="email" placeholder="Email*" title="El formato correcto es @gmail.com" maxlength="80" size="50" required/>
                        <br/><br/>
                        <label id="contraseña">Contraseña: &nbsp;</label>
                        <input id="contraseña" name="contraseña" type="password" placeholder="Contraseña*" maxlength="30" size="20" required/>
                        <br/><br/>
                </fieldset>
                <br/>
                <input type="submit" value="Iniciar sesión" class="botonsito"/>
            </form>
            <br/>
            <a href="registro.php"><input type="submit" value="Nuevo registro" class="botonsito"></a>
        </div>

		<div id="php">
<?php
	
	include_once "bbdd.php";
	include_once "comunes.php";

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
				session_start();
                $_SESSION["session_id"] = session_id();
				        $_SESSION["usuario_session"] = $_POST["correo"];  
				header ("Location: servicios.php");
				exit();
			} else {
				echo "ERROR. El correo y/o la contraseña son incorrectos<br/>";	
			}
		} else {
			echo "ERROR. El correo y/o la contraseña son incorrectos<br/>";
		}

	} else {
		echo "ERROR. El correo y/o la contraseña no están rellenos<br/>";
	}

		echo "<a href='sesion.php'>Vuelva a intentar iniciar sesión de nuevo</a>";
?>
		</div>
	</body>
</html>