<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Talleres Zamoen</title>
    <link rel="stylesheet" href="../styles/styleHeader.css">
    <link rel="stylesheet" href="../styles/styleLoginPrueba.css">
    <link rel="shortcut icon" href="../img/favicon-logo.png" />
</head>
<body>

    <div class="outer-container">

        <header id="cabecera">
            <img id="logo-taller" src="../img/Logo-Coche.png" alt="Logo Talleres Zamoen">
        </header>

        <div class="container-login">

            <form id="form-login" name="form-login" action="#" method="POST">

                <input type="text" id="name_usu" class="input-style" name="name-usu" placeholder="Usuario...">
                <input type="password" id="pass_usu" class="input-style" name="pass-usu" placeholder="Contraseña...">
          
                <div class="box-btn">
                <button  class="btn submit" value="enviar">Enviar</button>
                <button  class="btn newUser" value="registrar" onclick="window.location.href='Practica1\\Login\\index.html'">Nuevo Usuario</button>
                </div>
          
            </form>

        </div>
        
      

    </div>

    

    
</body>
</html>