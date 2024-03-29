<nav class="navbar navbar-expand-lg fixed-top" style="background-color: rgb(2, 2, 27);">
    <div class="container-fluid">
        <img src="../logos/logo.png" height="90px" alt="">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#menu" aria-controls="menu" aria-label="Toggle navigation">
            <span class="link-info fs-1"><i class="bi bi-list"></i></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="menu" aria-labelledby="menuLabel" style="background-color: rgb(2, 2, 27);">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title link-light" id="menuLabel">Panel de admin</h5>
                <button type="button" class="btn btn-outline-light" data-bs-dismiss="offcanvas" aria-label="Close"><i class="bi bi-x fs-5"></i></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 align-items-center">
                    <li class="nav-item">
                        <a class="nav-link link-info" href="http://localhost/tienda_alejandro">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-info" href="http://localhost/tienda_alejandro/tabla_productos/index_productos.php">Productos</a>
                    </li>
                    <li>
                        <a class="nav-link link-info" href="http://localhost/tienda_alejandro/tabla_productos/ventas.html">Ventas</a>
                    </li>
                    <li>
                        <a class="nav-link link-info" href="http://localhost/tienda_alejandro/tabla_productos/compras.html">Compras</a>
                    </li>
                    <li>
                        <button class="btn btn-outline-info">
                            <a class="nav-link link-info" >
                                <i class="bi bi-person-walking"></i> Cerrar sesión
                            </a>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>