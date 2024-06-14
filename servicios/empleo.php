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
                include_once "../articulos/bbdd.php";
                $conexion = mysqli_connect($server, $user, $password, $bbdd);

                    if (!$conexion) {
                        die ("Error en la conexión a la base de datos: " . mysqli_connect_error());
                    }

                    $sql = "select * from oferta_empleo";
                    $resultado_sql = mysqli_query($conexion, $sql);
                    $ofertas = mysqli_fetch_all($resultado_sql,MYSQLI_ASSOC);
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
            <div class="container p-2 my-3">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="shadow p-3 mb-3 bg-white rounded">
                    <div class="text-center">
                        <h3> Ofertas de empleo</h3>
                    </div>
                    <table class="table table-hover table-striped table-warning">
                        <thead>
                            <tr>
                                <th scope="col">Descripción</th>
                                <th scope="col">Vigencia</th>
                            </tr>
                        </thead>
                        <tbody>
                             <!--bloque PHP para cargar el select con los datos de la BD. -->
                             <?php foreach($ofertas as $oferta){ ?>
							<tr>
								<td><?php echo $oferta['descripcion'] ?></td>
								<td><?php echo $oferta['vigencia'] ?></td>
							</tr>
							<?php } ?>                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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