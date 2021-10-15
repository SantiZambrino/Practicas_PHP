
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styleHeader.css">
   
    <link rel="stylesheet" href="../styles/styleVehiculo.css">
    <link rel="shortcut icon" href="../img/favicon-logo.png" />
    <title>Servicios</title>
</head>
<body>

        <?php
        include "../biblioteca/funcionesZamoen.php";

        $conn = Conexion();
 
        $name = $_GET['argumento1'];
        $dni = $_GET['argumento2'];
        
        $name = strtolower($name);
    
        
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
        
        }
        mysqli_close($conn);
    
    ?>

            </table>


        </div>

    </div>


        
    </div>

    

</body>
</html>