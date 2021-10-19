
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
        $matricula = $_GET['argumento3'];
        
        $name = strtolower($name);
    
        

        $sql =  "SELECT matricula, marca, modelo, año
        FROM lista_vehiculos
        WHERE matricula = '$matricula'";

        $sql2 =  "SELECT tipo_servicio, descripcion
        FROM lista_servicios
        WHERE id_servicio = (select id_servicio FROM lista_vehiculos
        WHERE matricula = '$matricula')";

    

       
        $results = mysqli_query($conn, $sql);
        $results2 = mysqli_query($conn, $sql2);
       
    
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
        // mysqli_close($conn);

    
    ?>

            </table>


        </div>

    </div>

    
            
        </div>

        
    </div>

<!-- Segunda consulta -->
   

                        <?php
                        if(!empty($name)){
                        ?>
                            <div class="container-view">

                            <table name="datosUsuario" id="datosUsuarios">
                            
                                <th>Tipo Servicio</th>
                                <th>Descripcion</th>
            
                            
                            
                            <?php
                            
                            foreach ($results2 as $valor) {
                                ?>
                                
                            <tr>
                                    <?php
                                    foreach ($valor as $j) {
                                        ?>
                                    <td><?php echo $j; ?></td>
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

        


    

</body>
</html>