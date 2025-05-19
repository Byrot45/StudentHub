// auth.js
document.addEventListener('DOMContentLoaded', function() {
    const ID_usuario = sessionStorage.getItem('ID_usuario');
    
    if (!ID_usuario) {
        alert("Debes iniciar sesión para acceder a esta página.");
        window.location.href = 'login.php';
    }
});
