<?php

require_once("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $database = new Database();
    $db = $database->getConnect();

    $query = "INSERT INTO users (email, user_password) VALUES (:email, :password)";
    $params = [
        ':email' => $email,
        ':password' => $password
    ];

    $database->executeQuery($query, $params);
}
?>
<!-- 
Fin de php 
-->

<!-- Inicio del html -->
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- 
    Head, 
        -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <!-- fuente de google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <script type = "text/javascript" src = "darkmode.js" defer></script>

   <!-- titulo -->
    <title>Document</title>
</head>
    <!-- Aqui inicia el body -->
     <!-- class = "modoOscuro" -->
    <body>

<!--Inclusion del encabezado de la pagina-->
<?php include 'header.php';?>
  
    <div class = "ContenedorContenido ContenidoRegistro">

   
<!--Formulario de Registro -->

<div class = "ContenedorBase " >
        <h1>Registro</h1>
   
       
    
       <div id = "ContenedorInternoFormulario">
            <form action="" method="post">

                <label for="email">Correo</label>
                <br>
                <input type="email" id="email" name="email" placeholder="ejemplo@correo.com" autocomplete = "off"  required>
                <br> <br>
                <label for="userPassword">Contraseña</label>
                <br>
                <input type="password" id="userPassword" name="password" placeholder="******" required>
                <br> <br>
            </div>

                <button id = "BotonRegistrar" type="submit">Registrar</button>



            </form>
 </div>
</div>
</body>
</html>
