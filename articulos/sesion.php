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
            <a href="../articulos/principal.html"><img src="../imagenes/flecha_atras.png" class="flecha_atras"></img></a>
        </div>
        <div id="form_conect">
            <form name="conectarse" method="POST" action="compruebalogin.php">
                <fieldset class="fondo_form">
                    <legend>Control de usuarios</legend>
                        <br/>
                        <label id="correo">Correo: &nbsp;</label>
                        <input id="correo" name="correo" type="email" pattern=".+@gmail.com" placeholder="Email*" title="El formato correcto es @gmail.com" maxlength="80" size="50" required/>
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
<?php
	session_start();
	if (isset($_SESSION['errores'])) {
		echo "<p>".$_SESSION['errores']."</p>";
	}
?>
    </body>
</html>