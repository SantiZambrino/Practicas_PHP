<?php

    session_start();
    include "../biblioteca/funcionesZamoen.php";

    $conn = Conexion();

    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $id_usuario = $_POST['id_usuario'];



    $sqlUpadte = "UPDATE  lista_usuario SET nombre ='$nombre', apellidos ='$apellidos', dni = '$dni', telefono ='$telefono', email = '$email'  WHERE  id_usuario = '$id_usuario'";

    $resultsUser = mysqli_query($conn, $sqlUpadte);

            if ($resultsUser === false) {
                echo mysqli_error($conn);
            } else {
                
               echo 'actualización completada';
               header ('Location: ../Vehiculos/vehiculo.php?dni='.$dni.'');

            }
            

?>