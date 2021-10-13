<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Talleres Zamoen</title>
    <link rel="stylesheet" href="../styles/styleHeader.css">
    <link rel="stylesheet" href="../styles/styleLoginPrueba.css">
    <link rel="shortcut icon" href="../img/favicon-logo.png" />
</head>
<body>

    <div class="outer-container">

        <header id="cabecera">
            <a href="../Login/loginPrueba.php">
                <img id="logo-taller" src="../img/Logo-Coche.png" alt="Logo Talleres Zamoen">
            </a>
        </header>

        <div class="container-login">

            <form id="form-login" name="form-login" action="#" method="POST">

                <input type="text" id="name_usu" class="input-style" name="name-usu" placeholder="Usuario...">
                <input type="password" id="pass_usu" class="input-style" name="pass-usu" placeholder="Contraseña...">
                <img src="../img/invisible-passwd.png" alt="Mostrar Contraseña" id="mostrarContrasena">
          
                <div class="box-btn">
                <a href="../Vehiculos/newvehiculo.php" class="btn submit">Enviar</a>
                <a  class="btn newUser" href="../Login/newUser.php">Nuevo Usuario</a>
                </div>
          
            </form>

        </div>
    
    </div>

    <script>
        
        var mostrarContrasena = document.getElementById("mostrarContrasena");
        var mostrar = document.getElementById("pass_usu");

        mostrarContrasena.addEventListener('click', function(e){

            e.preventDefault();
            if (mostrar.type == "password"){
                mostrar.type = "text";
                mostrarContrasena.src = '../img/view-passwd.png';
            }
            else{
                mostrar.type = "password";
                mostrarContrasena.src = '../img/invisible-passwd.png';
            }
        });

      </script>

   <?php/*
        //CREACCIÓN DE SESION PARA COMPARAR SI EL USUARIO EXISTE.
        //PARA MOSTRAR MENSAJE DE ERROR (https://es.stackoverflow.com/questions/150719/mostrar-mensaje-usuario-y-o-contrase%C3%B1a-incorrecta)

        session_start();

        $nombre = $_POST['name_usu'];
        $password = $_POST['pass_usu'];

        // se asume conexion en $conn incluido desde conexion.php, ejemlo:
        $name = $db_host = "localhost";
                $db_name = "bd_taller";
                $db_user = "root";
                $db_pass = "2DAW2021...";

                $name = strtolower($name);
                
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

        // añadiría un limit 1 a la consulta pues solo esperamos un registro
        $consulta = mysqli_query ($conn, "SELECT * FROM sesion WHERE user = '$nombre' AND pass = '$password'");  

        // esto válida si la consulta se ejecuto correctamente o no pero en ningún caso válida si devolvió algún registro
        if(!$consulta){ 
            // echo "Usuario no existe " . $nombre . " " . $password. " o hubo un error " . 
            echo mysqli_error($mysqli);
            // si la consulta falla es bueno evitar que el código se siga ejecutando
            exit;
        } 
        
        // validemos pues si se obtuvieron resultados 
        // Obtenemos los resultados con mysqli_fetch_assoc
        // si no hay resultados devolverá NULL que al convertir a boleano para ser evaluado en el if será FALSE
        if($user = mysqli_fetch_assoc($consulta)) {
            // el usuario y la pwd son correctas
        } else {
            // Usuario incorrecto o no existe
        }
    */?>

    
</body>
</html>