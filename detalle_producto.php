<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Producto</title>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="js/carrito.js"></script>


    <!--estilos partes-->
    <link rel="shortcut icon" href="logos/logo.png">
    <link rel="stylesheet" href="css/header/header.css">
    <link rel="stylesheet" href="css/footer/footer.css">
    <link rel="stylesheet" href="css/detalle_producto/detalle_pro.css">
    <script src="js/detalle_producto.js"></script>

    <!--bootstrap-->
    <link rel="stylesheet" href="librerias/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="librerias/bootstrap-icons-1.11.2/font/bootstrap-icons.min.css">
</head>
<body>

    <?php
    $id=$_GET['id'];

    require("conexion/conexion.php");
    
    $consulta = "SELECT * FROM productos2 WHERE pro_barra = '$id'";
    if($resultado = $mysqli->query($consulta)){
        $extraido = $resultado->fetch_array();
        $rubro = $extraido['pro_rubro'];
        $marca = $extraido['pro_marca'];
        $modelo = $extraido['pro_modelo'];
        $color = $extraido['pro_color'];
        $nombre_pro = $rubro . " " . $marca . " " . $modelo . " " . $color;
        $precio_pub = $extraido['pro_precio_publico'];
        $desc = $extraido['pro_desc'];
        $direccion_1 = $extraido['imagen_1'];
        $direccion_2 = $extraido['imagen_2'];
        $direccion_3 = $extraido['imagen_3'];
        
    }
    ?>


<div id="headerContainer"></div>


<div id="product-details">
    <div id="images-section">
            <?php
                // Asegúrate de que la ruta de la imagen principal se establezca incluso si está vacía o no es un enlace de imagen válido
                $imagen_principal = (!empty($direccion_1) && filter_var($direccion_1, FILTER_VALIDATE_URL)) ? $direccion_1 : 'recursos/img_no_disponible.png';
                echo '<img src="' . $imagen_principal . '" class="img-fluid" id="selected-image" alt="Imagen Seleccionada">';
            ?>
        <div id="product-images row">
            <?php
                if (empty($direccion_1) || !filter_var($direccion_1, FILTER_VALIDATE_URL)) {
                    echo '<img class="product-image" src="recursos/img_no_disponible.png" alt="Imagen No Disponible">
                          <img class="product-image" src="recursos/img_no_disponible.png" alt="Imagen No Disponible">
                          <img class="product-image" src="recursos/img_no_disponible.png" alt="Imagen No Disponible">';
                } else {
                    echo '
                        <img class="product-image" src="' . $direccion_1 . '" alt="Imagen 1" onclick="changeImage(\'' . $direccion_1 . '\')">
                        <img class="product-image" src="' . $direccion_2 . '" alt="Imagen 2" onclick="changeImage(\'' . $direccion_2 . '\')">
                        <img class="product-image" src="' . $direccion_3 . '" alt="Imagen 3" onclick="changeImage(\'' . $direccion_3 . '\')">
                    ';
                }
            ?>
        </div>
    </div>

    <div id="details-section">
        <h2>
            <?php
                echo($nombre_pro);
            ?>
        </h2>

        <p id="product-description">
            <?php
                echo($desc);
            ?>
        </p>

        <p class="product-price">Precio: $<?php echo $precio_pub ?></p>
            
            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" id="cantidad" class="cantidad-label" value="1"><br><br>
            <button class="action-button" id="agregar_carrito_btn" class="cantidad-input" type="button" data-producto-id="<?php echo $id_producto ?>">Agregar al Carrito <i class="bi bi-cart-plus"></i></button>
    </div>
</div>


<div id="footerContainer"></div>



<script src="./librerias/bootstrap-5.3.2-dist/js/bootstrap.min.js">
</script>

<script>
    $(document).ready(function(){
        $('#headerContainer').load('partes/header.php');
        $('#footerContainer').load('partes/footer.html');
    });
</script>

<script>
    $(document).ready(function(){
        $('#agregar_carrito_btn').click(function(){
            // Obtener el usuario actualmente logueado (asumo que tienes esta información)
            var usuario = $('#input-usu-id').val();

            // Verificar si el usuario está logueado
            if (usuario > 0) {
                // Obtener el ID del producto y la cantidad seleccionada
                var producto_id = obtenerProductoId();
                var cantidad = $('#cantidad').val();
            
                // Verificar si se ha seleccionado un producto
                if (producto_id) {
                    // Realizar una solicitud AJAX para agregar el producto al carrito
                    $.ajax({
                        type: "POST",
                        url: "consultas/agregar_carrito.php",
                        data: {producto_id: producto_id, cantidad: cantidad, usuario_id: usuario},
                        success: function(response) {
                            // Manejar la respuesta del servidor (por ejemplo, mostrar un mensaje de éxito)
                            alert("Producto agregado al carrito exitosamente");
                        },
                        error: function(xhr, status, error) {
                            // Manejar los errores de la solicitud AJAX (por ejemplo, mostrar un mensaje de error)
                            alert("Error al agregar el producto al carrito");
                        }
                    });
                } else {
                    alert("Por favor, seleccione un producto antes de agregar al carrito");
                }
            } else {
                // Si el usuario no está logueado, mostrar un mensaje de advertencia
                alert("¡Hola! Debes iniciar sesión para agregar productos al carrito.");
            }
        });

        // Función para obtener el ID del producto
        function obtenerProductoId() {
            // Implementa la lógica para obtener el ID del producto seleccionado
            // En este ejemplo, supondré que el ID del producto está almacenado en un atributo de datos del botón
            return $('#agregar_carrito_btn').data('producto-id');
        }
    });
</script>

</body>
</html>