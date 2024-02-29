  <?php
  session_start();

  // Verificar si el usuario ha iniciado sesión
  if (isset($_SESSION["usuario"])) {
    $usu_id = $_SESSION["usu_id"];
  }

  ?>


  <div class="back">
          <div class="menu container">
              <a href="index.php" class="logo">
                  <img src="logos/logo.png" alt="">

                  <?php
                    if (isset($_SESSION["usuario"])) {
                      echo '<input type="text" id="input-usu-id" class="text-dark" name="" value="'.$usu_id.'">';
                    }else{
                      echo '<input type="text" id="input-usu-id"  class="text-dark" name="" value="0">';
                    }
                  ?>

              </a>
              <input type="checkbox" id="menu">
              <label for="menu" class="btn-rayas">
                  <b><i class="bi bi-list fs-2 bol"></i></b>
              </label>
              <nav class="navbar align-items-center">
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
                      <li class="li-botones">
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
                                      <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/tienda_RyQ/login/logout.php'; ?>" class="btn btn-danger"><i class="bi bi-person-walking"></i> Cerrar</a>
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
                      </li>
                  </ul>
              </nav>
          </div>
  </div>



  <nav class="nav-chico">
          <ul class="ul-1">
            <li class="has-submenu categorias">
              <a href="#" class="link-light link-offset-2 link-underline-opacity-0    link-underline-opacity-100-hover">Categorías</a>
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
              <a href="#" class="link-light link-offset-2 link-underline-opacity-0    link-underline-opacity-100-hover">Marcas</a>
              <ul class="ul-2">
                <li><a href="#">Lenovo</a></li>
                <li><a href="#">Asus</a></li>
                <li><a href="#">Redragon</a></li>
              </ul>
            </li>
            <li class="has-submenu componentes">
              <a href="#" class="link-light link-offset-2 link-underline-opacity-0    link-underline-opacity-100-hover">Componentes de PCs</a>
              <ul class="ul-2">
                <li><a href="#">Placas Madres</a></li>
                <li><a href="#">Rams</a></li>
                <li><a href="#">Microprocesadores</a></li>
              </ul>
            </li>
          </ul>
  </nav>