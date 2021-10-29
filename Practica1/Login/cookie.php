<?php 
   

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
        return $valor;
    }

        function getCookie(){
            return "Ultima conexion relizada el: ".$_COOKIE[$GLOBALS["nombre"]];
        }
?>