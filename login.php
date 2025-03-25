<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Domine:wght@400..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="ContenedorContenido">
    <?php include 'header.php'?>
        <div class="login-container">
            <div class="login-card">
                <h1 class="login-title">Iniciar Sesión</h1>
                <form id="loginForm" class="login-form">
                    <div class="form-group">
                        <label for="correo" class="form-label">Correo Electrónico</label>
                        <input type="email" id="correo" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" id="password" class="form-input" required>
                    </div>
                    <button type="submit" class="submit-button">Iniciar sesión</button>
                </form>
                <div id="message" class="message-box"></div>
                <div class="register-link">
                    ¿No tienes cuenta? <a href="registro.php">Regístrate</a>
                </div>
            </div>
        </div>
    </div>

    <script type="module" src="login.js"></script>
</body>
</html>
