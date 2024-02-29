<?php
$conexion = require('conexion/conexion.php');

// Consulta SQL para obtener las marcas distintas
$sql_marcas = "SELECT DISTINCT pro_marca FROM productos2";
$resultado_marcas = $conexion->query($sql_marcas);

// Consulta SQL para obtener los rubros distintos
$sql_rubros = "SELECT DISTINCT pro_rubro FROM productos2";
$resultado_rubros = $conexion->query($sql_rubros);

// Consulta SQL para obtener los colores distintos
$sql_colores = "SELECT DISTINCT pro_color FROM productos2";
$resultado_colores = $conexion->query($sql_colores);

// Definir las variables de selección por defecto
$rubros_seleccionados = isset($_GET['rubro']) ? $_GET['rubro'] : array();
$marcas_seleccionadas = isset($_GET['marca']) ? $_GET['marca'] : array();
$colores_seleccionados = isset($_GET['color']) ? $_GET['color'] : array();
$precios_seleccionados = isset($_GET['precio']) ? $_GET['precio'] : array();

// Obtener el término de búsqueda, si está presente
$termino_busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';

// Construir la parte de la consulta SQL para los filtros de marca
$marcas_condicion = '';
if (!empty($marcas_seleccionadas)) {
    $marcas_condicion = "pro_marca IN ('" . implode("','", $marcas_seleccionadas) . "') AND ";
}

// Construir la parte de la consulta SQL para los filtros de rubro
$rubros_condicion = '';
if (!empty($rubros_seleccionados)) {
    $rubros_condicion = "pro_rubro IN ('" . implode("','", $rubros_seleccionados) . "') AND ";
}

// Construir la parte de la consulta SQL para los filtros de color
$colores_condicion = '';
if (!empty($colores_seleccionados)) {
    $colores_condicion = "pro_color IN ('" . implode("','", $colores_seleccionados) . "') AND ";
}

// Construir la parte de la consulta SQL para el término de búsqueda
$busqueda_condicion = '';
if (!empty($termino_busqueda)) {
    $busqueda_condicion = "(pro_desc LIKE '%$termino_busqueda%') AND ";
}

// Obtener el número total de productos que coinciden con los filtros y el término de búsqueda
$sql_total = "SELECT COUNT(*) AS total FROM productos2 WHERE $marcas_condicion $rubros_condicion $colores_condicion $busqueda_condicion 1";
$resultado_total = $conexion->query($sql_total);
$fila_total = $resultado_total->fetch_assoc();
$total_productos = $fila_total["total"];

// Definir el número de productos por página y calcular el número total de páginas
$productos_por_pagina = 9;
$total_paginas = ceil($total_productos / $productos_por_pagina);

// Obtener el número de página actual
$pagina_actual = isset($_GET["pagina"]) && is_numeric($_GET["pagina"]) ? $_GET["pagina"] : 1;

// Calcular el desplazamiento para la consulta SQL
$desplazamiento = ($pagina_actual - 1) * $productos_por_pagina;

// Consulta SQL para obtener los productos de la página actual que coinciden con los filtros y el término de búsqueda
$sql = "SELECT * FROM productos2 WHERE $marcas_condicion $rubros_condicion $colores_condicion $busqueda_condicion 1 LIMIT $desplazamiento, $productos_por_pagina";
$resultado = $conexion->query($sql);

// Obtener los resultados de las consultas SQL
$rubros = [];
while ($fila_rubro = $resultado_rubros->fetch_assoc()) {
    $rubros[] = $fila_rubro;
}

$marcas = [];
while ($fila_marca = $resultado_marcas->fetch_assoc()) {
    $marcas[] = $fila_marca;
}

$colores = [];
while ($fila_color = $resultado_colores->fetch_assoc()) {
    $colores[] = $fila_color;
}

// Cerrar la conexión
$conexion->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="js/funciones-partes.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="stylesheet" href="css/header/header.css">
    <link rel="stylesheet" href="css/footer/footer.css">

    <style>
        .filtrar-chico {
            display: none;
        }
        @media (max-width: 767px) {
            .filtrar-chico {
                display: flex;
            }
        }
    </style>

</head>
<body>
    

<div id="headerContainer"></div>

<div class="container-fluid my-3">
    <div class="row">
        <aside class="col-md-3 mb-4">
            <div class="d-none d-md-block">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Filtrar por:</h3>
                        <button type="button" class="btn btn-primary mb-3" id="btn-filtrar-grande">Filtrar</button>
                        <form action="" method="GET" id="form-filtros">
                            <div class="mb-3">
                                <h4>Rubro</h4>
                                <ul class="list-unstyled">
                                    <?php foreach ($rubros as $fila_rubro): ?>
                                        <li>
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" name="rubro[]" value="<?php echo $fila_rubro['pro_rubro']; ?>" <?php echo in_array($fila_rubro['pro_rubro'], $rubros_seleccionados) ? 'checked' : ''; ?>>
                                                <?php echo $fila_rubro['pro_rubro']; ?>
                                            </label>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="mb-3">
                                <h4>Marca</h4>
                                <ul class="list-unstyled">
                                    <?php foreach ($marcas as $fila_marca): ?>
                                        <li>
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" name="marca[]" value="<?php echo $fila_marca['pro_marca']; ?>" <?php echo in_array($fila_marca['pro_marca'], $marcas_seleccionadas) ? 'checked' : ''; ?>>
                                                <?php echo $fila_marca['pro_marca']; ?>
                                            </label>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="mb-3">
                                <h4>Color</h4>
                                <ul class="list-unstyled">
                                    <?php foreach ($colores as $fila_color): ?>
                                        <li>
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" name="color[]" value="<?php echo $fila_color['pro_color']; ?>" <?php echo in_array($fila_color['pro_color'], $colores_seleccionados) ? 'checked' : ''; ?>>
                                                <?php echo $fila_color['pro_color']; ?>
                                            </label>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="d-block d-md-none">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Filtrar por:
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Filtrar productos:</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="GET" id="form-filtros-modal">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="rubroHeading">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#rubroCollapse" aria-expanded="false" aria-controls="rubroCollapse">
                                                Rubro
                                            </button>
                                        </h2>
                                        <div id="rubroCollapse" class="accordion-collapse collapse" aria-labelledby="rubroHeading" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <ul class="list-unstyled">
                                                    <?php foreach ($rubros as $fila_rubro): ?>
                                                        <li>
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" name="rubro[]" value="<?php echo $fila_rubro['pro_rubro']; ?>" <?php echo in_array($fila_rubro['pro_rubro'], $rubros_seleccionados) ? 'checked' : ''; ?>>
                                                                <?php echo $fila_rubro['pro_rubro']; ?>
                                                            </label>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="marcaHeading">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#marcaCollapse" aria-expanded="false" aria-controls="marcaCollapse">
                                                Marca
                                            </button>
                                        </h2>
                                        <div id="marcaCollapse" class="accordion-collapse collapse" aria-labelledby="marcaHeading" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <ul class="list-unstyled">
                                                    <?php foreach ($marcas as $fila_marca): ?>
                                                        <li>
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" name="marca[]" value="<?php echo $fila_marca['pro_marca']; ?>" <?php echo in_array($fila_marca['pro_marca'], $marcas_seleccionadas) ? 'checked' : ''; ?>>
                                                                <?php echo $fila_marca['pro_marca']; ?>
                                                            </label>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="colorHeading">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#colorCollapse" aria-expanded="false" aria-controls="colorCollapse">
                                                Color
                                            </button>
                                        </h2>
                                        <div id="colorCollapse" class="accordion-collapse collapse" aria-labelledby="colorHeading" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <ul class="list-unstyled">
                                                    <?php foreach ($colores as $fila_color): ?>
                                                        <li>
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" name="color[]" value="<?php echo $fila_color['pro_color']; ?>" <?php echo in_array($fila_color['pro_color'], $colores_seleccionados) ? 'checked' : ''; ?>>
                                                                <?php echo $fila_color['pro_color']; ?>
                                                            </label>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="btn-filtrar-chico-modal">Filtrar</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </aside>



        <main class="col-md-9">
            <form action="" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="search" name="busqueda" class="form-control rounded" placeholder="Buscar" aria-label="Buscar" aria-describedby="Buscar-addon" value="<?php echo htmlspecialchars($termino_busqueda); ?>" />
                    <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i> Buscar</button>
                </div>
            </form>

            <div class="row">
                <?php while ($fila = $resultado->fetch_assoc()): ?>
                    <div class="col-md-4 mb-4"> <!-- Agregué la clase "mb-4" para dar margen inferior -->
                        <div class="card">
                            <img src="<?php echo $fila['imagen_1']; ?>" class="card-img-top" style="height: 200px; object-fit: contain;" alt="Imagen del producto">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $fila['pro_desc']; ?></h5>
                                <p class="card-text">Marca: <?php echo $fila['pro_marca']; ?></p>
                                <p class="card-text">Precio: <?php echo $fila['pro_precio_publico']; ?></p>
                                <button class="action-button btn btn-outline-danger" id="agregar_carrito_btn" type="button" data-producto-id="<?php echo $id_producto ?>">Agregar <i class="bi bi-cart-plus"></i></button>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <!-- Paginación -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                        <li class="page-item <?php echo ($i == $pagina_actual) ? 'active' : ''; ?>">
                            <a class="page-link" href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        </main>
    </div>
</div>

<div id="footerContainer"></div>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('#headerContainer').load('partes/header.php');
        $('#footerContainer').load('partes/footer.html');

        $(document).ready(function() {
            // Evento para el botón de filtrar grande
            $('#btn-filtrar-grande').click(function() {
                $('#form-filtros').submit();
            });
        });

        document.getElementById('btn-filtrar-chico-modal').addEventListener('click', function() {
            document.getElementById('form-filtros-modal').submit();
    });
    });
</script>

</body>
</html>
