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
                <fieldset>
                    <legend>Control de usuarios</legend>
                        <br/>
                        <label id="correo">Correo: &nbsp;</label>
                        <input id="correo" name="correo" type="email" placeholder="Email*" maxlength="80" size="50" required/>
                        <br/><br/>
                        <label id="contraseña">Contraseña: &nbsp;</label>
                        <input id="contraseña" name="contraseña" type="password" placeholder="Contraseña*" maxlength="30" size="20" required/>
                        <br/><br/>
                </fieldset>
                <br/>
                <input type="submit" value="Acceder"/>
            </form>
            <br/>
            <a href="registro.php"><input type="submit" value="Nuevo registro"></a>
        </div>

<?php
	session_start();
	if (isset($_SESSION['errores'])) {
		echo "<p>".$_SESSION['errores']."</p>";
	}
?>
    </body>
</html>