<!DOCTYPE html>
<html lang="es">
<head>
  
<link rel="stylesheet" href="styles.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Domine:wght@400..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
  <meta charset="UTF-8" />
  <title>Calendario - Recordatorios</title>
</head>
<body>
   <?php include 'header.php'?>
  <h1>Registrar Recordatorio</h1>
  <form id="recordatorioForm">
    <input type="text" id="titulo" placeholder="Título" required><br>
    <textarea id="descripcion" placeholder="Descripción (opcional)"></textarea><br>
    <input type="date" id="fecha" required><br>
    <input type="time" id="hora"><br>
    <button class= "submit-button" type="submit">Guardar Recordatorio</button>
  </form>

  <h2>Recordatorios guardados</h2>
  <ul id="listaRecordatorios"></ul>

  <script type="module" src="recordatorios.js"></script>
  <script src="auth.js"></script>

</body>
</html>
