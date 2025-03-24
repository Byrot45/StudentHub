<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temporizador Pomodoro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body id = "BodyPomodoro">
<?php include 'header.php'?>
    <div class="container">
        <h1>Temporizador Pomodoro</h1>
        <div class="timer">
            <span id="minutes">25</span>:<span id="seconds">00</span>
        </div>
        <div class="controls">
            <button id="start">Iniciar</button>
            <button id="reset">Reiniciar</button>
        </div>
        <p id="status">Tiempo de trabajo</p>
    </div>
    <script src="temporizador .js"></script>
</body>
</html>