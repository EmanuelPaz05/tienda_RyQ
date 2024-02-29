  window.addEventListener('DOMContentLoaded', () => {
    const navbar = document.querySelector('.navbar');
  
    function adjustNavbarWidth() {
      const screenWidth = window.innerWidth;
      if (screenWidth <= 790) {
        navbar.classList.add('w-100');
      } else {
        navbar.classList.remove('w-100');
      }
    }

    // Ajusta el ancho del navbar cuando se carga la página
    adjustNavbarWidth();

    // Ajusta el ancho del navbar cuando se redimensiona la ventana
    window.addEventListener('resize', () => {
      adjustNavbarWidth();
    });
  });

//NAV CHICO
document.addEventListener('DOMContentLoaded', function () {
const menuItems = document.querySelectorAll('.has-submenu');

menuItems.forEach(item => {
    item.addEventListener('click', function (event) {
    event.preventDefault();
    // Cierra los demás elementos
    menuItems.forEach(otherItem => {
        if (otherItem !== item) {
        otherItem.classList.remove('open');
        }
    });

    this.classList.toggle('open');
    });
});

// Cierra el menú si se hace clic fuera de él
document.addEventListener('click', function (event) {
    if (!event.target.closest('.has-submenu')) {
    menuItems.forEach(item => {
        item.classList.remove('open');
    });
    }
});
});