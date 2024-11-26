document.addEventListener("DOMContentLoaded", () => {
    const carousel = document.querySelector(".carousel");
    const items = Array.from(carousel.children);
    const visibleItems = Math.ceil(carousel.parentElement.offsetWidth / 300); // 300px es el ancho de cada tarjeta
  
    // Duplicar los elementos
    items.forEach((item) => {
      const clone = item.cloneNode(true);
      carousel.appendChild(clone);
    });
  
    // Calcular la cantidad visible para ajustar la animación
    carousel.style.setProperty("--visible-items", visibleItems);
  });