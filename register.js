import { createClient } from 'https://cdn.jsdelivr.net/npm/@supabase/supabase-js/+esm';
import bcrypt from 'https://cdn.jsdelivr.net/npm/bcryptjs/+esm';

// Configuración de Supabase
const supabaseUrl = 'https://ybxyvrsidrvjdgrhziqb.supabase.co';
const supabaseKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InlieHl2cnNpZHJ2amRncmh6aXFiIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTc0Mjg0MTc0MiwiZXhwIjoyMDU4NDE3NzQyfQ.2FftuKpMqtdf5vMMSaCvGAgNc0zRH45iJ0s_BHFsVWI';
const supabase = createClient(supabaseUrl, supabaseKey);

document.getElementById('registerForm').addEventListener('submit', async (e) => {
    e.preventDefault();

    // Obtener valores del formulario
    const nombre = document.getElementById('nombre').value.trim();
    const correo = document.getElementById('correo').value.trim();
    const password = document.getElementById('password').value;

    // Validar que todos los campos estén completos
    if (!nombre || !correo || !password) {
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
        // Generar hash de la contraseña con bcrypt
        const hashedPassword = await bcrypt.hash(password, 10);

        // Registrar usuario en la autenticación de Supabase
        const { data: authData, error: authError } = await supabase.auth.signUp({
            email: correo,
            password: password
        });

        if (authError) {
            console.error('Error en la autenticación:', authError);
            alert('Error en la autenticación: ' + authError.message);
            return;
        }

        console.log('Usuario autenticado:', authData);

        // Insertar usuario en la tabla personalizada "usuarios"
        const { data, error } = await supabase.from('Tabla Usuarios').insert([
            {
                Nombre: nombre,
                Correo: correo,
                Password: hashedPassword // Se almacena la contraseña encriptada
            }
        ]);

        if (error) {
            console.error('Error al insertar en la base de datos:', error);
            alert('Error al insertar el usuario en la base de datos: ' + error.message);
            return;
        }

        console.log('Usuario insertado en la base de datos:', data);

        alert('Registro exitoso. Revisa tu correo para verificar tu cuenta.');
        window.location.href = 'verificar.php';
    } catch (error) {
        console.error('Error en el registro:', error);
        alert('Hubo un error en el registro: ' + error.message);
    }
});
