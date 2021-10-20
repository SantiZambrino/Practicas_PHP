
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styleHeader.css">
   
    <link rel="stylesheet" href="../styles/styleVehiculo.css">
    <link rel="shortcut icon" href="../img/favicon-logo.png" />
    <title>Listado Vehiculos | Talleres Zamoen</title>
</head>
<body>

    <div class="outer-container">

        <header id="cabecera">
            <a href="../Vehiculos/vehiculo.php">
                <img id="logo-taller" src="../img/Logo-Coche.png" alt="Logo Talleres Zamoen">
            </a>
        </header>

        <?php

                include "../biblioteca/funcionesZamoen.php";

                $conn = Conexion();

                // $dni = $_POST['dni'];

                $sqlFirst =  "SELECT nombre, apellidos, dni, telefono, email
                                FROM lista_usuario
                                WHERE dni = ".$_GET['dni'];

                ?>

                    <script> alert("He pasado la consulta con el GET")</script>

                <?php

                $info = mysqli_query($conn, $sqlFirst);
                    
                if ($info === false) {
                    echo mysqli_error($conn);
                } 
                else {

                    if(!empty($dni)){
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

                            foreach ($info as $valor) {
                                ?>
                                   <td><?php echo $valor['nombre'] ; ?></td>
                                    <td><?php echo $valor['apellidos'] ; ?></td>
                                    <td><?php echo $valor['dni'] ; ?></td>
                                    <td><?php echo $valor['telefono'] ; ?></td>
                                    <td><?php echo $valor['email'] ; ?></td>

                                    <?php
                                }

                                ?>
                                </tr>
                               </table>
                        </div>
    
                            <?php
         
                    }      
                }

            

                mysqli_close($conn);
            
            ?>
                    
        
                </div>
        
            </div>
            
        
        </body>
        </html>