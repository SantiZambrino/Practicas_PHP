<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styleHeader.css" />
    <link rel="stylesheet" href="../styles/styleNewUser.css">
    <link rel="stylesheet" href="../styles/styleNewVehiculo.css" />
    <link rel="shortcut icon" href="../img/favicon-logo.png" />
    <title>Registro Vehículo| Talleres Zamoen</title>
</head>
<body>

    <div class="outer-container">

        <header id="cabecera">
            <a href="../Login/login.php">
                <img id="logo-taller" src="../img/Logo-Coche.png" alt="Logo Talleres Zamoen">
            </a>
        </header>

        <div class="container-login-vehiculo">

            <form id="form-new-vehiculo" name="form-new-vehiculo" method="post" action="#">

                <label for="dni">DNI</label>
                <input name="dni" id="dni"  type="text" placeholder="Por favor, indique DNI" class="input-style" />
        
                <label for="matricula">Matricula</label>
                <input name="matricula" id="matricula"  type="text" placeholder="Por favor, indique matricula" class="input-style" />

                <label for="marca">Marca</label>
                <input name="marca" id="marca" type="text" placeholder="Por favor, indique marca" class="input-style"/>

                <label for="modelo">Modelo</label>
                <input name="modelo" id="modelo" type="text" placeholder="Por favor, indique modelo" class="input-style"/>

                <label for="year">Año</label>
                <input name="year" id="year" type="date" placeholder="Año fabricación"  class="input-style"/>

                <div class="box-btn">
                <button  class="btn registrar" value="enviar">Registrar</button>
                <button  class="btn reset" type="reset" value="reset">Borrar</button>
                </div>
          
            </form>

        </div>

    </div>

    <?php

        include "../biblioteca/funcionesZamoen.php";

        $conn = Conexion();

        $dni = $_POST['dni'];

        $id_usuario = "(SELECT id_usuario FROM lista_usuario
                                WHERE dni = '$dni ' )"; 

        $matricula = $_POST['matricula'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $year = $_POST['year'];


        if(!empty($matricula) && !empty($modelo) && !empty($year) ){

            $sql =  "INSERT INTO lista_vehiculos (matricula, marca, modelo, año, id_servicio, id_usuario) VALUES ( '$matricula', '$marca', '$modelo', '$year', 3, $id_usuario)";

            echo $sql;

                
            $results = mysqli_query($conn, $sql);
        
            if ($results == false) {

                ?>
                <script>
                        alert('NO se ha agregado ningún vehiculo');
                </script>
                <?php
            echo mysqli_error($conn);
            } 
            else{

                ?>
                <script>
                        alert('Agregado correctamente');
                </script>
                <?php
            }
        }

        mysqli_close($conn);

    ?>
    
</body>
</html>