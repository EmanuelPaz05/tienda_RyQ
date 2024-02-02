<?php
require("../conexion/conexion.php");

$consulta = "SELECT * FROM productos LIMIT 10";
$resultado = $mysqli->query($consulta);
?>

<section class="sliders ultimos-ingresos">
    <div class="header-section">
        <p class="m-0 ms-2 title">Últimos Ingresos</p>
        <p class="arrows">
            <span id="ultimos-ingresos-left">&#139;</span>
            <span id="ultimos-ingresos-right">&#155;</span>
        </p>
    </div>

    <div class="slider" id="ultimos-ingresos-slider">
        <?php
        while ($producto = $resultado->fetch_assoc()) {
            // Concatenar el valor de pro_barra en la URL
            $enlaceDetalle = 'http://localhost/tienda_RyQ/detalle_producto.php?id=' . $producto['pro_barra'];

            echo '<div class="producto producto1" onclick="redirectToDetalle(';
            echo "'{$enlaceDetalle}'";
            echo ')">';
            echo '<picture>';
            echo '<img src="' . $producto['imagen_1'] .'">';
            echo '</picture>';
            echo '<div class="detalles">';
            echo '<p>#' . $producto['pro_id'] . '</p>';
            echo '<p class="stock">En Stock</p>';
            echo '</div>';
            echo '<h5 class="precio">$' . $producto['pro_precio_publico'] . '</h5>';
            echo '<h4 class="modelo">' . $producto['pro_rubro'] . ' ' . $producto['pro_marca'] . ' ' . $producto['pro_modelo'] . ' ' . $producto['pro_color'] . '</h4>';
            echo '<button class="agregar btn btn-outline-danger">Agregar<i class="bi bi-cart"></i></button>';
            echo '</div>';
        }
        ?>
    </div>
</section>




<section class="tipos-pcs">
        <div class="pc-home-office">
            <a href=""><img src="./recursos/pc home office.jpg" alt="pc home office"></a>
        </div>
        <div class="pc-alto-rendimiento">
            <a href=""><img src="./recursos/pc alto rendimiento.jpg" alt="pc alto rendimiento"></a>
        </div>
        <div class="pc-gaming">
            <a href=""><img src="./recursos/pc gaming.jpg" alt="pc gaming"></a>
        </div>
</section>



<section class="sliders lo-mas-comprado">
    <div class="header-section">
        <p class="m-0 ms-2 title">Lo más comprado</p>
        <p class="arrows">
            <span id="lo-mas-comprado-left">&#139</span>
            <span id="lo-mas-comprado-right">&#155</span>
        </p>
    </div>

    <div class="slider" id="lo-mas-comprado-slider">
        <div class="producto producto2">
            <picture>
                <img src="./recursos/g203-negro.jpeg" alt="">
            </picture>
            <div class="detalles">
                <p>#1</p>
                <p class="stock">En Stock</p>
            </div>
            <h5 class="precio">$33.000</h5>
            <h4 class="modelo">Mouse g203 negro</h4>
            <button class="agregar btn btn-outline-danger">Agregar<i class="bi bi-cart"></i></button>
        </div>
        <div class="producto producto2">
            <picture>
                <img src="./recursos/g203-negro.jpeg" alt="">
            </picture>
            <div class="detalles">
                <p>#2</p>
                <p class="stock">En Stock</p>
            </div>
            <h5 class="precio">$33.000</h5>
            <h4 class="modelo">Mouse g203 negro</h4>
            <button class="agregar btn btn-outline-danger">Agregar<i class="bi bi-cart"></i></button>
        </div>
        <div class="producto producto2">
            <picture>
                <img src="./recursos/g203-negro.jpeg" alt="">
            </picture>
            <div class="detalles">
                <p>#3</p>
                <p class="stock">En Stock</p>
            </div>
            <h5 class="precio">$33.000</h5>
            <h4 class="modelo">Mouse g203 negro</h4>
            <button class="agregar btn btn-outline-danger">Agregar<i class="bi bi-cart"></i></button>
        </div>
        <div class="producto producto2">
            <picture>
                <img src="./recursos/g203-negro.jpeg" alt="">
            </picture>
            <div class="detalles">
                <p>#4</p>
                <p class="stock">En Stock</p>
            </div>
            <h5 class="precio">$33.000</h5>
            <h4 class="modelo">Mouse g203 negro</h4>
            <button class="agregar btn btn-outline-danger">Agregar<i class="bi bi-cart"></i></button>
        </div>
        <div class="producto producto2">
            <picture>
                <img src="./recursos/g203-negro.jpeg" alt="">
            </picture>
            <div class="detalles">
                <p>#5</p>
                <p class="stock">En Stock</p>
            </div>
            <h5 class="precio">$33.000</h5>
            <h4 class="modelo">Mouse g203 negro</h4>
            <button class="agregar btn btn-outline-danger">Agregar<i class="bi bi-cart"></i></button>
        </div>
        <div class="producto producto2">
            <picture>
                <img src="./recursos/g203-negro.jpeg" alt="">
            </picture>
            <div class="detalles">
                <p>#6</p>
                <p class="stock">En Stock</p>
            </div>
            <h5 class="precio">$33.000</h5>
            <h4 class="modelo">Mouse g203 negro</h4>
            <button class="agregar btn btn-outline-danger">Agregar<i class="bi bi-cart"></i></button>
        </div>
        <div class="producto producto2">
            <picture>
                <img src="./recursos/g203-negro.jpeg" alt="">
            </picture>
            <div class="detalles">
                <p>#7</p>
                <p class="stock">En Stock</p>
            </div>
            <h5 class="precio">$33.000</h5>
            <h4 class="modelo">Mouse g203 negro</h4>
            <button class="agregar btn btn-outline-danger">Agregar<i class="bi bi-cart"></i></button>
        </div>
        <div class="producto producto2">
            <picture>
                <img src="./recursos/g203-negro.jpeg" alt="">
            </picture>
            <div class="detalles">
                <p>#8</p>
                <p class="stock">En Stock</p>
            </div>
            <h5 class="precio">$33.000</h5>
            <h4 class="modelo">Mouse g203 negro</h4>
            <button class="agregar btn btn-outline-danger">Agregar<i class="bi bi-cart"></i></button>
        </div>
        <div class="producto producto2">
            <picture>
                <img src="./recursos/g203-negro.jpeg" alt="">
            </picture>
            <div class="detalles">
                <p>#9</p>
                <p class="stock">En Stock</p>
            </div>
            <h5 class="precio">$33.000</h5>
            <h4 class="modelo">Mouse g203 negro</h4>
            <button class="agregar btn btn-outline-danger">Agregar<i class="bi bi-cart"></i></button>
        </div>
        <div class="producto producto2">
            <picture>
                <img src="./recursos/g203-negro.jpeg" alt="">
            </picture>
            <div class="detalles">
                <p>#10</p>
                <p class="stock">En Stock</p>
            </div>
            <h5 class="precio">$33.000</h5>
            <h4 class="modelo">Mouse g203 negro</h4>
            <button class="agregar btn btn-outline-danger">Agregar<i class="bi bi-cart"></i></button>
        </div>
    </div>
</section>



<div class="contacto text-light">
        <div class="telefonia c-1 text-center">
            <h4>ATENCIÓN EN REDES</h4>
            <div class="iconos d-flex gap-4">
                <a href="ig">
                    <div class="ig">
                        <i class="bi bi-instagram fs-3 link-info"></i>
                    </div>
                </a>
                <a href="wsp">
                    <div class="wsp">
                        <i class="bi bi-whatsapp fs-3 link-info"></i>
                    </div>
                </a>
                <a href="face">
                    <div class="face">
                        <i class="bi bi-facebook fs-3 link-info"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="publico c-1 text-center">
            <h4 class="text-light">ATENCIÓN AL PUBLICO</h4c>
            <a class="email_field link-info link-underline-opacity-0" href="mailto:emanuelpazq2005@gmail.com"><h5>emanuelpazq2005@gmail.com</h5>
            </a>
            <a href="https://wa.me/5493572435989" class="link-info link-underline-opacity-0">
                <i class="bi bi-whatsapp link-info"></i> +54 9 3572 43-5989
            </a>
        </div>
        <div class="horarios c-1 text-center">
            <h4>HORARIOS DE ATENCIÓN</h4>
            <a class="link-info link-underline-opacity-0"><i class="bi bi-calendar"></i> de Lunes a Sábados de 9:00 a 13:00 y de 17:00 a 21:00</a>
        </div>
</div>


<div class="marcas-main">
    
        <div class="slider w-100">
            <div class="slide-track">
                <div class="slide mx-2">
                    <img src="https://cdn.worldvectorlogo.com/logos/redragon.svg" height="100" width="250" alt="" />
                </div>
                <div class="slide mx-2">
                    <img src="https://http2.mlstatic.com/D_NQ_NP_915483-MLU72604138202_112023-O.webp" height="100" width="250" alt="" />
                </div>
                <div class="slide mx-2">
                    <img src="https://seeklogo.com/images/H/hyperx-logo-3F033C043D-seeklogo.com.png" height="100" width="250" alt="" />
                </div>
                <div class="slide mx-2">
                    <img src="https://allvectorlogo.com/wp-content/uploads/2016/03/hp-logo.png" height="100" width="250" alt="" />
                </div>
                <div class="slide mx-2">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/c/ca/Sony_logo.svg " height="100" width="250" alt="" />
                </div>
                <div class="slide mx-2">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/Dell_Logo.png/799px-Dell_Logo.png" height="100" width="250" alt="" />
                </div>
                <div class="slide mx-2">
                    <img src="https://romy.sfo3.digitaloceanspaces.com/2019/11/Xiaomi-Logo.png" height="100" width="250" alt="" />
                </div>
                <div class="slide mx-2">
                    <img src="https://cdn.worldvectorlogo.com/logos/redragon.svg" height="100" width="250" alt="" />
                </div>
                <div class="slide mx-2">
                    <img src="https://http2.mlstatic.com/D_NQ_NP_915483-MLU72604138202_112023-O.webp" height="100" width="250" alt="" />
                </div>
                <div class="slide mx-2">
                    <img src="https://seeklogo.com/images/H/hyperx-logo-3F033C043D-seeklogo.com.png" height="100" width="250" alt="" />
                </div>
                <div class="slide mx-2">
                    <img src="https://allvectorlogo.com/wp-content/uploads/2016/03/hp-logo.png" height="100" width="250" alt="" />
                </div>
                <div class="slide mx-2">
                    <img src="https://romy.sfo3.digitaloceanspaces.com/2019/11/Xiaomi-Logo.png" height="100" width="250" alt="" />
                </div>
                <div class="slide mx-2">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/6.png" height="100" width="250" alt="" />
                </div>
                <div class="slide mx-2">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/Dell_Logo.png/799px-Dell_Logo.png" height="100" width="250" alt="" />
                </div>
            </div>
        </div>
    
</div>




<!--copia de lo ultimoingrisoadod
<section class="sliders ultimos-ingresos">
    <div class="header-section">
        <p class="m-0 ms-2 title">Últimos Ingresos</p>
        <p class="arrows">
            <span id="ultimos-ingresos-left">&#139</span>
            <span id="ultimos-ingresos-right">&#155</span>
        </p>
    </div>

    <div class="slider" id="ultimos-ingresos-slider">
        <div class="producto producto1">
            <picture>
                <img src="./recursos/g203-negro.jpeg" alt="">
            </picture>
            <div class="detalles">
                <p>#1</p>
                <p class="stock">En Stock</p>
            </div>
            <h5 class="precio">$33.000</h5>
            <h4 class="modelo">Mouse g203 negro</h4>
            <button class="agregar btn btn-outline-danger">Agregar<i class="bi bi-cart"></i></button>
        </div>
        <div class="producto producto1">
            <picture>
                <img src="./recursos/g203-negro.jpeg" alt="">
            </picture>
            <div class="detalles">
                <p>#2</p>
                <p class="stock">En Stock</p>
            </div>
            <h5 class="precio">$33.000</h5>
            <h4 class="modelo">Mouse g203 negro</h4>
            <button class="agregar btn btn-outline-danger">Agregar<i class="bi bi-cart"></i></button>
        </div>
        <div class="producto producto1">
            <picture>
                <img src="./recursos/g203-negro.jpeg" alt="">
            </picture>
            <div class="detalles">
                <p>#3</p>
                <p class="stock">En Stock</p>
            </div>
            <h5 class="precio">$33.000</h5>
            <h4 class="modelo">Mouse g203 negro</h4>
            <button class="agregar btn btn-outline-danger">Agregar<i class="bi bi-cart"></i></button>
        </div>
        <div class="producto producto1">
            <picture>
                <img src="./recursos/g203-negro.jpeg" alt="">
            </picture>
            <div class="detalles">
                <p>#4</p>
                <p class="stock">En Stock</p>
            </div>
            <h5 class="precio">$33.000</h5>
            <h4 class="modelo">Mouse g203 negro</h4>
            <button class="agregar btn btn-outline-danger">Agregar<i class="bi bi-cart"></i></button>
        </div>
        <div class="producto producto1">
            <picture>
                <img src="./recursos/g203-negro.jpeg" alt="">
            </picture>
            <div class="detalles">
                <p>#5</p>
                <p class="stock">En Stock</p>
            </div>
            <h5 class="precio">$33.000</h5>
            <h4 class="modelo">Mouse g203 negro</h4>
            <button class="agregar btn btn-outline-danger">Agregar<i class="bi bi-cart"></i></button>
        </div>
        <div class="producto producto1">
            <picture>
                <img src="./recursos/g203-negro.jpeg" alt="">
            </picture>
            <div class="detalles">
                <p>#6</p>
                <p class="stock">En Stock</p>
            </div>
            <h5 class="precio">$33.000</h5>
            <h4 class="modelo">Mouse g203 negro</h4>
            <button class="agregar btn btn-outline-danger">Agregar<i class="bi bi-cart"></i></button>
        </div>
        <div class="producto producto1">
            <picture>
                <img src="./recursos/g203-negro.jpeg" alt="">
            </picture>
            <div class="detalles">
                <p>#7</p>
                <p class="stock">En Stock</p>
            </div>
            <h5 class="precio">$33.000</h5>
            <h4 class="modelo">Mouse g203 negro</h4>
            <button class="agregar btn btn-outline-danger">Agregar<i class="bi bi-cart"></i></button>
        </div>
        <div class="producto producto1">
            <picture>
                <img src="./recursos/g203-negro.jpeg" alt="">
            </picture>
            <div class="detalles">
                <p>#8</p>
                <p class="stock">En Stock</p>
            </div>
            <h5 class="precio">$33.000</h5>
            <h4 class="modelo">Mouse g203 negro</h4>
            <button class="agregar btn btn-outline-danger">Agregar<i class="bi bi-cart"></i></button>
        </div>
        <div class="producto producto1">
            <picture>
                <img src="./recursos/g203-negro.jpeg" alt="">
            </picture>
            <div class="detalles">
                <p>#9</p>
                <p class="stock">En Stock</p>
            </div>
            <h5 class="precio">$33.000</h5>
            <h4 class="modelo">Mouse g203 negro</h4>
            <button class="agregar btn btn-outline-danger">Agregar<i class="bi bi-cart"></i></button>
        </div>
        <div class="producto producto1">
            <picture>
                <img src="./recursos/g203-negro.jpeg" alt="">
            </picture>
            <div class="detalles">
                <p>#10</p>
                <p class="stock">En Stock</p>
            </div>
            <h5 class="precio">$33.000</h5>
            <h4 class="modelo">Mouse g203 negro</h4>
            <button class="agregar btn btn-outline-danger">Agregar<i class="bi bi-cart"></i></button>
        </div>
    </div>
</section>
-->