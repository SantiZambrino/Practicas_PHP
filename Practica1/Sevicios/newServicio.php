<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styleHeader.css" />
    <link rel="stylesheet" href="../styles/styleNewServicio.css" />
    <link rel="shortcut icon" href="../img/favicon-logo.png" />
    <title>Registro Servicio| Talleres Zamoen</title>
</head>
<body>

    <div class="outer-container">

        <header id="cabecera">
            <a href="../Vehiculos/vehiculo.php?dni=<?php echo $_GET['dni']; ?>">
                <img id="logo-taller" src="../img/Logo-Coche.png" alt="Logo Talleres Zamoen">
            </a>
        </header>

        <div class="container-login-servicio">

            <form id="form-new-servicio" name="form-new-servicio" method="post" >

                <label for="servicio">Tipo de Servicio</label>
                <input name="servicio" id="servicio"  type="text" placeholder="Por favor, indique el servicio" class="input-style" />

                <label for="descripcion">Descripción</label>
                <textarea  rows="5" cols="50" name="descripcion" id="descripcion" placeholder="Por favor, indique la descripcion" class="input-style"/></textarea>
 
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

        $dni = $_GET['dni'];
        $matricula = $_GET['matricula'];
        $tipoServicio = $_POST['servicio'];
        $descripcionServicio = $_POST['descripcion'];

        $id_matricula = "(SELECT id_matricula FROM lista_vehiculos
                                    WHERE  matricula = '$matricula' )"; 
    
        if(!empty($matricula) && !empty($tipoServicio) && !empty($descripcionServicio) ){

            $sql =  "INSERT INTO lista_servicios (tipo_servicio, descripcion, id_matricula) VALUES ('".$tipoServicio."','".$descripcionServicio."',$id_matricula)";

            $results = mysqli_query($conn, $sql);
        
            if ($results == false) {

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