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

    function crearCookie($nombreCookie){
        //Creo el nombre de la cookie
        $GLOBALS["nombre"] = $nombreCookie;
        //creo el valor de la cookie
        $date = new DateTime();
        //Paso el valor a String
        $valor = $date->format('Y-m-d H:i:s');
        // El tiempo de expiración es en 1 dia. PHP traduce la fecha al formato adecuado
        $expiracion = time() + 84600*15;
        setcookie($GLOBALS["nombre"], $valor, $expiracion, "/");
        // echo "Ultima conexion relizada el: ".$_COOKIE[$nombre];
        // return $valor;
    }

?>