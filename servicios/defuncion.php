<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Ayuntamiento Rociana del Condado</title>
        <link rel="stylesheet" type="text/css" href="../estilos/style.css"/>
        <link rel="icon" type="image/icon" href="../imagenes/favicon.ico" sizes="any"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="principal">
        <div id="titulo">
            <?php
                session_start();
                if (isset($_SESSION["session_id"])){
                    echo '<b class="usuario">Bienvenid@: '.$_SESSION["usuario_session"].'</b>';
                echo '<a href="../articulos/cerrar_sesion.php" class="cierre_sesion">Cerrar Sesion</a>';
                }
            ?>
                <p class="texto_titulo">Ayuntamiento Rociana del Condado</p>
            
        </div>
        <div id="principal">
            <div id="encabezado">
                <div id="browser">
                    <a href="../articulos/principal.html" class="browser_item">Inicio</a>
                    <a href="../articulos/ayuntamiento.html" class="browser_item">Ayuntamiento</a>
                    <a href="../articulos/concejalias.html" class="browser_item">Equipo de Gobierno</a>
                    <a href="../articulos/proyecto_punto_vuela.html" class="browser_item">Proyecto Punto Vuela</a>
                    <a href="../articulos/servicios.php" class="browser_item">Servicios</a>
                    <a href="../articulos/datos_interes.html" class="browser_item">Datos de interes</a>
                    <a href="https://discord.gg/KyTBVZAVay" target="blank"><img src="../imagenes/logo_discord.png" id="discord"/></a>
                </div>
            </div>
            <div id="flecha">
                <a href="../articulos/servicios.php"><img src="../imagenes/flecha_atras.png" class="flecha_atras"></img></a>
            </div>
            <div id="defuncion">
                <?php
                if (isset($_SESSION["session_id"])){
                    echo '<b class="defuncion">Estamos al tanto de que un familiar del usuario: '.$_SESSION["usuario_session"].' ha fallecido</b>';
                    echo '<br/>';
                    echo '<b class="defuncion">Aquí puedes previsualizar el Certificado de defunción. De todos modos nos encargamos de enviartelo al correo registrado. Lamentamos mucho su pérdida irreparable.</b>';
                    echo '<br/><br/>';
                    echo '<b class="defuncion">Revise el correo electrónico para verificar que ya cuenta con el certificado</b>';
                }   
            ?>
            </div>
            <iframe class="visor_pdf" src="../documentos/Definición_Proyecto_ABP.pdf" type="application/pdf" width="90%" height="600em"></iframe>
            <div id="pie_pagina">
                <div id="contenido_pie">
                    <p class="color_texto"><b>Ayuntamiento de Rociana del Condado</b> &copy; 2024 | Diseñado por Alberto Betanzos</p>
                    <a href="https://www.instagram.com/?hl=es" target="black"><img src="../imagenes/instagram.png" class="redessoc"></a>
                    <a href="https://www.facebook.com/" target="black"><img src="../imagenes/facebook.png" class="redessoc"></a>
                </div>
            </div>
        </div>
    </body>
</html>