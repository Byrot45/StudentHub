import { createClient } from 'https://cdn.jsdelivr.net/npm/@supabase/supabase-js/+esm';

// Configuración de Supabase
const supabaseUrl = 'https://ybxyvrsidrvjdgrhziqb.supabase.co';
const supabaseKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InlieHl2cnNpZHJ2amRncmh6aXFiIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTc0Mjg0MTc0MiwiZXhwIjoyMDU4NDE3NzQyfQ.2FftuKpMqtdf5vMMSaCvGAgNc0zRH45iJ0s_BHFsVWI';
const supabase = createClient(supabaseUrl, supabaseKey);

document.getElementById('loginForm').addEventListener('submit', async (e) => {
    e.preventDefault();

    // Obtener valores del formulario
    const correo = document.getElementById('correo').value.trim();
    const password = document.getElementById('password').value;

    if (!correo || !password) {
        alert('Todos los campos son obligatorios');
        return;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(correo)) {
        alert('Por favor, ingresa un correo electrónico válido');
        return;
    }

    try {
        // Autenticar al usuario
        const { data: authData, error: authError } = await supabase.auth.signInWithPassword({
            email: correo,
            password: password
        });

        if (authError) {
            console.error('Error en la autenticación:', authError);
            alert('Error en la autenticación: ' + authError.message);
            return;
        }

        console.log('Usuario autenticado:', authData);

        // Obtener el ID del usuario desde la base de datos
        const { data, error } = await supabase
            .from('Tabla Usuarios')
            .select('*')
            .eq('Correo', correo)
            .single(); // Asegurarse de que solo se obtenga una fila

        if (error || !data) {
            console.error('Error al obtener los datos del usuario:', error);
            alert('Usuario no encontrado o error al obtener datos.');
            return;
        }

        // Guardar el ID del usuario en sessionStorage
        sessionStorage.setItem('ID_usuario', data.ID_usuario);
        sessionStorage.setItem('Nombre_usuario', data.Nombre);
        sessionStorage.setItem('Rol_usuario', data.Rol);

        // Mostrar el mensaje de bienvenida
        alert(`Bienvenido ${data.Rol} ${data.Nombre}`);

        // Redirigir a la página principal
        window.location.href = 'index.php';
    } catch (error) {
        console.error('Error al iniciar sesión:', error);
        alert('Error al iniciar sesión: ' + error.message);
    }
});
