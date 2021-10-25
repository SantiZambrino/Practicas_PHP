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
        <a href="../Vehiculos/vehiculo.php?dni=<?php echo $dni ?>">
                <img id="logo-taller" src="../img/Logo-Coche.png" alt="Logo Talleres Zamoen">
            </a>
        </header>

        <div class="container-login-user">

            <form id="form-new-user" name="form-new-user" action="../Login/newUser.php" method="POST">

                <label for="nombre-usu">Nombre</label>
                <input type="text" id="nombre_usu" class="input-style" name="nombre_usu">

                <label for="apellidos-usu">Apellidos</label>
                <input type="text" id="apellidos_usu" class="input-style" name="apellidos_usu">

                <label for="dni-usu">DNI</label>
                <input type="text" id="dni" class="input-style" name="dni">

                <label for="contrasena-usu">Contraseña</label>
                <input type="text" id="contra_usu" class="input-style" name="contra_usu">

                <label for="telefono-usu">Telefono</label>
                <input type="tel" id="telefono_usu" class="input-style" name="telefono_usu">

                <label for="email-usu">Email</label>
                <input type="email" id="email_usu" class="input-style" name="email_usu">

          
                <div class="box-btn">
                <button  class="btn registrar" value="enviar" onclick="reenviar()">Registrar</button>
                <button  class="btn reset" type="reset" value="reset">Borrar</button>
                </div>
          
            </form>

        </div>

    </div>

    <?php

        include "../biblioteca/funcionesZamoen.php";

        $conn = Conexion();

        $nombre = $_POST['nombre_usu'];
        $apellidos = $_POST['apellidos_usu'];
        $dni = $_POST['dni'];
        $telefono = $_POST['telefono_usu'];
        $email = $_POST['email_usu'];
        $contra = md5($_POST['contra_usu']);

        if(!empty($nombre) && !empty($apellidos) && !empty($dni) && !empty($telefono) && !empty($email) &&  !empty($contra)){

            $sql =  "INSERT INTO lista_usuario (nombre, apellidos, dni, telefono, email, contrasena) VALUES ('$nombre', '$apellidos', '$dni', '$telefono', '$email', '$contra')";
                
            $results = mysqli_query($conn, $sql);
        
            if ($results === false) {
            echo mysqli_error($conn);
            }
            else{

                header('Location: ../Vehiculos/vehiculo.php?dni='.$dni );
            }
        }

        mysqli_close($conn);

    ?>
    
</body>
</html>