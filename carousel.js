let currentIndex = 0; // Índice actual
const items = document.querySelectorAll(".carousel .encargado");
const totalItems = items.length;

// Función para mover el carrusel
function moveCarousel(direction) {
    currentIndex += direction;

    // Si llegamos al final, volver al inicio
    if (currentIndex >= totalItems) {
        currentIndex = 0;
    }
    // Si retrocedemos más allá del inicio, ir al final
    if (currentIndex < 0) {
        currentIndex = totalItems - 1;
    }

    // Calcular el desplazamiento
    const offset = -currentIndex * 300; // 300px es el ancho de cada tarjeta
    document.querySelector(".carousel").style.transform = `translateX(${offset}px)`;
}

// Configurar desplazamiento automático cada 20 segundos
setInterval(() => {
    moveCarousel(1); // Mover hacia la derecha
}, 20000);