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
    <?php
    //Inicio la sesion para poder obtener los valores como el dni
    session_start();
    include "../biblioteca/funcionesZamoen.php";

    $conn = Conexion();//funcion conexion de bibliote zamoen


    $dni = $_SESSION['dni'];


    $name = datosNombre($conn, $dni);

    ?>
    <div class="outer-container"> <!-- estructura html -->

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
        <?php

        $dniUsu = $_GET['dni'];


        $sqlFirst =  "SELECT nombre, apellidos, dni, telefono, email, id_usuario
                            FROM lista_usuario
                            WHERE dni = '$dniUsu'";

        $info = mysqli_query($conn, $sqlFirst);

        if ($info === false) {
            echo mysqli_error($conn);
        } else {

        ?>
            <div class="container-form">
                <table name="infoUsuarios" id="infoUsuarios">

                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Telefono</th>
                    <th>Email</th>

                    <tr>

                        <?php

                        foreach ($info as $valor) {

                        ?>
                            <td><?php echo $valor['nombre']; ?></td>
                            <td><?php echo $valor['apellidos']; ?></td>
                            <td><?php echo $dniUsu; ?></td>
                            <td><?php echo $valor['telefono']; ?></td>
                            <td><?php echo $valor['email']; ?></td>
                            <td style="border:  none;">

                                <a class="editUser" id="editUser">Editar Usuario</a> 
                                <div  id="tvesModal" class="modalContainer ">
                                    <div class="modal-content">
                                    <span class="close">×</span> <h2>Actualizar usuario</h2>

                                    <form action ="../Login/updateUser.php" method ="POST">
                                        <input type ="hidden" name ="id_usuario" value ="<?php echo $valor['id_usuario']; ?>">
                                        <input type ="text"  name ="nombre" value ="<?php echo $valor['nombre']; ?>">
                                        <input type ="text" name ="apellidos" value ="<?php echo $valor['apellidos']; ?>">
                                        <input type ="text" name ="dni" value ="<?php echo $valor['dni']; ?>">
                                        <input type ="tel" name = "telefono" value ="<?php echo $valor['telefono']; ?>">
                                        <input type ="email" name ="email" value ="<?php echo $valor['email']; ?>">
                                        <button class="editUser" id="updateUser">Actualizar Usuario</button>
                                    </form>

                                    </div>
                                </div>  
                            </td>
                            <td style="border:  none;">

                                <form action="../Login/deleteUser.php" method="POST">
                                    <input type="hidden" name="id_usuario" value="<?php echo $valor['id_usuario']; ?>">
                                    <button id="deleteUser">Eliminar Usuario</button>
                                </form>

                            </td>

                            <script>
                                    if(document.getElementById("editUser")){
                                        var modal = document.getElementById("tvesModal");
                                        var btn = document.getElementById("editUser");
                                        var span = document.getElementsByClassName("close")[0];
                                        var body = document.getElementsByTagName("body")[0];
                                        var btn_update = document.getElementById('updateUser');

                                        btn.onclick = function() {
                                            modal.style.display = "block";
                                            body.style.position = "static";
                                            body.style.height = "100%";
                                            body.style.overflow = "hidden";
                                        }

                                        span.onclick = function() {
                                            modal.style.display = "none";
                                            body.style.position = "inherit";
                                            body.style.height = "auto";
                                            body.style.overflow = "visible";
                                        }

                                        btn_update.onclick = function() {
                                            modal.style.display = "none";
                                            body.style.position = "inherit";
                                            body.style.height = "auto";
                                            body.style.overflow = "visible";
                                            
                                        }

                                        window.onclick = function(event) {
                                            if (event.target == modal) {
                                            modal.style.display = "none";
                                            body.style.position = "inherit";
                                            body.style.height = "auto";
                                            body.style.overflow = "visible";
                                            }
                                        }
                                    }
                            </script>
                        <?php
                        }

                        ?>
                    </tr>
                </table>
            </div>

            <?php

            $sql =  "SELECT matricula, marca, modelo, año
                        FROM lista_vehiculos
                        WHERE id_usuario = (SELECT id_usuario
                                            FROM lista_usuario 
                                            WHERE dni = '$dniUsu')";


            $results = mysqli_query($conn, $sql);

            if ($results === false) {
                echo mysqli_error($conn);
            } else {

            ?>
                <div class="container-view">

                    <table name="datosUsuarios" id="datosUsuarios">

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
                                    <td><a href="../Sevicios/Servicios.php?dni=<?php echo $_GET['dni'];?>&matricula=<?php echo ($valor["matricula"]);?>"><?php echo $k; ?></a></td>
                                <?php
                                }

                                ?>
                            </tr>
                        <?php
                        }

                        ?>
                    </table>
                    <div class="newvh">
                        <a href="../Vehiculos/newVehiculo.php?dni=<?php echo $_GET['dni']; ?>" class="btn newvh">Nuevo Vehiculo</a>
                    </div>
            <?php

            }
        }

        mysqli_close($conn);

            ?>

                </div>

    </div>

</body>

</html>

