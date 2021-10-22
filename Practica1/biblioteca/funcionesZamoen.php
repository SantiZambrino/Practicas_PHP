<?php
    function Conexion(){

        $db_host = "localhost";
        $db_name = "bd_taller";
        $db_user = "root";
        $db_pass = "2DAW2021...";

        try{
            $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
        }
        catch(PDOException $e){

            echo 'FALLO EN LA CONEXIÓN';
            echo mysqli_connect_error();
            exit;
        }
        
        return $conn;
    }    
?>