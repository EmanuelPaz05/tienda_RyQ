<?php
session_start();
?>

<header id="menu">
    <!-- Pantallas grandes mayor a 768px -->
    <nav class="d-none d-md-block nav-grande" style="background-color: #01010c;">
        <div class="container-fluid d-flex justify-content-between align-items-center py-2">
            
            <!-- Logo del nav -->
            <a href="http://localhost/tienda_alejandro/" class="navbar-brand" style="margin-left: 10px;">
              <img src="logos/logo.png" alt="" height="120px">
            </a>
    

            <ul class="nav justify-content-center">
                <li class="nav-item">
                  <a class="nav-link" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="catalogo.php">Catalogo</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="preguntas_frecuentes.php">Preguntas Frecuentes</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contacto.html">Contacto</a>
                </li>
            </ul>
    
            <!-- Botones -->
            <div class="botones">
                <!-- Verifica si hay una sesión abierta -->
                <?php if (isset($_SESSION["usuario"])): ?>
                    <?php if ($_SESSION["usu_tipo_rol"] == "admin"): ?>
                        <!-- Si el usuario es admin, muestra el icono de administrador -->
                        <a href="http://localhost/tienda_alejandro/tabla_productos/panel_admin.html">
                          <i class="bi bi-clipboard-data"></i>
                        </a>
                    <?php else: ?>
                        <div class="carrito" id="carrito-btn">
                          <a href="carrito.php">
                            <p>
                              <!-- Aca iria la cantidad de productos en carrito -->
                            </p>
                            <i class="bi bi-cart"></i>
                          </a>
                        </div>
                    <?php endif; ?>
                    <div class="cerrar-sesion">
                        <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/tienda_alejandro/login/logout.php'; ?>" class="btn btn-danger">Cerrar Sesión</a>
                    </div>
                <?php else: ?>
                    <!-- Si no hay sesión activa, muestra el icono de "Ingresar" -->
                    <div class="ingresar">
                        <a href="login\index_login.php">
                            <i class="bi bi-person-fill-up"></i>
                            Ingresar
                        </a>
                    </div>
                <?php endif; ?>

            </div>
                
        </div>
    </nav>

    
    <!-- Pantallas chicas menor a 768px -->
    <nav class="d-block d-md-none py-2" style="background-color: #01010c;">
        <div class="d-flex justify-content-between align-items-center">
              <a href="http://localhost/tienda_alejandro/" class="navbar-brand" style="margin-left: 20px;">
                <img src="logos/logo.png" alt="" height="80px">
              </a>

            <!-- Botón Desplegable -->
            <div class="text-end me-2">
                <button class="btn-rayas" id="menu-button">
                  <b><i class="bi bi-list fs-2 bol"></i></b>
                </button>
            </div>
        </div>

        <!-- Contenido desplegable -->
        <div class="contenido-despegable py-3 px-3" id="dropdown-menu">
            <ul class="navbar-nav m-auto">
              <ul class="nav justify-content-center">
                  <li class="nav-item">
                    <a class="nav-link" href="index.php">Inicio</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="catalogo.php">Catalogo</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="preguntas.html">Preguntas Frecuentes</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contacto.html">Contacto</a>
                  </li>
              </ul>
            </ul>

            <hr class="text-light">

            <!-- Ingresar Movil -->
            <div class="botones">
                <!-- Verifica si hay una sesión abierta -->
                <?php if (isset($_SESSION["usuario"])): ?>
                    <?php if ($_SESSION["usu_tipo_rol"] == "admin"): ?>
                        <!-- Si el usuario es admin, muestra el icono de administrador -->
                        <i class="bi bi-clipboard-data"></i>
                    <?php else: ?>
                        <!-- Si el usuario es usuario común, muestra solo el icono de carrito -->
                        <!-- Botón del carrito -->
                        <div class="carrito" id="icono_carrito">
                          <a href="carrito.php">
                            <p>
                              <!-- Aca iria la cantidad de productos en carrito -->
                            </p>
                            <i class="bi bi-cart"></i>
                          </a>
                        </div>
                    <?php endif; ?>
                    <div class="cerrar-sesion">
                        <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/tienda_alejandro/login/logout.php'; ?>" class="btn btn-danger">Cerrar Sesión</a>
                    </div>
                <?php else: ?>
                    <!-- Si no hay sesión activa, muestra el icono de "Ingresar" -->
                    <div class="ingresar">
                        <a href="login/index_login.php">
                            <i class="bi bi-person-fill-up"></i>
                            Ingresar
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>

</header>


<nav class="nav-chico">
  <ul class="ul-1">
    <li class="has-submenu categorias">
      <a href="#" class="link-light link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Categorías</a>
      <ul class="ul-2">
        <li class="has-submenu">
          <a href="#">Notebooks</a>
          <ul>
            <li><a href="#">Home Office</a></li>
            <li><a href="#">Alto Rendimiento</a></li>
            <li><a href="#">Gaming</a></li>
          </ul>
        </li>
        <li class="has-submenu">
          <a href="#">PCs de escritorios</a>
          <ul>
            <li><a href="#">Home Office</a></li>
            <li><a href="#">Alto Rendimiento</a></li>
            <li><a href="#">Gaming</a></li>
          </ul>
        </li>
        <li class="has-submenu">
          <a href="#">Periféricos</a>
          <ul>
            <li><a href="#">Teclados</a></li>
            <li><a href="#">Mouses</a></li>
            <li><a href="#">Monitores</a></li>
          </ul>
        </li>
      </ul>
    </li>
    <li class="has-submenu marcas mx-4">
      <a href="#" class="link-light link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Marcas</a>
      <ul class="ul-2">
        <li><a href="#">Lenovo</a></li>
        <li><a href="#">Asus</a></li>
        <li><a href="#">Redragon</a></li>
      </ul>
    </li>
    <li class="has-submenu componentes">
      <a href="#" class="link-light link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Componentes de PCs</a>
      <ul class="ul-2">
        <li><a href="#">Placas Madres</a></li>
        <li><a href="#">Rams</a></li>
        <li><a href="#">Microprocesadores</a></li>
      </ul>
    </li>
  </ul>
</nav>
