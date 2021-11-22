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

    function datosNombre ($conn, $dni){
    
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

    function crearServicio($tipoServicio, $descripcionServicio,$conn, $dni, $id_matricula){
        $sql =  "INSERT INTO lista_servicios (tipo_servicio, descripcion, id_matricula) VALUES ('" . $tipoServicio . "','" . $descripcionServicio . "',$id_matricula)";

        $results = mysqli_query($conn, $sql);

        if ($results == false) {

            echo mysqli_error($conn);
        } else {

            header('Location: ../Vehiculos/vehiculo.php?dni=' . $dni);
        }
    }

    function camposCompletados($matricula, $tipoServicio, $descripcionServicio){
        if (!empty($matricula) && !empty($tipoServicio) && !empty($descripcionServicio)) {
            return true;
        }else{
            return false;
        }
    }

    function crearUsuario($nombre, $apellidos, $dni, $telefono, $email, $contra, $conn){

        session_start();
        
        crearCookie($_SESSION['dni'] . 'Cookie');
        $id_admin = 2;

        $sql =  "INSERT INTO lista_usuario (nombre, apellidos, dni, telefono, email, contrasena, id_admin) VALUES ('$nombre', '$apellidos', '$dni', '$telefono', '$email', '$contra', '$id_admin')";
                
        $results = mysqli_query($conn, $sql);
    
        if ($results === false) {
        echo mysqli_error($conn);
        }
        else{

            header("Location: ../Vehiculos/vehiculo.php?dni=$dni");

        }
    }

    function camposCompletadosNuevoUsuario($nombre, $apellidos, $dni ,$telefono, $email, $contra){
        if (!empty($nombre) && !empty($apellidos) && !empty($dni) && !empty($telefono) && !empty($email) &&  !empty($contra)) {
            return true;
        }
        else {
            return false;
        }
    }

    function comprobarDatosNuevoVehivulo($matricula, $marca, $year){
        if (!empty($matricula) && !empty($marca) && !empty($year)) {
            return true;
        } else{
            return false;
        }
    }

    function crearVehiculo($matricula,$marca, $modelo, $year, $id_usuario, $conn, $sql){ //funcion para almacenar los datos del nuevo vehiculo en la bse de datos

        $sql =  "INSERT INTO lista_vehiculos (matricula, marca, modelo, año, id_usuario) VALUES ( '$matricula', '$marca', '$modelo', '$year', $id_usuario)";

        $results = mysqli_query($conn, $sql);

        if ($results == false) {

            echo mysqli_error($conn);
        } else {
            header('Location: ../Vehiculos/vehiculo.php?dni=' . $_GET['dni']);
            
        }
    }
?>