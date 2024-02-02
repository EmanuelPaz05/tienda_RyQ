<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de productos</title>
    <link rel="stylesheet" href="../css/editar_productos/editar-productos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="../js/funciones.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.css">
	<script type="text/javascript" src="../librerias/alertifyjs/alertify.js"></script>

</head>
<body style="background-color: #3f6b86">


    <!--Header-->
    <div id="llamar_header_productos" class="mb-5"></div>

    <!--Nuevo Producto-->
    <div class="d-flex mb-2 mt-5">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                        <form action="" id="form_productos">
                            <input type="text" class="mb-2" value="0" id="id" name="id">
                            <p class="text-dark">Marca:<input type="text" class="ms-3" name="marca" id="marca"></p>

                            <p class="text-dark">Rubro:<input type="text" class="ms-3" name="rubro" id="rubro"></p>
                            
                            <p class="text-dark">Modelo:<input type="text" class="ms-3" name="modelo" id="modelo"></p>

                            <p class="text-dark">Color:<input type="text" class="ms-3" name="color" id="color"></p>
                            
                            <p class="text-dark">Descripción:<input type="text" class="ms-3" name="desc" id="desc"></p>

                            <p class="text-dark">Precio Publico:<input type="number" class="ms-3" name="precio_publico" id="precio_publico"></p>
                            
                            <p class="text-dark">Precio costo:<input type="number" class="ms-3" name="precio_costo" id="precio_costo"></p>
                            
                            <p class="text-dark">Precio mayorista:<input type="number" class="ms-3" name="precio_mayorista" id="precio_mayorista"></p>
                            
                            <p class="text-dark">Imagen 1:<input type="text" class="ms-3" name="imagen_1" id="imagen_1"></p>

                            <p class="text-dark">Imagen 2:<input type="text" class="ms-3" name="imagen_2" id="imagen_2"></p>

                            <p class="text-dark">Imagen 3:<input type="text" class="ms-3" name="imagen_3" id="imagen_3"></p>
                            
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

    <!--Tabla productos-->
    <div class="container-fluid">

        <div id="llamar_tabla_productos"></div>

    </div>

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="../librerias/bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>

</body>
</html>

<script>
    $(document).ready(function(){
        alertify.success("Se actualizo correctamente los productos correctamente");
        new DataTable('#tbl_productos');
        $('#llamar_header_productos').load('header_productos.html');
        $('#llamar_tabla_productos').load('tabla_productos.php');
        
        $('#btn_guardar').click(function(){

            // // Convertir el array en un objeto
            // $.each(formData, function(i, field){
            //     formObject[field.name] = field.value;
            // });

            // console.log(formObject);

            var cadena = $('#form_productos').serialize();
            guardar_productos(cadena);
        })
    });
</script>