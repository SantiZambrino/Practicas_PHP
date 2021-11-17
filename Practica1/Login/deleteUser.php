<?php

    session_start();
    include "../biblioteca/funcionesZamoen.php";

    $conn = Conexion();

    $id_usuario = $_POST['id_usuario'];
    
    $sqlVehiculo = "SELECT  id_matricula FROM lista_vehiculos
                                WHERE  id_usuario = $id_usuario";
                                
     $resultsVehiculos = mysqli_query($conn, $sqlVehiculo);

    if ($resultsVehiculos === false) {
        echo mysqli_error($conn);
    }
    else {
        

        $sqlDeleteServicios = "DELETE FROM lista_servicios WHERE id_matricula IN 
                                (SELECT id_matricula FROM lista_vehiculos WHERE id_usuario = '$id_usuario')";


        $resultDeleteServicios = mysqli_query($conn, $sqlDeleteServicios);

        if($resultDeleteServicios === false){
            echo mysqli_error($conn);
        }
        else{

            $sqlDeleteVehiculos = "DELETE FROM lista_vehiculos WHERE id_matricula IN 
            (SELECT id_matricula FROM lista_vehiculos WHERE id_usuario = '$id_usuario')";


            $resultDeleteVehiculos = mysqli_query($conn, $sqlDeleteVehiculos);

            if($resultDeleteVehiculos === false){
            echo mysqli_error($conn);
            }
            else{

                $sqlDeleteUser = "DELETE FROM lista_usuario WHERE id_usuario = $id_usuario";
            
                $resultDeleteUser = mysqli_query($conn, $sqlDeleteUser);

                if($resultDeleteUser === false){
                    echo mysqli_error($conn);
                }
                else{

                    if($_SESSION['id_admin'] == 1){

                        header('Location: ./lista_Admin.php');
                    }
                    else{
                        
                        header('Location: ./login.php');
                    }
                }


            }

        }
    }

    mysqli_close($conn);

?>