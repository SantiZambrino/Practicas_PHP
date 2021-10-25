<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styleHeader.css">

    <link rel="stylesheet" href="../styles/styleVehiculo.css">
    <link rel="shortcut icon" href="../img/favicon-logo.png" />
    <title>Listado Vehiculos | Talleres Zamoen</title>
</head>

<body>

    <div class="outer-container">

        <header id="cabecera">
            <a href="../Vehiculos/vehiculo.php">
                <img id="logo-taller" src="../img/Logo-Coche.png" alt="Logo Talleres Zamoen">
            </a>
        </header>

        <?php
        //Se llama a la funcion para conectar a la base de datos
        include "../biblioteca/funcionesZamoen.php";

        //Se guarda en una variable tanto la función para conectar el dni que pasa el cliente y la consulta que devuelve los datos del usuario
        $conn = Conexion();

        $dni = $_POST['dni'];

        $sqlFirst =  "SELECT nombre, apellidos, dni, telefono, email
                                FROM lista_usuario
                                WHERE dni = '$dni'";

        //Realiza una consulta a la base de datos. mysqli_query entra en la base de datos. Por parametro se pasa la conexion y la sentencia SQL
        $info = mysqli_query($conn, $sqlFirst);

        //Si hay algun tipo de error en la conexion salta el error.
        if ($info === false) {
            echo mysqli_error($conn);
        } else {

        //Si el campo no esta vacio crea la tabla y muestra el contenido que se pide
            if (!empty($dni)) {
        ?>

                <div class="container-form">
                    <table name="infoUsuarios" id="infoUsuarios">

                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DNI</th>
                        <th>Telefono</th>
                        <th>Email</th>

                        <tr>
                        <!-- En el foreach se pasa la consulta del usuario y va devolviendo los campos -->
                            <?php

                            foreach ($info as $valor) {
                            ?>
                                <td><?php echo $valor['nombre']; ?></td>
                                <td><?php echo $valor['apellidos']; ?></td>
                                <td><?php echo $valor['dni']; ?></td>
                                <td><?php echo $valor['telefono']; ?></td>
                                <td><?php echo $valor['email']; ?></td>

                            <?php
                            }

                            ?>
                        </tr>
                    </table>
                </div>

            <?php

            }
        }


        //En la segunda consulta pedimos los datos de los vehiculos que tenga el usuario
        $sql =  "SELECT matricula, marca, modelo, año
                FROM lista_vehiculos
                WHERE id_usuario = (SELECT id_usuario
                                    FROM lista_usuario 
                                    WHERE dni = '$dni')";

        //Metemos la conexion y la consulta en una variable
        $results = mysqli_query($conn, $sql);
        //Si hay algun error en la conexion y la consulta salta el error
        if ($results === false) {
            echo mysqli_error($conn);
        } else {
            //Si el dni que pasa el usuario, no esta vacio muesta la consulta en la pagina
            if (!empty($dni)) {
            ?>
                <div class="container-view">

                    <table name="datosUsuarios" id="datosUsuarios">

                        <th>Matrícula</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Año</th>


                        <?php
                        //Pasa los campos por el bucle y los va mostrando por pantalla
                        foreach ($results as $valor) {
                        ?>

                            <tr>
                                <?php
                                foreach ($valor as $k) {
                                ?>
                                <!-- Se pasan los datos del cliente en el enlace para recogerlos por $get en el la pagina servicios.php  -->
                                    <td><a href="../Sevicios/Servicios.php?argumento2=<?php echo $dni; ?>&argumento3=<?php echo ($valor["matricula"]); ?>"><?php echo $k; ?></a></td>
                                <?php
                                }
                                ?>

                            </tr>
                        <?php
                        }

                        ?>
                    </table>
                    <!-- Enlace que para ir a la pagina newVehiculo.php y agregar un vehiculo nuevo -->
                    <div class="newvh">
                        <a href="../Vehiculos/newVehiculo.php" class="btn newvh">Nuevo Vehiculo</a>
                    </div>

            <?php

            }
        }
        //Cerramos la conexion a la base de datos
        mysqli_close($conn);

            ?>


                </div>

    </div>


</body>

</html>