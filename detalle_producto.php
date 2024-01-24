<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Producto</title>
    <script type='text/javascript' src="librerias/jquery/jquery-3.7.1.min.js"></script>
    
    <script src="./partes/funciones-partes.js"></script>

    <!--estilos partes-->
    <link rel="shortcut icon" href="./logos/logo-png.webp">
    <link rel="stylesheet" href="./css/header/header.css">
    <link rel="stylesheet" href="./css/footer/footer.css">
    <link rel="stylesheet" href="./css/detalle_producto/detalle_pro.css">
    <script src="js/detalle_producto.js"></script>

    <!--bootstrap-->
    <link rel="stylesheet" href="./librerias/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./librerias/bootstrap-icons-1.11.2/font/bootstrap-icons.min.css">
</head>
<body>

aaa

    <?php
    $id=$_GET['id'];

    require("conexion/conexion.php");
    
    $consulta = "SELECT * FROM productos WHERE pro_barra = '$id'";
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


<header id="menu">

</header>



<div id="product-details">
    <div id="images-section">
        <?php echo '<img src="' . $direccion_1 . '" class="img-fluid" id="selected-image" alt="Imagen Seleccionada">' ?>
        <div id="product-images row">
            <?php
                echo '
                    <img class="product-image" src="' . $direccion_1 . '" alt="Imagen 1" onclick="changeImage(\'' . $direccion_1 . '\')">
                    <img class="product-image" src="' . $direccion_2 . '" alt="Imagen 2" onclick="changeImage(\'' . $direccion_2 . '\')">
                    <img class="product-image" src="' . $direccion_3 . '" alt="Imagen 3" onclick="changeImage(\'' . $direccion_3 . '\')">
                ';
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

        <div id="action-buttons">
            <button id="add-to-cart" class="action-button" onclick="addToCart()">Agregar al Carrito</button>
            <button id="buy-now" class="action-button btn-primary" onclick="buyNow()">Comprar Ahora</button>
        </div>
    </div>
</div>



<div class="row d-flex justify-content-center align-items-center p-3">
    <div class="card" style="width: 18rem;">
        <?php echo' <img src="'.$direccion_1.'" class="card-img-top" alt="...">'?>
    <div class="card-body">
        <h5 class="card-title">
            <?php
                echo($marca);
            ?>
        </h5>
        <p class="card-text">Descripcion:<?php echo $desc ?></p>
        <p class="card-text">Precio: <?php echo $precio_pub ?></p>
        <a href="#" class="btn btn-primary">Comprar</a>
        <a href="#" class="btn btn-secondary">Agregar</a>
    </div>
    </div>
</div>





<script src="./librerias/bootstrap-5.3.2-dist/js/bootstrap.min.js">
</script>
</body>
<script>
    $('#menu').load('partes/header.html');
</script>
</html>