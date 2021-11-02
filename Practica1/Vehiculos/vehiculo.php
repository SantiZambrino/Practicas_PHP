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

    include "../biblioteca/funcionesZamoen.php";

    $conn = Conexion();

    session_start();

    $dni = $_SESSION['dni'];

    $sqlName = "SELECT nombre FROM lista_usuario WHERE dni = '$dni'";

    $resultName = mysqli_query($conn, $sqlName);
                    
    if ($resultName === false) {
            echo mysqli_error($conn);
    } 
    else {

        $info = mysqli_fetch_array($resultName);

        $name = $info['nombre'];

    }

        ?>
    <div class="outer-container">

        <header id="cabecera">
            <div class="vacio">
            </div>
            <a href="#">
                <img id="logo-taller" src="../img/Logo-Coche.png" alt="Logo Talleres Zamoen">
            </a>
            <div class="info-usu">
                <h3><?php echo ucfirst($name); ?></h3>
                <?php
                        if($_SESSION['id_admin'] == 1){
                            ?>
                                <a id="btn-Panel" href="../Login/lista_Admin.php">Volver al Panel</a>
                            <?php
                        }
                ?>
                <a id="btn-logOut" href="../Login/logOut.php">Cerrar Sesión</a>
            </div>
        </header>
    <?php

        $dniUsu = $_GET['dni'] ;

        $sqlFirst =  "SELECT nombre, apellidos, dni, telefono, email
                            FROM lista_usuario
                            WHERE dni = '$dniUsu'";

        $info = mysqli_query($conn, $sqlFirst);
                    
        if ($info === false) {
                echo mysqli_error($conn);
        } 
        else {

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
                        <td><?php echo $valor['nombre'] ; ?></td>
                        <td><?php echo $valor['apellidos'] ; ?></td>
                        <td><?php echo $dniUsu; ?></td>
                        <td><?php echo $valor['telefono'] ; ?></td>
                        <td><?php echo $valor['email'] ; ?></td>
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
            } 
            else {

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
                                <td><a href="../Sevicios/Servicios.php?dni=<?php echo $_GET['dni'];?>&matricula=<?php echo ($valor["matricula"]);?>"><?php  echo $k ; ?></a></td>
                                <?php
                            }

                            ?>
                            </tr>
                        <?php
                        }

                    ?>
                    </table>
                                <div class="newvh">
                                    <a href="../Vehiculos/newVehiculo.php?dni=<?php echo $_GET['dni'];?>" class="btn newvh">Nuevo Vehiculo</a>    
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