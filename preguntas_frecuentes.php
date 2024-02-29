<?php

if (isset($_SESSION["usuario"])) {
    // Usuario autenticado
    
}
?>

<!DOCTYPE html> 
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R&Q COMPUTACIÓN</title>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="js/funciones-partes.js"></script>
    <script src="js/carrito.js"></script>

    <!--estilos partes-->
    <link rel="shortcut icon" href="logos/logo.png">
    <link rel="stylesheet" href="css/header/header.css">
    <link rel="stylesheet" href="css/main/main.css">
    <link rel="stylesheet" href="css/footer/footer.css">

    <!--bootstrap-->
    <link rel="stylesheet" href="librerias/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="librerias/bootstrap-icons-1.11.2/font/bootstrap-icons.min.css">

</head>
<body>


    <?php include "partes/header.php"; ?>


    <div class="container py-5">
        <h1 class="mb-4">Preguntas Frecuentes</h1>

        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    NUESTRA EMPRESA
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                    <strong>Ofrecemos una amplia gama </strong>de dispositivos electrónicos, desde teléfonos inteligentes y computadoras portátiles hasta tabletas y accesorios. También brindamos soluciones inteligentes para el hogar, incluyendo dispositivos conectados y sistemas de automatización para una vida más cómoda y eficiente.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                    ¿COMO COMPRAR?
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                    <div class="accordion-body">
                    <strong>¿Como armar un pedido? </strong>Para armar un pedido en nuestra tienda, sigue estos sencillos pasos:
                        <ol>
                            <li>Explora nuestro catálogo: Navega por nuestra amplia selección de productos y elige los que desees ordenar.</li>
                            <li>Agrega productos al carrito: Haz clic en "Agregar al carrito" junto a cada producto que deseas comprar. Esto añadirá los productos seleccionados a tu carrito de compras.</li>
                            <li>Revisa tu carrito: Una vez que hayas seleccionado todos los productos que deseas comprar, haz clic en el ícono del carrito en la parte superior de la página. Revisa cuidadosamente los productos en tu carrito y asegúrate de que la cantidad y los detalles sean correctos.</li>
                            <li>Envía tu pedido: Cuando estés listo para finalizar tu compra, haz clic en el botón "Enviar pedido". Nos pondremos en contacto contigo a través del correo electrónico que proporcionaste al registrarte para confirmar tu pedido y coordinar la entrega.¡Gracias por elegirnos para tus compras en línea!</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                    Accordion Item #3
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                    <div class="accordion-body">
                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
        </div>
    </div>
    


    <div id="footerContainer"></div>


    <!--Bootstrap-->
    <script src="librerias/bootstrap-5.3.2-dist/js/bootstrap.min.js">
    </script>
</body>
</html>
