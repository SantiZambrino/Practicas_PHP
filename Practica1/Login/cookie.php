<?php 

    function crearCookie($nombreCookie){
        //Creo el nombre de la cookie
        $nombre = $nombreCookie;
        //creo el valor de la cookie
        $date = new DateTime();
        //Paso el valor a String
        $valor = $date->format('Y-m-d H:i:s');
        // El tiempo de expiración es en 1 dia. PHP traduce la fecha al formato adecuado
        $expiracion = time() + 84600*15;
        setcookie($nombre, $valor, $expiracion);
        //Isset determina si una variable está definida y no es null
        if(isset($_COOKIE[$nombre])){
            echo "Ultima conexion relizada el: ".$_COOKIE[$nombre];
        } else{
            echo "La cookie no esta definida";
        }
    }
?>