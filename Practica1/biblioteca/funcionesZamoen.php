<?php //archivo donde creamos funciones para optimizar aquellos fragmentos de codigo que son recurrentes en todos los archivos. 
    function Conexion(){//funcion para conectar a con el servidor y la base de datos.

        $db_host = "10.192.240.25:3307";
        $db_name = "bd_taller";
        $db_user = "cuentaSanti";
        $db_pass = "1234";


        try{//try and catch para capturar las excepciones y mostrar el error al usuario.
            $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
        }
        catch(PDOException $e){

            echo 'FALLO EN LA CONEXIÓN';
            echo mysqli_connect_error();
            exit;
        }
        
        return $conn;
    }    

    function datosNombre($conn, $dni){//funcion para almacenar los datos de los usuarios y realizar la consulta a la base de datos. 
    
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

    function crearCookie($nombreCookie){ //funcion para crear y almacenar cookie
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

    function crearServicio($tipoServicio, $descripcionServicio,$conn, $dni, $id_matricula){//funcion para añadir nuevo servicio a la base de datos.
        $sql =  "INSERT INTO lista_servicios (tipo_servicio, descripcion, id_matricula) VALUES ('" . $tipoServicio . "','" . $descripcionServicio . "',$id_matricula)";

        $results = mysqli_query($conn, $sql);

        if ($results == false) {

            echo mysqli_error($conn);
        } else {

            header('Location: ../Vehiculos/vehiculo.php?dni=' . $dni);
        }
    }

    function camposCompletadosNuevoServicio($matricula, $tipoServicio, $descripcionServicio){//funcion para comprobar que esten rellenos los datos en el formulario nuevo servicio. 
        if (!empty($matricula) && !empty($tipoServicio) && !empty($descripcionServicio)) {
            return true;
        }else{
            return false;
        }
    }

    function crearUsuario($nombre, $apellidos, $dni, $telefono, $email, $contra, $conn){//funcion  para almacenar en la base de datos los datos del nuevo usuario introducidos en el formulario

        session_start();

        $_SESSION['dni'] = $dni;
        $id_admin = 2;

        $sql =  "INSERT INTO lista_usuario (nombre, apellidos, dni, telefono, email, contrasena, id_admin) VALUES ('$nombre', '$apellidos', '$dni', '$telefono', '$email', '$contra', '$id_admin')";
                
        $results = mysqli_query($conn, $sql);
    
        if ($results === false) {
        echo mysqli_error($conn);
        }
        else{

            header('Location: ../Vehiculos/vehiculo.php ?dni=<?php echo $_GET["dni"]; ?>&id_admin=<?php echo $_GET["id_admin"]; ?>' );

        }
    }

    function camposCompletadosNuevoUsuario($nombre, $apellidos, $dni ,$telefono, $email, $contra){ //funcion para comprobar que el formulario esta relleno
        if (!empty($nombre) && !empty($apellidos) && !empty($dni) && !empty($telefono) && !empty($email) &&  !empty($contra)) {
            return true;
        }
        else {
            return false;
        }
    }

    function comprobarDatosNuevoVehivulo($matricula, $marca, $year){ //funcion para comprobar que el formulario esta relleno
        if (!empty($matricula) && !empty($modelo) && !empty($year)) {
            return true;
        } else{
            return false;
        }
    }

    function crearVehiculo($matricula,$marca, $modelo, $year, $id_usuario, $conn, $sql){ //funcion para almacenar los datos del nuevo vehiculo en la base de datos
        $sql =  "INSERT INTO lista_vehiculos (matricula, marca, modelo, año, id_usuario) VALUES ( '$matricula', '$marca', '$modelo', '$year', $id_usuario)";

        $results = mysqli_query($conn, $sql);

        if ($results == false) {

            echo mysqli_error($conn);
        } else {
            header('Location: ../Vehiculos/vehiculo.php?dni=' . $_GET['dni']);
        }
    }
?>