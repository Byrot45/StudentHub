import { createClient } from 'https://cdn.jsdelivr.net/npm/@supabase/supabase-js/+esm';

const supabaseUrl = 'https://ybxyvrsidrvjdgrhziqb.supabase.co';
const supabaseKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InlieHl2cnNpZHJ2amRncmh6aXFiIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTc0Mjg0MTc0MiwiZXhwIjoyMDU4NDE3NzQyfQ.2FftuKpMqtdf5vMMSaCvGAgNc0zRH45iJ0s_BHFsVWI';
const supabase = createClient(supabaseUrl, supabaseKey);

async function cargarUsuarios() {
    const { data, error } = await supabase.from('Tabla Usuarios').select('*');
    
    if (error) {
        console.error('Error al obtener usuarios:', error);
        return;
    }

    const tableBody = document.getElementById('usersTable');
    tableBody.innerHTML = '';

    data.forEach(user => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${user.ID_usuario}</td>
            <td>${user.Nombre}</td>
            <td>${user.Correo}</td>
            <td>${user.Rol}</td>
            <td>
                <button onclick="cambiarRol('${user.ID_usuario}', '${user.Rol}')">
                    ${user.Rol === 'Tutor' ? 'Hacer Estudiante' : 'Hacer Tutor'}
                </button>
                <button onclick="eliminarUsuario('${user.ID_usuario}')">Eliminar</button>
            </td>
        `;
        tableBody.appendChild(row);
    });
}

async function cambiarRol(userId, rolActual) {
    const nuevoRol = rolActual === 'Tutor' ? 'Estudiante' : 'Tutor';

    const { error } = await supabase.from('Tabla Usuarios').update({ Rol: nuevoRol }).eq('ID_usuario', userId);

    if (error) {
        alert('Error al actualizar el rol');
        console.error(error);
    } else {
        alert(`Usuario actualizado a ${nuevoRol}`);
        cargarUsuarios();
    }
}

async function eliminarUsuario(userId) {
    const { error } = await supabase.from('Tabla Usuarios').delete().eq('ID_usuario', userId);

    if (error) {
        alert('Error al eliminar usuario');
        console.error(error);
    } else {
        alert('Usuario eliminado');
        cargarUsuarios();
    }
}

window.cambiarRol = cambiarRol;
window.eliminarUsuario = eliminarUsuario;

cargarUsuarios();
