<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
     <link rel="stylesheet" href="styleLogin.css">
</head>
<body>
    <header>
      <h1>Login</h1>
    </header>

    <section class="container">
      <form id="my-form">
        <h1>Agragar usuario</h1>
        <div class="msg"></div>
        <div>
          <label for="name">Nombre Usuario:</label>
          <input type="text" id="name">
        </div>
        <div>
          <label for="email">password:</label>
          <input type="text" id="email">
        </div>
        <input class="btn" type="submit" value="Submit">
      </form>

      <ul id="users"></ul>
    </section>
</body>
</html>