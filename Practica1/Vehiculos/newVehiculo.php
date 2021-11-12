<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styleHeader.css" />
    <link rel="stylesheet" href="../styles/styleNewUser.css">
    <link rel="stylesheet" href="../styles/styleNewVehiculo.css" />
    <link rel="shortcut icon" href="../img/favicon-logo.png" />
    <title>Registro Vehículo| Talleres Zamoen</title>
</head>

<body>
    <?php

    include "../biblioteca/funcionesZamoen.php"; // incluimos la biblioteca de funciones

    $conn = Conexion(); //almacenas la conexion en la variable

    session_start();//inicio de sesion

    $dni = $_SESSION['dni']; //guardamos en variable el dni de la sesion

    $name = datosNombre($conn, $dni); //almacenamos en la variable los datos 

    $dniUsu = $_GET['dni'];

        ?>
     <div class="outer-container">  <!--estructura html de la pagina -->

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
                    if ($_SESSION['id_admin'] == 1) { //if con las condiciones para el inicio de perfil del usuario.
                    ?>
                        <a id="btn-Panel" href="../Login/lista_Admin.php">Volver al Panel</a>
                    <?php
                    }
                    ?>
                    <a id="btn-logOut" href="../Login/logOut.php">Cerrar Sesión</a>
                </div>
                <div class="cookies">
                    <p><?php echo 'Ultima conexion realizada el: ' . $_COOKIE[$_SESSION['dni'] . 'Cookie']; ?></p> <!-- codigo php insertado en el html para las cookis-->
                </div>
            </div>
        </header>

        <div class="container-login-vehiculo">

            <form id="form-new-vehiculo" name="form-new-vehiculo" method="post" action="#">

                <label for="matricula">Matricula</label>
                <input name="matricula" id="matricula" type="text" placeholder="Por favor, indique matricula" class="input-style" />

                <label for="marca">Marca</label>
                <input name="marca" id="marca" type="text" placeholder="Por favor, indique marca" class="input-style" />

                <label for="modelo">Modelo</label>
                <input name="modelo" id="modelo" type="text" placeholder="Por favor, indique modelo" class="input-style" />

                <label for="year">Año</label>
                <input name="year" id="year" type="date" placeholder="Año fabricación" class="input-style" />

                <div class="box-btn">
                <button class="btn registrar" value="enviar">Registrar</button>
                <button  class="btn reset" type="reset" value="reset">Borrar</button>
                <a id="comeBack" href=" ../Vehiculos/vehiculo.php?dni=<?php echo $_GET['dni']; ?>">Volver Atrás</a>
            </div>
            
        </form>
        

        </div>

    </div>

    <?php

    $dni = $_GET['dni']; //codigo para añadir nuevo vehiculo

    $id_usuario = "(SELECT id_usuario FROM lista_usuario
                                WHERE dni = '$dni ' )";

    $matricula = $_POST['matricula'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $year = $_POST['year'];

    if (camposCompletados($matricula, $marca, $year)) { //comprobamos datos rellenos a traves de funcion 
        crearVehiculo($matricula,$marca, $modelo, $year, $id_usuario, $conn, $sql); //añadimos datos a traves de funcion
    }
    mysqli_close($conn); //cerramos conexion de base de datos. 
    ?>
</body>

</html>