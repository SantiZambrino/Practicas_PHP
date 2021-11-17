<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Talleres Zamoen</title>
    <link rel="stylesheet" href="../styles/styleHeader.css">
    <link rel="stylesheet" href="../styles/styleLogin.css">
    <link rel="shortcut icon" href="../img/favicon-logo.png" />
</head>

<body>

    <div class="outer-container">

        <header id="cabecera">
            <a href="#">
                <img id="logo-taller" src="../img/Logo-Coche.png" alt="Logo Talleres Zamoen">
            </a>
        </header>

        <div class="container-login">

            <form id="form-login" name="form-login" method="POST">

                <input type="text" id="dni" class="input-style" name="dni" placeholder="Usuario...">
                <input type="password" id="contra_usu_login" class="input-style" name="contra_usu_login" placeholder="Contraseña...">
                <img src="../img/invisible-passwd.png" alt="Mostrar Contraseña" id="mostrarContrasena">

                <div class="box-btn">
                    <input type="submit" class="btn submit" value="Enviar">
                    <a class="btn newUser" href="../Login/newUser.php">Nuevo Usuario</a>
                </div>

            </form>

        </div>

    </div>

    <script>
        var mostrarContrasena = document.getElementById("mostrarContrasena");//creamos variables apra almacenar la contraseña y mostrarla cuando utilicemos la funcion contraeña 
        var mostrar = document.getElementById('contra_usu_login');

        mostrarContrasena.addEventListener('click', function(e) {//funcion donde al pulsar en mostrar, mostrara u ocultara la contraseña para que el usuario pueda ver si la ha introducido correctamente

            e.preventDefault();
            if (mostrar.type == "password") {
                mostrar.type = "text";
                console.log("He cambiado a texto");
                mostrarContrasena.src = '../img/view-passwd.png';
            } else {
                mostrar.type = "password";
                console.log("He cambiado a password");
                mostrarContrasena.src = '../img/invisible-passwd.png';
            }
        });
    </script>

    <?php

    include "../biblioteca/funcionesZamoen.php";//incluimos el archivo php donde hemos realizado funciones para aligerar el codigo y que se vea mas limpio.

    $conn = Conexion();//almacenamos enla variable la conexion guardada en la funcion que esta en el archivo funciones.

    if (!empty($_POST['dni']) && !empty($_POST['contra_usu_login'])) {// condiciones para acceder a la Api, a traves de este if realizamos las comprobaciones con la base de datos y lo introducido por el usuario.

        session_start();

        $dni = $_POST['dni'];
        $contra = md5($_POST['contra_usu_login']);//usamos el metodo md5 para encriptar la contraseña y sea mas segura.


        $sql = "SELECT * FROM lista_usuario WHERE contrasena = '$contra' AND dni = '$dni'";//consulta SQl para verificar que existe en base de datos.

        $result = mysqli_query($conn, $sql); //almacenamos el resultado en la variable


        if (!$result) {//if de comprobacion si la consulta devuelve resultado, nos dara acceso.
            ?>
            <script>alert('Usuario o contraseña incorrecta.<br>Introduzca los datos');
                console.log('hola');
            </script>
            <?php 
            exit;
        } else {

            if ($valores = mysqli_fetch_array($result)) {//en este if comprobamos el tipo de credencial. si es usuario o administrador. para acceder a unos privilegios u otros.
                include "../Login/cookie.php";
                $_SESSION['id_admin'] = $valores['id_admin'];
                $_SESSION['dni'] = $valores['dni'];
                //creamos la cookie con el dni del usuario/administrador concatenando la palabra cookie. 
                crearCookie($_SESSION['dni'] . 'Cookie');

                if ($valores['id_admin'] == 1) {

                    header('Location: lista_Admin.php');
                } else {

                    header('Location: ../Vehiculos/vehiculo.php?dni=' . $dni);
                }
            } else {

                exit;
            }
        }
    }
    ?>
</body>

</html>