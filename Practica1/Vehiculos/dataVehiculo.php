<pre>
<?php
 
     $name = $_GET['nombre'];
     $apellido = $_GET['apellido'];
     $db_host = "localhost";
     $db_name = "bd_taller";
     $db_user = "root";
     $db_pass = "2DAW2021...";

     $name = strtolower($name);
     $apellido = strtolower($apellido);
     
     $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
     
     if (mysqli_connect_error()) {
 
         echo 'FALLO EN LA CONEXIÓN';
         echo mysqli_connect_error();
         exit;
     }
      
     $sql = "SELECT nombre, apellidos
             FROM lista_usuario
             WHERE nombre = "+$name+" AND apellidos = "+$apellido;
  
     $results = mysqli_query($conn, $sql);
 
     if ($results === false) {
         echo mysqli_error($conn);
     } else {
         $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
         print_r($users);
     }
 
 
     mysqli_close($conn);
  
 ?>
 </pre>
 