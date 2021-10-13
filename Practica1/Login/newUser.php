<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styleHeader.css" />
    <link rel="stylesheet" href="../styles/styleNewUser.css">
    <link rel="shortcut icon" href="../img/favicon-logo.png" />
    <title>Registro Usuario | Talleres Zamoen</title>
</head>
<body>

    <div class="outer-container">

        <header id="cabecera">
            <a href="../Login/loginPrueba.php">
                <img id="logo-taller" src="../img/Logo-Coche.png" alt="Logo Talleres Zamoen">
            </a>
        </header>

        <div class="container-login-user">

            <form id="form-new-user" name="form-new-user" action="#" method="POST">

                <label for="nombre-usu">Nombre</label>
                <input type="text" id="nombre_usu" class="input-style" name="nombre-usu">

                <label for="apellidos-usu">Apellidos</label>
                <input type="text" id="apellidos-usu" class="input-style" name="apellidos-usu">

                <label for="apellidos-usu">Contraseña</label>
                <input type="password" id="passwd-usu" class="input-style" name="passwd-usu">

                <label for="apellidos-usu-verificacion">Repetir Contraseña</label>
                <input type="password" id="apellidos-usu-verificacion" class="input-style" name="apellidos-usu-verificacion">

                <label for="dni-usu">DNI</label>
                <input type="text" id="dni-usu" class="input-style" name="dni-usu">

                <label for="nacimiento-usu">Fecha Nacimiento</label>
                <input type="date" id="nacimiento-usu" class="input-style" name="nacimiento-usu">
          
                <div class="box-btn">
                <button  class="btn registrar" value="enviar">Registrar</button>
                <button  class="btn reset" type="reset" value="reset">Borrar</button>
                </div>
          
            </form>

        </div>

    </div>

    <?php

        $nombre = $_POST['nombre_usu'];
        $apellidos = $_POST['apellidos-usu'];
        $dni = $_POST['dni-usu'];
        $fecha_nacimiento = $_POST['nacimiento-usu'];

        echo ($nombre+$apellidos+$dni+$fecha_nacimiento);


    ?>
    
</body>
</html>