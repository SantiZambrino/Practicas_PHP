<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styleHeader.css" />
    <link rel="stylesheet" href="../styles/styleNewServicio.css" />
    <link rel="shortcut icon" href="../img/favicon-logo.png" />
    <title>Registro Servicio| Talleres Zamoen</title>
</head>

<body>
    <?php

    include "../biblioteca/funcionesZamoen.php"; // incluimos la biblioteca de funciones 

    $conn = Conexion();

    session_start(); // inicio sesion

    $dni = $_SESSION['dni'];

    $name = datosNombre($conn, $dni);

    // $name = $info['nombre'];


    $dniUsu = $_GET['dni'];
    $matricula = $_GET['matricula'];

            ?>
    <div class="outer-container"> <!-- codigo de la pagina en html -->

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
                    if ($_SESSION['id_admin'] == 1) { //condicion para cargar privilegios admin o usuario 
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

        <div class="container-login-servicio"> <!-- codigo html para la estructura de nuestra pagina.  -->

            <form id="form-new-servicio" name="form-new-servicio" method="POST">

                <label for="servicio">Tipo de Servicio</label>
                <input name="servicio" id="servicio" type="text" placeholder="Por favor, indique el servicio" class="input-style" />

                <label for="descripcion">Descripción</label>
                <textarea rows="5" cols="50" name="descripcion" id="descripcion" placeholder="Por favor, indique la descripcion" class="input-style" /></textarea>

                <div class="box-btn">
                    <button  class="btn registrar" value="enviar">Registrar</button>
                    <button  class="btn reset" type="reset" value="reset">Borrar</button>
                    <a id="comeBack" href="Servicios.php?dni=<?php echo $_GET['dni'];?> &matricula=<?php echo $_GET['matricula']; ?>">Volver Atrás</a>
                </div>

            </form>

        </div>

    </div>

    <?php
    
    if(!empty($_POST['servicio']) && !empty($_POST['descripcion'])){

        $dni = $_GET['dni'];
        $matricula = $_GET['matricula'];
        $tipoServicio = $_POST['servicio'];
        $descripcionServicio = $_POST['descripcion'];

        $id_matricula = "(SELECT id_matricula FROM lista_vehiculos
                            WHERE  matricula = '$matricula' )";
    
        if (camposCompletados($matricula, $tipoServicio, $descripcionServicio)) { //funcion añadir nuevo servicio simplificado a traves de funciones.
            crearServicio($tipoServicio, $descripcionServicio, $conn, $dni,$id_matricula);
        }
    }


    mysqli_close($conn);

    ?>

</body>

</html>