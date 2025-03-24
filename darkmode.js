let modoOscuro = localStorage.getItem('modoOscuro');
const CambioModo = document.getElementById('CambioModo');

const activarModoOscuro = () => {
    document.body.classList.add('modoOscuro');
    localStorage.setItem('modoOscuro', 'activo');
}

const desactivarModoOscuro = () => {
    document.body.classList.remove('modoOscuro');
    localStorage.setItem('modoOscuro', 'inactivo');
}

// Verificar el estado del modo oscuro al cargar la página
if (modoOscuro === 'activo') {
    activarModoOscuro();
}

CambioModo.addEventListener("click", () => {
    modoOscuro = localStorage.getItem('modoOscuro'); // Se vuelve a obtener el estado actualizado
    if (modoOscuro !== "activo") {
        activarModoOscuro();
    } else {
        desactivarModoOscuro();
    }
});

