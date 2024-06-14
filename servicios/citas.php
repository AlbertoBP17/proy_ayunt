<?php

if (isset($_SESSION["session_id"]))
{
    header("location:servicios.php");
    exit();
}
?>
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
        <div id="flecha">
            <a href="../articulos/servicios.php"><img src="../imagenes/flecha_atras.png" class="flecha_atras"></img></a>
        </div>
        <div id="form_conect">
            <form name="conectarse" method="POST" action="citas.php">
                <fieldset class="fondo_form">
                    <legend>Solicitud de citas con el Alcalde</legend>
                        <br/>
                        <label id="dni">DNI: &nbsp;</label>
                        <input id="dni" name="dni" type="text" placeholder="DNI*" pattern="[0-9]{8}[A-Za-z]{1}" title="Debe poner 8 números y una letra" maxlength="9" size="50" required/>
                        <br/><br/>
                        <label id="motivo">Motivo de la cita: &nbsp;</label>
                        <div class="col-lg-12">
                        <textarea name="motivo" id="motivo" rows="4" cols="50" placeholder="Motivo de la cita con el Alcalde*" required></textarea>
                        </div>
                        <br/><br/>
                        <label id="preferencia">Preferencia horaria: &nbsp;</label>
                            <select name="preferencia">
                                <option selected>Mañana</option>
                                <option >Tarde</option>
                            </select>
                        <br/><br/>
                </fieldset>
                <br/>
                <input type="submit" value="Solicitar cita" class="botonsito" name="insertarcita"/>
            </form>
            <br/>
            <?php

                include_once "../articulos/bbdd.php";
                if (isset($_POST['insertarcita'])){

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

                    $sql = "select * from usuarios where dni = '".$dni_form."'";
                    $resultado_sql = mysqli_query($conexion, $sql);

                    if(mysqli_num_rows($resultado_sql)==1){
                        // Caso en el que no existe ya ese dni
                        // HACER REGISTRO
                        $sql = "insert into citas (dni, motivo, preferencia) value ('".$dni_form."', '".$motivo_form."', '".$preferencia_form."')";
                        $resultado_sql = mysqli_query($conexion, $sql);

                        if ($resultado_sql==true){
                            echo '<p class="texto_volver">Cita registrada correctamente</p>';
                        } else {
                            echo "Error en la inserción de la cita ".mysqli_connect();	
                        }
                        
                    } else {
                    echo '<p class="texto_volver">ERROR. No se ha encontrado un usuario con ese DNI.</p>';
                    }

                } else {
                    echo '<p class="texto_volver">ERROR. Todos los campos del formulario deben estar rellenos</p>';
                }

                }
                ?>
        </div>
<?php
	session_start();
	if (isset($_SESSION['errores'])) {
		echo "<p>".$_SESSION['errores']."</p>";
	}
?>
    </body>
</html>