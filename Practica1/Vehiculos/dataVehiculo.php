<pre>
<?php
 
     $name = $_POST['nombre'];
     $apellido = $_POST['apellido'];
     $db_host = "localhost";
     $db_name = "bd_taller";
     $db_user = "root";
     $db_pass = "2DAW2021...";

     $name = strtolower($name);
     $apellido = strtolower($apellido);

     echo "<h3>Bienvenido".$name." ".$apellido."</h3>";
     
     $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
     
     if (mysqli_connect_error()) {
 
         echo 'FALLO EN LA CONEXIÓN';
         echo mysqli_connect_error();
         exit;
     }
      
     $sql = "SELECT nombre, apellidos
             FROM lista_usuario";
     $results = mysqli_query($conn, $sql);
 
     if ($results === false) {
         echo mysqli_error($conn);
     } else {

    
        while($users = mysqli_fetch_array($results)){

          
        }
    
     }
 
 
     mysqli_close($conn);
  
 ?>
 </pre>
 