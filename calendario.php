<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario - StudentHub</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
 <?php include 'header.php'?>
<h1>Calendario de Recordatorios</h1>
<div id="calendar"></div>
<div id="recordatorioDetalles"></div>

<script type="module">
import { createClient } from 'https://cdn.jsdelivr.net/npm/@supabase/supabase-js/+esm';

const supabaseUrl = 'https://ybxyvrsidrvjdgrhziqb.supabase.co';
const supabaseKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InlieHl2cnNpZHJ2amRncmh6aXFiIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTc0Mjg0MTc0MiwiZXhwIjoyMDU4NDE3NzQyfQ.2FftuKpMqtdf5vMMSaCvGAgNc0zRH45iJ0s_BHFsVWI';
const supabase = createClient(supabaseUrl, supabaseKey);

async function generarCalendario() {
    const calendar = document.getElementById('calendar');
    const fechaActual = new Date();
    const mes = fechaActual.getMonth();
    const año = fechaActual.getFullYear();
    const ultimoDia = new Date(año, mes + 1, 0).getDate();

    calendar.innerHTML = '';

    for (let i = 1; i <= ultimoDia; i++) {
        const dia = document.createElement('div');
        dia.textContent = i;
        dia.className = 'dia';
        dia.onclick = () => mostrarRecordatorios(i);
        calendar.appendChild(dia);
    }

    cargarRecordatorios();
}

async function cargarRecordatorios() {
    const ID_usuario = sessionStorage.getItem('ID_usuario');
    if (!ID_usuario) return;

    const { data, error } = await supabase.from('Recordatorios').select('*').eq('ID_usuario', ID_usuario);

    if (error) {
        console.error('Error al cargar recordatorios:', error);
        return;
    }

    const fechaActual = new Date();
    const mesActual = fechaActual.getMonth() + 1; // Mes en formato 1-12
    const añoActual = fechaActual.getFullYear();

    console.log('Recordatorios cargados:', data); // Verificar qué recordatorios están cargando

    data.forEach(recordatorio => {
        const [año, mes, dia] = recordatorio.fecha.split('-').map(Number);

        if (año === añoActual && mes === mesActual) {
            const diaElemento = Array.from(document.querySelectorAll('.dia')).find(el => parseInt(el.textContent.trim()) === dia);
            if (diaElemento) {
                diaElemento.classList.add('con-recordatorio');
                console.log(`Recordatorio encontrado para el día ${dia}`);
            }
        }
    });
}



function mostrarRecordatorios(dia) {
    const ID_usuario = sessionStorage.getItem('ID_usuario');
    if (!ID_usuario) return;

    const detalles = document.getElementById('recordatorioDetalles');
    detalles.innerHTML = '';

    supabase.from('Recordatorios')
        .select('*')
        .eq('ID_usuario', ID_usuario)
        .then(({ data }) => {
            const recordatoriosDia = data.filter(r => new Date(r.fecha).getDate() === dia);

            if (recordatoriosDia.length === 0) {
                detalles.textContent = 'No hay recordatorios para este día';
                return;
            }

            recordatoriosDia.forEach(recordatorio => {
                const p = document.createElement('p');
                p.textContent = `${recordatorio.fecha}: ${recordatorio.descripcion}`;
                detalles.appendChild(p);
            });
        });
}

// Inicializar calendario
document.addEventListener('DOMContentLoaded', generarCalendario);
</script>

<style>
#calendar {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 5px;
}
.dia {
    padding: 10px;
    border: 1px solid #ccc;
    text-align: center;
    cursor: pointer;
}
.con-recordatorio {
    background-color: #ffd700;
}
</style>
<script src="auth.js"></script>

</body>
</html>
