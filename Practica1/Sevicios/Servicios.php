<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styleHeader.css">
    <link rel="stylesheet" href="../styles/styleVehiculo.css">
    <link rel="stylesheet" href="../styles/styleServicios.css">
    <link rel="shortcut icon" href="../img/favicon-logo.png" />
    <title>Listado Servicios | Talleres Zamoen</title>
</head>

<body>
    <?php
    session_start();
    include "../biblioteca/funcionesZamoen.php";

    $conn = Conexion();

    $dni = $_SESSION['dni'];

    $name = datosNombre($conn, $dni);

    ?>
    <div class="outer-container">

        <header id="cabecera">
            <div class="vacio">

            </div>
            <div class="logo">
                <a href="../Vehiculos/vehiculo.php?dni=<?php echo $_GET['dni']; ?>">
                    <img id="logo-taller" src="../img/Logo-Coche.png" alt="Logo Talleres Zamoen">
                </a>
            </div>
            <div class="container-info-header">
                <div class="info-usu">
                    <h3><?php echo ucfirst($name); ?></h3>
                    <?php
                    if ($_SESSION['id_admin'] == 1) {
                    ?>
                        <a id="btn-Panel" href="../Login/lista_Admin.php">Volver al Panel</a>
                    <?php
                    }
                    ?>
                    <a id="btn-logOut" href="../Login/logOut.php">Cerrar Sesión</a>
                </div>
                <div class="cookies">
                    <p><?php echo 'Ultima conexion realizada el: ' . $_COOKIE[$_SESSION['dni'] . 'Cookie']; ?></p>
                </div>
            </div>
        </header>

        <!-- incluimos la carpeta con la funcion para conectar a la base de datos -->
        <?php

        //Guardamos en variables los argumentos que cogimos de la pagina vehiculos para luego utilizarlos en consultas
        $dni = $_GET['dni'];
        $matricula = $_GET['matricula'];
        //Realizamos la consulta que nos devuelve los datos del vehiculo seleccionado anteriormente
        $sql =  "SELECT matricula, marca, modelo, año
        FROM lista_vehiculos
        WHERE matricula = '$matricula'";
        //Consulta que devuelve el servicio y su descripcion
        $sql2 =  "SELECT tipo_servicio, descripcion
        FROM lista_servicios
        WHERE id_matricula = (select id_matricula FROM lista_vehiculos
        WHERE matricula = '$matricula')";



        //Guardamos las consulatas y la conexion en dos variables       
        $results = mysqli_query($conn, $sql);
        $results2 = mysqli_query($conn, $sql2);

        //Si hay algun error salta el error 
        if ($results === false) {
            echo mysqli_error($conn);
        } else {

            if (!empty($matricula)) {

        ?>
                <div class="container-view">

                    <table name="datosUsuario" id="datosUsuarios">

                        <th>Matrícula</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Año</th>

                        <?php

                        foreach ($results as $valor) {

                        ?>
                            <tr>
                                <?php
                                foreach ($valor as $k) {
                                ?>
                                    <td><?php echo $k; ?></td>
                                <?php
                                }
                                ?>
                            </tr>
                <?php
                        }
                    }
                }
                ?>
                    </table>

                    <!-- Segunda consulta -->

                    <table name="datosServicios" id="datosServicios">

                        <th>Tipo Servicio</th>
                        <th>Descripcion</th>

                        <?php

                        foreach ($results2 as $valor) {

                        ?>
                            <tr>
                                <?php
                                foreach ($valor as $j) {
                                ?>
                                    <td><?php echo $j; ?></td>
                                <?php
                                }
                                ?>
                            </tr>
                        <?php
                        }

                        mysqli_close($conn);

                        ?>

                    </table>
                        <div class="newvh">
                            <a href="../Sevicios/newServicio.php?dni=<?php echo $_GET['dni']?>&matricula=<?php echo $_GET['matricula']?>"  class="btn newvh">Nuevo Servicio</a>   
                            <a id="comeBack" href=" ../Vehiculos/vehiculo.php?dni=<?php echo $_GET['dni']; ?>">Volver a Vehiculos</a> 
                        </div>
        
                </div>

</body>

</html>