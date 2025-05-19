<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Domine:wght@400..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

        <title>StudentHub</title>
    <script type="text/javascript" src="darkmode.js" defer></script>
</head>

<body class = "Contenedor">

    <?php include 'header.php'?>
    <div class="ContenedorContenido">
        

        <div class="ContenedorBase ContenedorMayorHome">

                <div id="ContenedorTitulo">
                    <p id="Subtitulo">Agenda de estudiantes,<br>para estudiantes</p>

                <a href="recordatorios.php"
                id = "BotonDocumentacion">

                        Crear un recordatorio
                        <img src="Imagenes/rightArrow.svg" alt="flecha">
                 </a>    
        </div>
       
            
                
        </div>
               
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const ID_usuario = sessionStorage.getItem('ID_usuario');

        if (ID_usuario) {
            document.getElementById('BotonCabeceraInicio').style.display = 'none';
            document.getElementById('BotonCabeceraRegistro').style.display = 'none';
        }
    });
</script>


</body>

</html>