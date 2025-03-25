<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Domine:wght@400..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="ContenedorContenido">
        <?php include 'header.php'?>

        <div class="registration-container">
            <div class="registration-card">
                <h1 class="registration-title">Crear Cuenta</h1>
                <form id="registerForm" class="registration-form">
                    <div class="form-group">
                        <label for="nombre" class="form-label">Nombre Completo</label>
                        <input type="text" id="nombre" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label for="correo" class="form-label">Correo Electrónico</label>
                        <input type="email" id="correo" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" id="password" class="form-input" required>
                        <small class="form-hint">Mínimo 8 caracteres</small>
                    </div>
                    <div class="form-group">
                    </div>
                    <button type="submit" class="submit-button">Registrarse</button>
                </form>
                <div id="message" class="message-box"></div>
                <div class="login-link">
                    ¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a>
                </div>
            </div>
        </div>
    </div>

    <script type="module" src="register.js"></script>

</body>
</html>