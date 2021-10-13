
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styleVehiculo.css" />
    <link rel="stylesheet" href="../header_y_footer.css" />
    <title>Listado Vehiculos | Talleres Zamoen</title>
</head>
<body>

    <header></header>

    <div class="outer-container">
        <form id="form-vehiculo" name="Vehiculo" method="post" >

            <input class="input-style" name="nombre" id="nombre" type="text" placeholder="Indique su nombre" />
            <input class="input-style" name="dni" id="dni" type="text" placeholder="Indique su DNI" /><br><br>
            <div class="box-btn">
                <button class="btn">Buscar</button>
                <button class="btn edit">Editar</button>
                <button class="btn newvh">Nuevo Vehiculo</button>
            </div>
        </form>

        <h3 name="h3-saludo" id="h3-saludo">
        <?php
 
            $name = $_POST['nombre'];
           
            echo 'Bienvenido '.$name;
        ?>
        </h3>

        

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


        
                $sql =  "SELECT matricula, marca, modelo, año, tipo_servicio, descripcion
                FROM lista_vehiculos, lista_servicios
                WHERE id_usuario = (SELECT id_usuario
                                    FROM lista_usuario 
                                    WHERE dni = '$dni')
                AND lista_vehiculos.id_servicio = lista_servicios.id_servicio";
                        
                        
    

                $results = mysqli_query($conn, $sql);
            
                if ($results === false) {
                    echo mysqli_error($conn);
                } else {

                    ?>
                    <table name="datosUsuario" id="datosUsuarios">
            
                        <th>Matrícula</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Año</th>
                        <th>Tipo Servicio</th>
                        <th>Descripcion</th>
                    <?php
                    // while($users = mysqli_fetch_array($results)){
                   foreach ($results as $valor) {
                       ?>
                       <tr>
                           <?php
                           foreach ($valor as $k) {
                               ?>
                               <td><?php echo $k; ?></td>
                               <?php
                           }
                           ?>
                       </tr>
                       <?php
                   }
                    
                }
            
                mysqli_close($conn);
            
            ?>

        </table>
    </div>

    

</body>
</html>