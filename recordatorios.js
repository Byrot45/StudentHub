import { createClient } from 'https://cdn.jsdelivr.net/npm/@supabase/supabase-js/+esm';

const supabaseUrl = 'https://ybxyvrsidrvjdgrhziqb.supabase.co';
const supabaseKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InlieHl2cnNpZHJ2amRncmh6aXFiIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTc0Mjg0MTc0MiwiZXhwIjoyMDU4NDE3NzQyfQ.2FftuKpMqtdf5vMMSaCvGAgNc0zRH45iJ0s_BHFsVWI'; // Sustituye con tu clave real
const supabase = createClient(supabaseUrl, supabaseKey);

// Aquí pones manualmente el ID del usuario (idealmente debería venir desde login)
const ID_usuario = sessionStorage.getItem('ID_usuario');


document.getElementById('recordatorioForm').addEventListener('submit', async (e) => {
  e.preventDefault();

  const titulo = document.getElementById('titulo').value.trim();
  const descripcion = document.getElementById('descripcion').value.trim();
  const fecha = document.getElementById('fecha').value;
  const hora = document.getElementById('hora').value;

  if (!titulo || !fecha) {
    alert('El título y la fecha son obligatorios.');
    return;
  }

  const { error } = await supabase.from('Recordatorios').insert([
    {
      ID_usuario,
      Titulo: titulo,
      Descripcion: descripcion,
      Fecha: fecha,
      Hora: hora || null
    }
  ]);

  if (error) {
    console.error('Error al guardar recordatorio:', error);
    alert('No se pudo guardar el recordatorio.');
  } else {
    alert('Recordatorio guardado.');
    document.getElementById('recordatorioForm').reset();
    cargarRecordatorios();
  }
});

async function cargarRecordatorios() {
  const { data, error } = await supabase
    .from('Recordatorios')
    .select('*')
    .eq('ID_usuario', ID_usuario)
    .order('Fecha', { ascending: true });

  const lista = document.getElementById('listaRecordatorios');
  lista.innerHTML = '';

  if (error) {
    console.error('Error al cargar:', error);
    return;
  }

  data.forEach(rec => {
    const item = document.createElement('li');
    item.textContent = `${rec.Fecha} ${rec.Hora || ''} - ${rec.Titulo}`;
    lista.appendChild(item);
  });
}

cargarRecordatorios();
