<pre>
<?php
    
    $db_host = "localhost";
    $db_name = "bd_taller";
    $db_user = "root";
    $db_pass = "2DAW2021...";
    
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    
    if (mysqli_connect_error()) {

        echo 'FALLO EN LA CONEXIÓN';
        echo mysqli_connect_error();
        exit;
    }
     
    $sql = "SELECT nombre, apellidos, telefono
            FROM lista_usuario";
 
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

