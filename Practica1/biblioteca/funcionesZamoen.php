<?php
    function Conexion(){

        $db_host = "10.192.240.25:3306";
        $db_name = "bd_taller";
        $db_user = "cuentaSanti";
        $db_pass = "1234";


        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

        if (mysqli_connect_error()) {

            echo 'FALLO EN LA CONEXIÓN';
            echo mysqli_connect_error();
            exit;
        }
        
        return $conn;
    }    
?>