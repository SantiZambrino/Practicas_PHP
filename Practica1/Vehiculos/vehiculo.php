
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styleHeader.css">
   
    <link rel="stylesheet" href="../styles/styleVehiculo.css">
    <link rel="shortcut icon" href="../img/favicon-logo.png" />
    <title>Listado Vehiculos | Talleres Zamoen</title>
</head>
<body>

    <div class="outer-container">

        <header id="cabecera">
            <a href="../Login/login.php">
                <img id="logo-taller" src="../img/Logo-Coche.png" alt="Logo Talleres Zamoen">
            </a>
        </header>

        <div class="container-form">
            <form id="form-vehiculo" name="Vehiculo" method="post" >

                <input class="input-style" name="nombre" id="nombre" type="text" placeholder="Indique su nombre" />
                <input class="input-style" name="dni" id="dni" type="text" placeholder="Indique su DNI" /><br><br>
                <div class="box-btn">
                    <button class="btn">Buscar</button>
                    <button class="btn edit">Editar</button>
                    <button class="btn newvh">Nuevo Vehiculo</button>
        
                </div>
                
            </form>
        </div>

        <?php
 
        $name = $_POST['nombre'];
        $dni = $_POST['dni'];
        $db_host = "localhost";
        $db_name = "bd_taller";
        $db_user = "root";
        $db_pass = "2DAW2021...";

        $name = strtolower($name);
        

        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
        
        if (mysqli_connect_error()) {
    
            echo 'FALLO EN LA CONEXIÓN';
            echo mysqli_connect_error();
            exit;
        }
        
        // $sql = "SELECT vh.matricula, vh.marca, vh.modelo, vh.año FROM lista_vehiculos AS vh
        //     INNER JOIN lista_usuario 
        //     WHERE vh.id_usuario = lista.usuario.id_usuario"
        //     AND ;



        $sql =  "SELECT matricula, marca, modelo, año
        FROM lista_vehiculos, lista_servicios
        WHERE id_usuario = (SELECT id_usuario
                            FROM lista_usuario 
                            WHERE dni = '$dni')
        AND lista_vehiculos.id_servicio = lista_servicios.id_servicio";
                
                


        $results = mysqli_query($conn, $sql);
    
        if ($results === false) {
            echo mysqli_error($conn);
        } 
        else {

                ?>
            
            <?php
            if(!empty($name)){
            ?>
                <div class="container-view">

                <table name="datosUsuario" id="datosUsuarios">
                
                    <th>Matrícula</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                
                <?php
                // while($users = mysqli_fetch_array($results)){
                foreach ($results as $valor) {
                    ?>
                    
                    <a href="#"><tr>
                        <?php
                        foreach ($valor as $k) {
                            ?>
                            <td><?php echo $k; ?></td>
                            <?php
                        }
                        ?>
                        
                    </tr></a>
                    <?php
                }
                
            }
        
        }
        mysqli_close($conn);
    
    ?>

            </table>


        </div>

    </div>


        
    </div>

    

</body>
</html>