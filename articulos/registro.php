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
            <form method="POST" action="crearusuario.php">
                <fieldset class="fondo_form">
                    <legend>Registro de nuevos usuarios</legend>
                        <br/>
                        <label id="dni">DNI: &nbsp;</label>
                        <input id="dni" name="dni" type="text" placeholder="DNI*" pattern="[0-9]{8}[A-Za-z]{1}" title="Debe poner 8 números y una letra" maxlength="9" size="50" required/>
                        <br/><br/>
                        <label id="nombre">Nombre: &nbsp;</label>
                        <input id="nombre" name="nombre" type="text" placeholder="Nombre*" maxlength="40" size="50" required/>
                        <br/><br/>
                        <label id="correo">Correo: &nbsp;</label>
                        <input id="correo" name="correo" type="email" placeholder="Email*" pattern=".+@gmail.com" title="El formato correcto es @gmail.com" maxlength="60" size="50" required/>
                        <br/><br/>
                        <label id="contraseña">Contraseña: &nbsp;</label>
                        <input id="contraseña" name="contraseña" type="password" placeholder="Contraseña*" maxlength="20" size="20" required/>
                        <br/><br/>
                </fieldset>
                <br/>
                <input type="submit" value="Registrarse" class="botonsito"/>
            </form>
            <br/>
        </div>
    </body>
    <p id="texto_volver">
		<a id="texto_volver" href="sesion.php">Volver a página de login</a>
	</p>
</html>