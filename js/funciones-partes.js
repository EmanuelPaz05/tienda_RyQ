//Llamar a las partes
    // Utiliza fetch para obtener el contenido del header
    fetch('partes/header.html')
        .then(response => response.text())
        .then(html => {
            // Inserta el contenido del header en el contenedor
            document.getElementById('headerContainer').innerHTML = html;
        })
        .catch(error => console.error('Error al cargar el encabezado:', error));

        // Utiliza fetch para obtener el contenido del main
    fetch('partes/main.php')
        .then(response => response.text())
        .then(html => {
            // Inserta el contenido del main en el contenedor
            document.getElementById('mainContainer').innerHTML = html;
        })
        .catch(error => console.error('Error al cargar el encabezado:', error));


        // Utiliza fetch para obtener el contenido del footer
    fetch('partes/footer.html')
        .then(response => response.text())
        .then(html => {
            // Inserta el contenido del footer en el contenedor
            document.getElementById('footerContainer').innerHTML = html;
        })
        .catch(error => console.error('Error al cargar el footer:', error));



//header
document.addEventListener('DOMContentLoaded', function () {
        const menuButton = document.getElementById('menu-button');
        const dropdownMenu = document.getElementById('dropdown-menu');

        // Cierra el menú desplegable al cargar la página
        dropdownMenu.style.display = 'none';

        menuButton.addEventListener('click', function() {
            // Cambiar la visibilidad del menú desplegable
            dropdownMenu.style.display = (dropdownMenu.style.display === 'none' || dropdownMenu.style.display === '') ? 'block' : 'none';
        });

        // Cierra el menú si se hace clic fuera de él
        document.addEventListener('click', function(event) {
            if (!menuButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                // Oculta el menú desplegable
                dropdownMenu.style.display = 'none';
            }
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



//MAIN
document.addEventListener('DOMContentLoaded', function () {

    let span1 = document.querySelectorAll('.ultimos-ingresos .arrows span');
    let producto1 = document.querySelectorAll('.ultimos-ingresos .producto');
    let product_page1 = Math.ceil(producto1.length / 4);
    let l1 = 0;
    let movePer1 = 25.34;
    let maxMove1 = 203;
    
    let span2 = document.querySelectorAll('.lo-mas-comprado .arrows span');
    let producto2 = document.querySelectorAll('.lo-mas-comprado .producto');
    let product_page2 = Math.ceil(producto2.length / 4);
    let l2 = 0;
    let movePer2 = 25.34;
    let maxMove2 = 203;
    
    // Móvil
    let mobile_view = window.matchMedia("(max-width: 768px)");
    if (mobile_view.matches) {
        movePer1 = 50.36;
        maxMove1 = 504;
        movePer2 = 50.36;
        maxMove2 = 504;
    }
    
    // Añade un log para depurar
    console.log('Número de elementos span1:', span1.length);
    console.log('Número de elementos span2:', span2.length);
    
    // Verifica si span1[0] y span2[0] existen antes de asignar el onclick
    if (span1.length >= 1) {
        span1[0].onclick = () => { left_mover1(); };
    } else {
        console.error('No se encontró el primer elemento span1.');
    }
    
    if (span2.length >= 1) {
        span2[0].onclick = () => { left_mover2(); };
    } else {
        console.error('No se encontró el primer elemento span2.');
    }
    
    let left_mover1 = () => {
        l1 = l1 - movePer1;
        if (l1 <= 0) { l1 = 0; }
        for (const i of producto1) {
            if (product_page1 > 1)
                i.style.left = '-' + l1 + '%';
        }
    };
    
    let left_mover2 = () => {
        l2 = l2 - movePer2;
        if (l2 <= 0) { l2 = 0; }
        for (const i of producto2) {
            if (product_page2 > 1)
                i.style.left = '-' + l2 + '%';
        }
    };
    });


    function redirectToDetalle(urlDetalle) {
        // Redirige a la página de detalle del producto
        window.location.href = urlDetalle;
    }
