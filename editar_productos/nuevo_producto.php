<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Producto</title>
    <script src="../js/funciones.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="d-flex mb-2">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Nuevo Producto
    </button>
    <!-- Modal -->
    <div class="modal fade nuevo_producto" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Producto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <input type="text" class="mb-2" value="0">
                            <p class="text-dark">Marca:<input type="text" class="ms-3" name="marca" id="marca"></p>

                            <p class="text-dark">Rubro:<input type="text" class="ms-3" name="rubro" id="rubro"></p>
                            
                            <p class="text-dark">Modelo:<input type="text" class="ms-3" name="modelo" id="modelo"></p>

                            <p class="text-dark">Color:<input type="text" class="ms-3" name="color" id="color"></p>
                            
                            <p class="text-dark">Descripción:<input type="text" class="ms-3" name="descripcion" id="descripcion"></p>

                            <p class="text-dark">Precio Publico:<input type="text" class="ms-3" name="precio-publico" id="precio-publico"></p>
                            
                            <p class="text-dark">Precio costo:<input type="text" class="ms-3" name="precio-costo" id="precio-costo"></p>
                            
                            <p class="text-dark">Precio mayorista:<input type="text" class="ms-3" name="precio-mayorista" id="precio-mayorista"></p>
                            
                            <p class="text-dark">Imagen 1:<input type="text" class="ms-3" name="imagen-1" id="imagen-1"></p>

                            <p class="text-dark">Imagen 2:<input type="text" class="ms-3" name="imagen-2" id="imagen-2"></p>

                            <p class="text-dark">Imagen 3:<input type="text" class="ms-3" name="imagen-3" id="imagen-3"></p>
                            
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="btn_guardar">Guardar</button>
                    </div>
                </div>
            </div>
    </div>
</div>

<script src="../librerias/bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>

</body>
</html>