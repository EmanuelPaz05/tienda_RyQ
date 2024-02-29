<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tabla Productos</title>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="../js/funciones.js" type="text/javascript"></script>

    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
    <script>
        $(document).ready(function(){
            new DataTable('#tbl_productos');
        });
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<style>
    :root {
        --primary-color: #02021b;
        --secondary-color: #0dcaf0;
    }

    #tbl_productos.dataTable th, #tbl_productos.dataTable td {
        border: 1px solid var(--secondary-color);
        text-align: center;
        max-width: 50px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        background-color: var(--primary-color);
        color: white;
    }

    #tbl_productos.dataTable tbody tr:hover {
        background-color: var(--secondary-color);
    }
</style>

<?php

    require("../conexion/conexion.php");
    
    $consulta = "SELECT * FROM productos2 where 1";
    $resultado = mysqli_query($mysqli, $consulta);

?>


<table class="table table-dark table-bordered border-info table-hover" id="tbl_productos">
    <thead class="text-center table-primary">
        <tr>
            <th scope="col" class="ids">ID</th>
            <th scope="col">C.barra</th>
            <th scope="col">Marca</th>
            <th scope="col">Rubro</th>
            <th scope="col">Modelo</th>
            <th scope="col">Descripción</th>
            <th scope="col">Color</th>
            <th scope="col">Cantidad</th>
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
            if($resultado = $mysqli->query($consulta)){
                while ($extraido = mysqli_fetch_array($resultado)){
                $datos=$extraido['pro_id']."||".$extraido['pro_marca']."||".$extraido['pro_rubro']."||".$extraido['pro_modelo']."||".$extraido['pro_desc']."||".$extraido['pro_color']."||".$extraido['pro_cantidad']."||".$extraido['pro_precio_publico']."||".$extraido['pro_precio_compra']."||".$extraido['pro_precio_mayorista']."||".$extraido['imagen_1']."||".$extraido['imagen_2']."||".$extraido['imagen_3'];
				$id=$extraido['pro_id'];
        ?>
        <tr>
            <td class="ids" style="max-width: 5px;"><?php echo $extraido['pro_id'] ?></td>
            <td><?php echo $extraido['pro_barra'] ?></td>
            <td><?php echo $extraido['pro_marca'] ?></td>
            <td><?php echo $extraido['pro_rubro'] ?></td>
            <td><?php echo $extraido['pro_modelo'] ?></td>
            <td><?php echo $extraido['pro_desc'] ?></td>
            <td><?php echo $extraido['pro_color'] ?></td>
            <td><?php echo $extraido['pro_cantidad'] ?></td>
            <td><?php echo $extraido['pro_precio_publico'] ?></td>
            <td><?php echo $extraido['pro_precio_compra'] ?></td>
            <td><?php echo $extraido['pro_precio_mayorista'] ?></td>
            <td><?php echo $extraido['imagen_1'] ?></td>
            <td><?php echo $extraido['imagen_2'] ?></td>
            <td><?php echo $extraido['imagen_3'] ?></td>
            <td style="white-space: wrap;">
                <div class="d-block align-items-center justify-content-center">
                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="editar_productos('<?php echo $datos ?>')"><i class="bi bi-pencil-square"></i></button>

                    <button type="button" onclick="eliminar_producto('<?php echo $id ?>')" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                </div>
            </td>
        </tr>
        <?php
            }};
        ?>
    </tbody>
</table>


<script src="../librerias/bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>

</body>
</html>