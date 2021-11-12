<?php

    session_start();
    include "../biblioteca/funcionesZamoen.php";

    $conn = Conexion();

    $id_usuario = $_POST['id_usuario'];

    
    $sqlVehiculo = "SELECT  id_matricula FROM lista_vehiculos
                                WHERE  id_usuario = '$id_usuario'";
                                
     $resultsVehiculos = mysqli_query($conn, $sqlVehiculo);

    if ($resultsVehiculos === false) {
        echo mysqli_error($conn);
    }
    else {

        $listadoVehiculos = mysqli_fetch_array($resultsVehiculos);

        foreach($listadoVehiculos as $id){

            echo $id.' ';
        }


        // $lista_id = array();

        // foreach ($resultsVehiculos as $vehiculos) {

        //     foreach ($vehiculos as $id){

        //         print_r($id);
        //     }
        // }

        // print_r($lista_id);

    }



?>