<?php
    function Conexion(){

        $db_host = "10.192.240.25:3306";
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

    function datosNombre($conn, $dni){
    
        $sqlName = "SELECT nombre FROM lista_usuario WHERE dni = '$dni'";

        $resultName = mysqli_query($conn, $sqlName);
    
        if ($resultName === false) {
            echo mysqli_error($conn);
        } else {
    
            $info = mysqli_fetch_array($resultName);
            $name = $info['nombre'];
            return $name;   
        }
    
    }
?>