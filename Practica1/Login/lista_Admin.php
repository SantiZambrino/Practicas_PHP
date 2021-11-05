<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styleHeader.css" />
   
    <link rel="stylesheet" href="../styles/styleLista_Admin.css">
    <link rel="shortcut icon" href="../img/favicon-logo.png" />
    <title>Listado Usuarios | Talleres Zamoen</title>
</head>
<body>
    <?php
        session_start();
        include "../Login/cookie.php";

            include "../biblioteca/funcionesZamoen.php";

            $conn = Conexion();

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
            <div class="logo">  
                <a href="#">
                    <img id="logo-taller" src="../img/Logo-Coche.png" alt="Logo Talleres Zamoen">
                </a>
            </div>
            <div class="container-info-header">
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
                <div class="cookies">
                    <p><?php echo 'Ultima conexion realizada el: '.$_COOKIE[$_SESSION['dni'].'Cookie']; ?></p>
                </div>
                </div>
            </header>
        <?php

      
        $sqlFirst =  "SELECT nombre, apellidos, dni, telefono, email
                            FROM lista_usuario";

        $results = mysqli_query($conn, $sqlFirst);
                    
        if ($results === false) {
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

                foreach ($results as $valor) {
                                                        
                    ?>
                    <tr>
                    <?php
                    foreach ($valor as $k) {
                                        
                        ?>
                        <td><a href="../Vehiculos/vehiculo.php?dni=<?php echo $valor['dni'];?>"><?php  echo $k ; ?></a></td>
                        <?php

                    }

                    ?>
                    </tr>
                    <?php
                }

                    ?>
                    </tr>
                </table>
            </div>
    
            <?php

           
         }

    mysqli_close($conn);
            
    ?>

                    </div>
        
    </div>

</body>
</html>