<?php

    session_start();
    include "../biblioteca/funcionesZamoen.php";

    $conn = Conexion();

    $id_usuario = $_POST['id_usuario'];

    echo $id_usuario.' ';

    
    $sqlVehiculo = "SELECT  id_matricula FROM lista_vehiculos
                                WHERE  id_usuario = $id_usuario";
                                
     $resultsVehiculos = mysqli_query($conn, $sqlVehiculo);

    if ($resultsVehiculos === false) {
        echo mysqli_error($conn);
    }
    else {

        //$listaVehiculos = mysqli_fetch_array($resultsVehiculos);

        // print_r($resultsVehiculos);
        
        foreach($resultsVehiculos as $id){
            echo $id['id_matricula'].' | ';
        }


    }



?>