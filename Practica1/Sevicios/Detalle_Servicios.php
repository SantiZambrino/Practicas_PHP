<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="container">
        <header id="cabecera">
            <h1>Detalle de servicios</h1>
        </header>
        <div id="contenedor">
            <h2>Servicios</h2>
            <form id="form_Servicios" name="form_Serv" method="post" action="Servicios.php">
                <fieldset id="Servicios">
                    <legend>Detalle servicios</legend>
                    <select name="detalle_serv" id="detalle_serv">
                        <option value="1">Cambio Aceite</option>
                        <option value="2">Cambio liquido freno</option>
                        <option value="3">Cambio Neumatico</option>
                    </select>
                    <input type="submit" name="btn_guardar" id="btn_guardar" value="guardar">
                </fieldset>
        </div>
</body>
</html>