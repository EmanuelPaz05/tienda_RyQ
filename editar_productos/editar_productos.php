<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Productos</title>
    <link rel="stylesheet" href="../css/editar_productos/editar-productos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="../js/funciones.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.css">
	<script type="text/javascript" src="../librerias/alertifyjs/alertify.js"></script>

    <!--data table-->
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<body style="background-color: rgb(124, 126, 146);">


<?php

    require("../conexion/conexion.php");
    
    $consulta = "SELECT * FROM productos where 1";
    $resultado = mysqli_query($mysqli, $consulta);


?>


<!-- <div class="buscador w-50 py-4 justify-content-center d-flex row">
    <form class="d-flex mb-3" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar productos" aria-label="Search">
        <button class="btn-buscar fs-6" type="submit">Buscar</button>
    </form>
    <div class="input-dolar w-50">
        <label for="precio-dolar" class="form-label">Precio Dólar en pesos propio:</label>
        <p id="precio-dolar">Aca actualizaría el precio</p>
    </div>
</div> -->




<div class="container-fluid">

    <div id="llamar_nuevo_producto"></div>

    <div id="llamar_tabla_productos"></div>

</div>


<script src="../librerias/jquery/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="../librerias/bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>

</body>
</html>


<script>
    $(document).ready(function(){
        new DataTable('#tbl_productos');
    });
</script>