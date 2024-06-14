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
        <form name="conectarse" method="POST" action="registrocita.php">
                <fieldset class="fondo_form">
                    <legend>Solicitud de citas con el Alcalde</legend>
                        <br/>
                        <label id="dni">DNI: &nbsp;</label>
                        <input id="dni" name="dni" type="text" placeholder="DNI*" pattern="[0-9]{8}[A-Za-z]{1}" title="Debe poner 8 números y una letra" maxlength="9" size="50" required/>
                        <br/><br/>
                        <label id="motivo">Motivo de la cita: &nbsp;</label>
                        <input id="motivo" name="motivo" type="text" placeholder="Motivo de la cita con el Alcalde*" maxlength="300" size="50" required/>
                        <br/><br/>
                        <label id="preferencia">Preferencia horaria: &nbsp;</label>
                        <input id="preferencia" name="preferencia" type="radio"required/>Mañana
                        <input id="preferencia" name="preferencia" type="radio"required/>Tarde
                        <br/><br/>
                </fieldset>
                <br/>
                <input type="submit" value="Solicitar cita" class="botonsito"/>
            </form>
            <br/>
        </div>
    </body>
    <p id="texto_volver">
		<a id="texto_volver" href="../articulos/servicios.php">Volver al apartado de servicios</a>
	</p>


	<div id="php">
<?php

	include_once "bbdd.php";
	
	if (isset($_POST['dni']) and $_POST['dni']!="" and 
		isset($_POST['motivo']) and $_POST['motivo']!="" and
		isset($_POST['preferencia']) and $_POST['preferencia']!="") {

		$dni_form = $_POST['dni'];
		$motivo_form = $_POST['motivo'];
		$preferencia_form = $_POST['preferencia'];

		$conexion = mysqli_connect($server, $user, $password, $bbdd);

		if (!$conexion) {
			die ("Error en la conexión a la base de datos: " . mysqli_connect_error());
		}

		$sql = "select * from citas where dni = '".$dni_form."'";
		$resultado_sql = mysqli_query($conexion, $sql);

		if(mysqli_num_rows($resultado_sql)==0){
			// Caso en el que no existe ya ese dni
			// HACER REGISTRO
			$sql = "insert into citas (dni, motivo, preferencia) value ('".$dni_form."', '".$motivo_form."', '".$preferencia_form."')";
			$resultado_sql = mysqli_query($conexion, $sql);

			if ($resultado_sql==true){
				echo "Cita registrada correctamente<br/>";
			} else {
				echo "Error en la inserción de la cita ".mysqli_connect();	
			}
			
		} else {
			echo "ERROR. Ya hay una cita registrada en el sistema.<br/>";
		}

	} else {
		echo "ERROR. Todos los campos del formulario deben estar rellenos<br/>";
	}

	echo "<a href='../articulos/servicios.php'>Vuelva a la zona de servicios para continuar!!</a>";

?>

	</div>
</html>