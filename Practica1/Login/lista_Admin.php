<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styleHeader.css">
   
    <link rel="stylesheet" href="../styles/styleLista_Admin.css">
    <link rel="shortcut icon" href="../img/favicon-logo.png" />
    <title>Listado Usuarios | Talleres Zamoen</title>
</head>
<body>
    
    <div class="outer-container">

        <header id="cabecera">
            <a href="#">
                <img id="logo-taller" src="../img/Logo-Coche.png" alt="Logo Talleres Zamoen">
            </a>
          
        </header>

    <?php

        include "../biblioteca/funcionesZamoen.php";

        $conn = Conexion();

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