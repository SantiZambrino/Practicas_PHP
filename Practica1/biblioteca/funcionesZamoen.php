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


    function validarDNI($dni){
        $letra = strtoupper(substr($dni, -1)) ;
    
        $numeros = substr($dni, 0, -1);
        $valido = false;
        if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
          $valido=true;
        }else{
          $valido=false;
        }
    
        return $valido;
      }
?>