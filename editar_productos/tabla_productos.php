<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Productos</title>

    <script src="../js/funciones.js" type="text/javascript"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<table class="table table-dark table-hover" id="tbl_productos" style="table-layout: fixed;">
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
                <th scope="col" style="word-wrap: break-word; width: 30px; height= 20px;">Img 1</th>
                <th scope="col" style="word-wrap: break-word; width: 30px; height= 20px;">Img 2</th>
                <th scope="col" style="word-wrap: break-word; width: 30px; height= 20px;">Img 3</th>
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
                <td><?php echo $filas['pro_id'] ?></td>
                <td><?php echo $filas['pro_barra'] ?></td>
                <td><?php echo $filas['pro_marca'] ?></td>
                <td><?php echo $filas['pro_rubro'] ?></td>
                <td><?php echo $filas['pro_modelo'] ?></td>
                <td><?php echo $filas['pro_desc'] ?></td>
                <td><?php echo $filas['pro_color'] ?></td>
                <td><?php echo $filas['pro_precio_publico'] ?></td>
                <td><?php echo $filas['pro_precio_costo'] ?></td>
                <td><?php echo $filas['pro_precio_mayorista'] ?></td>
                <td style="word-wrap: break-word; width: 30px; height= 20px;"><?php echo $filas['imagen_1'] ?></td>
                <td style="word-wrap: break-word; width: 30px; height= 20px;"><?php echo $filas['imagen_2'] ?></td>
                <td style="word-wrap: break-word; width: 30px; height= 20px;"><?php echo $filas['imagen_3'] ?></td>
                <td>
                    <div class="d-flex gap-2">
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal-producto">Editar</button>
                            <button type="button" onclick="eliminar_producto('<?php echo $id ?>')" class="btn btn-danger">Eliminar</button>
                            
                        </div>
                        </div>
                    </div>
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