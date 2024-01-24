<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Productos</title>

    <script src="../js/funciones.js" type="text/javascript"></script>

    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
    <script>
        $(document).ready(function(){
            new DataTable('#tbl_productos');
        });
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<style>
    .table th {
        text-align: center;
        max-width: 20px;
        max-height: 40px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: wrap;
    }

    .table td{
        text-align: center;
        max-width: 20px;
        max-height: 40px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

</style>

<?php

    require("../conexion/conexion.php");
    
    $consulta = "SELECT * FROM productos where 1";
    $resultado = mysqli_query($mysqli, $consulta);

?>

<table class="table table-dark table-hover table-bordered" id="tbl_productos" style="table-layout: fixed;">
    <thead class="text-center">
        <tr>
            <th scope="col" class="ids">ID</th>
            <th scope="col">C.barra</th>
            <th scope="col">Marca</th>
            <th scope="col">Rubro</th>
            <th scope="col">Modelo</th>
            <th scope="col">Descripción</th>
            <th scope="col">Color</th>
            <th scope="col">Precio Publico</th>
            <th scope="col">Precio Compra/costo</th>
            <th scope="col">Precio mayorista</th>
            <th scope="col">Img 1</th>
            <th scope="col">Img 2</th>
            <th scope="col">Img 3</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>

    <tbody>
        <?php
            while($filas = mysqli_fetch_assoc($resultado)){
                $datos = $filas;
                $id = $filas['pro_id'];
        ?>
        <tr>
            <td class="ids"><?php echo $filas['pro_id'] ?></td>
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
            <td style="white-space: wrap;">
                <div class="d-block align-items-center">
                    <button type="button" class="btn btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#modal-editar-producto-<?php echo $id ?>">Editar</button>

                    <div class="d-flex mb-2">
                        <div class="modal fade editar_producto" id="modal-editar-producto-<?php echo $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Producto</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form action="../consultas/editar_productos.php" method="POST">
                                    <input type="hidden" name="producto_id" value="<?php echo $id ?>">
                                    <!-- Resto de los campos con valores actuales -->
                                    <p class="text-dark">Marca: <input type="text" class="ms-3" name="marca" id="marca" value="<?php echo                       $filas['pro_marca'] ?>"></p>
                                    <p class="text-dark">Rubro: <input type="text" class="ms-3" name="rubro" id="rubro" value="<?php echo                       $filas['pro_rubro'] ?>"></p>
                                    <!-- ... otros campos ... -->
                                </form>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary" name="actualizar_producto">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" onclick="eliminar_producto('<?php echo $id ?>')" class="btn btn-danger">Eliminar</button>
                </div>
            </td>
        </tr>
        <?php
            };
        ?>
    </tbody>
</table>


<script src="../librerias/jquery/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="../librerias/bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>

</body>
</html>