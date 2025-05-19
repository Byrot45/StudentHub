<h2 class="Cabecera">
    <a href="#">
        <img 
        id="Logo"
        src="https://res.cloudinary.com/dotnb5exs/image/upload/v1742507629/StudentHub/LogoStudentHub.png"
        alt="CSSailor logo">
    </a>

    <a href="index.php">
        <p class="NombrePagina">StudentHub</p>
    </a>

    <div id="MenuCabecera">
        <ul>
            <li class="ListaCabecera">
                <a class="ListaCabecera" href="index.php">Inicio</a>
            </li>
            <li class="ListaCabecera">
                <a class="ListaCabecera" href="recordatorios.php">Recordatorios</a>
            </li>
            <li class="ListaCabecera">
                <a class="ListaCabecera" href="pomodoro.php">Pomodoro</a>
            </li>

            <a href="login.php"><button id="BotonCabeceraInicio" type="button">Iniciar sesión</button></a>
            <a href="registro.php"><button id="BotonCabeceraRegistro" type="button">Registrarse</button></a>
            <span id="usuarioNombre" style="display: none;"></span>
            <button id="BotonCerrarSesion" style="display: none;">Cerrar sesión</button>
        </ul>
    </div>
</h2>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ID_usuario = sessionStorage.getItem('ID_usuario');
        const nombreUsuario = sessionStorage.getItem('Nombre_usuario');

        if (ID_usuario) {
            document.getElementById('BotonCabeceraInicio').style.display = 'none';
            document.getElementById('BotonCabeceraRegistro').style.display = 'none';
            document.getElementById('usuarioNombre').style.display = 'inline';
            document.getElementById('usuarioNombre').textContent = nombreUsuario;
            document.getElementById('BotonCerrarSesion').style.display = 'inline';
        }

        document.getElementById('BotonCerrarSesion').addEventListener('click', function() {
            sessionStorage.clear();
            window.location.href = 'index.php';
        });
    });
</script>
