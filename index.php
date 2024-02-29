<?php

if (isset($_SESSION["usuario"])) {
    // Usuario autenticado
}
?>

<!DOCTYPE html> 
<html lang="en">
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

    <div id="bannerContainer"></div>

    <div id="mainContainer"></div>

    <div id="footerContainer"></div>


    <!--Bootstrap-->
    <script src="librerias/bootstrap-5.3.2-dist/js/bootstrap.min.js">
    </script>

    <script>
        $(document).ready(function() {
            $('#headerContainer').load('partes/header.php');
            $('#footerContainer').load('partes/footer.html');
            $('#bannerContainer').load('partes/banner.html');
            $('#mainContainer').load('partes/main.php');
        });
    </script>
</body>
</html>
