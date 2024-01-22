<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Productos</title>
    <link rel="stylesheet" href="/css/editar-productos/editar-productos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body style="background-color: rgb(124, 126, 146);">


<?php

    require("../conexion/conexion.php");
    
    $consulta = "SELECT * FROM productos";
    $resultado = mysqli_query($mysqli, $consulta);

?>


<div class="buscador w-50 py-4 justify-content-center d-flex row">
    <form class="d-flex mb-3" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar productos" aria-label="Search">
        <button class="btn-buscar fs-6" type="submit">Buscar</button>
    </form>
    <div class="input-dolar w-50">
        <label for="precio-dolar" class="form-label">Precio Dólar en pesos propio:</label>
        <p id="precio-dolar">Aca actualizaría el precio</p>
    </div>
</div>


<div class="container-fluid">
    <div class="nuevo-producto d-flex mb-2">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Nuevo Producto
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Producto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <p class="text-dark">Rubro:</p>
                            <input type="text" name="rubro" id="rubro">
                            <p class="text-dark">modelo:</p>
                            <input type="text" name="modelo" id="modelo">
                            <p class="text-dark">Descripción:</p>
                            <input type="text" name="descripcion" id="descripcion">
                            <p class="text-dark">Precio costo en dolar:</p>
                            <input type="text" name="precio-costo-dolar" id="precio-costo-dolar">
                            <p class="text-dark">Precio mayprista en dolar:</p>
                            <input type="text" name="precio-mayorista-dolar" id="precio-mayorista-dolar">
                            <p class="text-dark">Estado:</p>
                            <input type="text" name="Estado" id="Estado">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-dark table-hover">
        <thead class="text-center">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">C.barra</th>
                <th scope="col">Marca</th>
                <th scope="col">Rubro</th>
                <th scope="col">Modelo</th>
                <th scope="col">Descripción</th>
                <th scope="col">Color</th>
                <th scope="col">Precio Publico</th>
                <th scope="col">Precio Compra/costo</th>
                <th scope="col">Precio mayorista</th>
                <th scope="col">Imagen 1</th>
                <th scope="col">Imagen 2</th>
                <th scope="col">Imagen 3</th>
                <th scope="col">Estado<br>(1 stock - 0 sin)</th>
                <th scope="col">Cambios</th>
                <th scope="col">Eliminar Productos</th>
            </tr>
        </thead>

        <tbody>
            <?php
                while($filas = mysqli_fetch_assoc($resultado)){
            ?>
            <tr>
                <th scope="row"><?php echo $filas['pro_id'] ?></th>
                <td><?php echo $filas['pro_barra'] ?></td>
                <td><?php echo $filas['pro_marca'] ?></td>
                <td><?php echo $filas['pro_rubro'] ?></td>
                <td><?php echo $filas['pro_modelo'] ?></td>
                <td><?php echo $filas['pro_desc'] ?></td>
                <td><?php echo $filas['pro_color'] ?></td>
                <td><?php echo $filas['pro_precio_publico'] ?></td>
                <td><?php echo $filas['pro_precio_costo'] ?></td>
                <td><?php echo $filas['pro_precio_mayorista'] ?></td>
                <td><?php echo $filas['imagen_1'] ?></td>
                <td><?php echo $filas['imagen_2'] ?></td>
                <td><?php echo $filas['imagen_3'] ?></td>
                <td><?php echo $filas['pro_estado'] ?></td>
                <td>
                    <?php echo '
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal-producto">
                    Editar
                    </button>
                    <div class="modal fade" id="modal-producto" tabindex="-1" aria-labelledby="modal-productoLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="modal-productoLabel">Editar producto</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="">
                                    <p class="text-dark">Rubro:</p>
                                    <input type="text" name="rubro" id="rubro">
                                    <p class="text-dark">modelo:</p>
                                    <input type="text" name="modelo" id="modelo">
                                    <p class="text-dark">Descripción:</p>
                                    <input type="text" name="descripcion" id="descripcion">
                                    <p class="text-dark">Precio costo en dolar:</p>
                                    <input type="text" name="precio-costo-dolar" id="precio-costo-dolar">
                                    <p class="text-dark">Precio mayprista en dolar:</p>
                                    <input type="text" name="precio-mayorista-dolar" id="precio-mayorista-dolar">
                                    <p class="text-dark">Estado:</p>
                                    <input type="text" name="Estado" id="Estado">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                    </div>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-producto">
                        Eliminar
                    </button>'
                    ?>
                </td>
            </tr>
            <?php
                };
            ?>
        </tbody>
    </table>
</div>


</body>
<script src="/librerias/bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
</html>