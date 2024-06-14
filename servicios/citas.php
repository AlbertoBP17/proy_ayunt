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
<?php
	session_start();
	if (isset($_SESSION['errores'])) {
		echo "<p>".$_SESSION['errores']."</p>";
	}
?>
    </body>
</html>