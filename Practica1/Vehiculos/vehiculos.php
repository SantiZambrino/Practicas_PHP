
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleVehiculo.css" />
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

        <table name="datosUsuario" id="datosUsuarios">
            
            <th>Matrícula</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Año</th>

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
                
                $sql = "SELECT matricula, marca, modelo, año
                        FROM lista_vehiculos";

                $results = mysqli_query($conn, $sql);
            
                if ($results === false) {
                    echo mysqli_error($conn);
                } else {

                
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

    <footer></footer>

</body>
</html>