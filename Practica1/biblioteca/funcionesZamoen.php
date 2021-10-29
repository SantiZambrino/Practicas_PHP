<?php
    function Conexion(){

        $db_host = "10.192.240.25:3307";
        $db_name = "bd_taller";
        $db_user = "cuentaSanti";
        $db_pass = "1234";


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