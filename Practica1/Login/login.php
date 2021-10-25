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
                    <a  class="btn newUser" href="../Login/newUser.php">Nuevo Usuario</a>
                </div>
          
            </form>

        </div>
    
    </div>

    <script>
        
        var mostrarContrasena = document.getElementById("mostrarContrasena");
        var mostrar = document.getElementById('contra_usu_login');
    
        mostrarContrasena.addEventListener('click', function(e){
    
            e.preventDefault();
            if (mostrar.type == "password"){
                mostrar.type = "text";
                console.log("He cambiado a texto");
                mostrarContrasena.src = '../img/view-passwd.png';
            }
            else{
                mostrar.type = "password";
                console.log("He cambiado a password");
                mostrarContrasena.src = '../img/invisible-passwd.png';
            }
        });
    
      </script>
 
 <?php

include "../biblioteca/funcionesZamoen.php";

        $conn = Conexion();
        //Creo variable donde se guardara la fecha
        //https://www.youtube.com/watch?v=fA1eo4Mdwjs
        $date = new DateTime();
        setcookie("galletita", ".$date.", time(), 84600);

        //Isset determina si una variable esta definida
        if (isset($_COOKIE["galletita"])) {
            //$_COOKIE es una variable global
                echo $_COOKIE;
        }else{
            echo "No se ha creado la cookie";
        }
       
        
        if (!empty( $_POST['dni']) && !empty($_POST['contra_usu_login'])){
            
            $dni = $_POST['dni'];
            $contra = md5($_POST['contra_usu_login']);

            
            $sql = "SELECT * FROM lista_usuario WHERE contrasena = '$contra' AND dni = '$dni'";

            $result = mysqli_query ($conn, $sql);   

            
            if (!$result){
                exit;
            }
            else{
                
                if($valores = mysqli_fetch_array($result)){

                    $_SESSION['id_admin'] = $valores['id_admin'];
                    
                    $_SESSION['dni'] = $valores['dni'];

                    if($valores['id_admin'] == 1){

                        header('Location: lista_Admin.php');
                    }
                    else{

                        header('Location: ../Vehiculos/vehiculo.php?dni='.$dni );
                      
                    }

                }
                else{

                    exit;
                }            
            }
        }
    ?>


   <?php
   /*
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