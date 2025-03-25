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

    // Validar que los campos estén completos
    if (!correo || !password) {
        alert('Todos los campos son obligatorios');
        return;
    }

    // Validar formato de correo electrónico
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(correo)) {
        alert('Por favor, ingresa un correo electrónico válido');
        return;
    }

    try {
        // Intentar autenticar al usuario
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

        // Obtener los datos del usuario desde la tabla 'Usuarios'
        const { data, error } = await supabase
            .from('Tabla Usuarios')
            .select('*')
            .eq('Correo', correo)
            .single(); // Asegurarse de que solo se obtenga una fila

        if (error) {
            console.error('Error al obtener los datos del usuario:', error);
            alert('Error al obtener los datos del usuario: ' + error.message);
            return;
        }

        if (!data) {
            alert('Usuario no encontrado');
            return;
        }

        // Si todo es correcto, mostrar el mensaje de bienvenida
        alert(`Bienvenido ${data.Rol} ${data.Nombre}`);

        // Aquí podrías redirigir a la página principal o hacer cualquier otra acción
        window.location.href = 'home.html'; // Cambia esta URL según tu aplicación

    } catch (error) {
        console.error('Error al iniciar sesión:', error);
        alert('Error al iniciar sesión: ' + error.message);
    }
});
