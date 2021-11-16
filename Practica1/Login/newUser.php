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

    <?php
        session_start();
    ?>

    <div class="outer-container"> <!--formulario html para crear nuevo usuario  -->

        <header id="cabecera">
        <a href="../Vehiculos/vehiculo.php?dni=<?php echo $dni ?>">
                <img id="logo-taller" src="../img/Logo-Coche.png" alt="Logo Talleres Zamoen">
            </a>
        </header>

        <div class="container-login-user">

            <form id="form-new-user" name="form-new-user" action="../Login/newUser.php" method="POST">

                <label for="nombre-usu">Nombre</label>
                <input type="text" id="nombre_usu" class="input-style" name="nombre_usu" required>

                <label for="apellidos-usu">Apellidos</label>
                <input type="text" id="apellidos_usu" class="input-style" name="apellidos_usu" required>

                <label for="dni-usu">DNI</label>
                <input type="text" id="dni" class="input-style" name="dni" required>

                <label for="contrasena-usu">Contraseña</label>
                <input type="text" id="contra_usu" class="input-style" name="contra_usu" required>

                <label for="telefono-usu">Telefono</label>
                <input type="tel" id="telefono_usu" class="input-style" name="telefono_usu" required>

                <label for="email-usu">Email</label>
                <input type="email" id="email_usu" class="input-style" name="email_usu" required>

          
                <div class="box-btn">
                <button  class="btn registrar" value="enviar">Registrar</button>
                <button  class="btn reset" type="reset" value="reset">Borrar</button>
                <?php
                     if( !isset($_SESSION['id_admin'])){
                        ?>
                        <a id="comeBack" href="./login.php">Volver Atrás</a>
                        <?php  
                    }
                    else{
                        ?>
                        <a id="comeBack" href="./lista_Admin.php">Volver Atrás</a>
                        <?php    
                    } 
                    ?>
                
                </div>
          
            </form>

        </div>

    </div>

    <?php
        include "../biblioteca/funcionesZamoen.php"; //inclusion de biblioteca de funciones

        $conn = Conexion();  // conexion a traves de la funcion creada en la biblioteca

        if(!empty($_POST['nombre_usu']) && !empty($_POST['apellidos_usu']) && !empty($_POST['dni']) && !empty($_POST['telefono_usu']) && !empty($_POST['email_usu']) && !empty($_POST['contra_usu'])){

            $nombre = $_POST['nombre_usu'];
            $apellidos = $_POST['apellidos_usu'];
            $dni = $_POST['dni'];
            $telefono = $_POST['telefono_usu'];
            $email = $_POST['email_usu'];
            $contra = md5($_POST['contra_usu']);

            if(camposCompletadosNuevoUsuario($nombre, $apellidos, $dni ,$telefono, $email, $contra)){ //codigo simplificado a traves de las funciones, creadas en la base de datos. 
                crearUsuario($nombre, $apellidos, $dni, $telefono, $email, $contra, $conn);
            }
        }

        mysqli_close($conn); //cierre de conexion a base de datos. 

    ?>
    
</body>
</html>