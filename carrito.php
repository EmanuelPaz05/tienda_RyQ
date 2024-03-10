<?php
require("conexion/conexion.php");

session_start();

if (isset($_SESSION["usuario"])) {
    
    // Verifica si la conexión fue exitosa
    if ($mysqli) {
        // Realiza la consulta para obtener los productos del carrito
        $usuario_id = $_SESSION["usu_id"]; 
        $sql = "SELECT ca.producto_id, SUM(ca.cantidad) as total_cantidad, SUM(ca.subtotal) as total_subtotal, pro.* FROM `carrito` AS ca JOIN productos2 AS pro ON ca.producto_id = pro.pro_id WHERE ca.usuario_id = $usuario_id GROUP BY ca.producto_id";
        $result = mysqli_query($mysqli, $sql);

        // Verifica si la consulta devolvió resultados
        if ($result) {
            // Procesa los resultados obtenidos
            if (mysqli_num_rows($result) > 0) {
                $total_carrito = 0; // Variable para calcular el total del carrito
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="js/carrito.js"></script>

    <!--estilos partes-->
    <link rel="shortcut icon" href="logos/logo.png">
    <link rel="stylesheet" href="css/header/header.css">
    <link rel="stylesheet" href="css/footer/footer.css">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--bootstrap-->
    <link rel="stylesheet" href="librerias/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="librerias/bootstrap-icons-1.11.2/font/bootstrap-icons.min.css">

</head>
<body>

    <div id="headerContainer"></div>


    <div class="container mt-5" id="pedido_carrito">
        <h1 class="mb-4">Carrito de Compras</h1>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col" style='max-width: 70px;'>Cantidad</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    // Muestra los productos del carrito
                    while ($row = mysqli_fetch_assoc($result)) {
                        $subtotal = $row['pro_precio_publico'] * $row['total_cantidad']; // Calcula el subtotal
                        $total_carrito += $subtotal;
                        echo "<tr>";
                        echo "<td>" . $row['pro_barra'] . "</td>";
                        echo "<td>$" . $row['pro_precio_publico'] . "</td>";
                        echo "<td style='max-width: 70px;'>";
                        echo "<input type='number' class='form-control cantidadProducto' id='cantidadProducto_" . $row['producto_id'] . "' value='" . $row['total_cantidad'] . "' disabled>";
                        echo "</td>";
                        echo "<td>$" . $subtotal . "</td>";
                        echo '<td class="text-center"><button type="button" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button></td>';
                        echo "</tr>";
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"><strong>Total</strong></td>
                    <td><strong>$<?php echo $total_carrito; ?></strong></td>
                    <td></td>
                </tr>
                <tr class="borrar_pdf">
                    <td colspan="6" class="text-center">
                        <form action="pedido.php" method="post" class="mb-1">
                            <button type="button" class="btn btn-success" id="imprimirBtn"><i class="bi bi-printer-fill bg"></i> Imprimir</button>
                        </form>
                        <button class="btn btn-danger mr-2">Vaciar Pedido</button>
                        <button class="btn btn-primary" id="enviarPedidoBtn">Comprar pedido</button>
                    </td>
                </tr>
            </tfoot>
        </table>
        <div id="mensajeEnviarPedido" class="alert alert-success d-none borrar_pdf" role="alert">
            Te hablaremos por este correo electrónico: <span id="emailUsuario"></span>
        </div>
    </div>

    <form action="consultas/generar_pdfs.php" method="post" id="imprimirForm" style="display: none;">
        <input type="hidden" name="contenido_pedido" id="contenidoPedido">
    </form>

<script>
        $(document).ready(function() {
            $('#imprimirBtn').click(function() {
                // Obtener el contenido del div pedido_carrito
                var contenidoPedido = $('#pedido_carrito').html();
                // Colocar el contenido en el input oculto del formulario
                $('#contenidoPedido').val(contenidoPedido);
                // Enviar el formulario para descargar el contenido como PDF
                $('#imprimirForm').submit();
            });
        });
</script>


    <div id="footerContainer"></div>



    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    

    <script>
        $(document).ready(function() {
            $('#headerContainer').load('partes/header.php');
            $('#footerContainer').load('partes/footer.html');
            $('#enviarPedidoBtn').click(function() {
                window.location.href = 'consultas/envios.html';
        });


            // Manejadores de eventos para los botones de sumar y restar cantidad
            $('.sumarCantidad').click(function() {
                var idCarrito = $(this).data('idcarrito');
                sumarCantidad(idCarrito);
            });

            $('.restarCantidad').click(function() {
                var idCarrito = $(this).data('idcarrito');
                restarCantidad(idCarrito);
            });
        });

        function sumarCantidad(idCarrito) {
            var cantidadActual = parseInt($('#cantidadProducto_' + idCarrito).val());
            $('#cantidadProducto_' + idCarrito).val(cantidadActual + 1);
            // Aquí puedes enviar una petición AJAX para actualizar la cantidad en la base de datos
        }

        function restarCantidad(idCarrito) {
            var cantidadActual = parseInt($('#cantidadProducto_' + idCarrito).val());
            if (cantidadActual > 1) {
                $('#cantidadProducto_' + idCarrito).val(cantidadActual - 1);
                // Aquí puedes enviar una petición AJAX para actualizar la cantidad en la base de datos
            }
        }
    </script>
</body>
</html>

<?php
            } else {
                // No hay productos en el carrito
                echo "<p>El carrito está vacío.</p>";
            }
        } else {
            // Error al ejecutar la consulta
            echo "Error al obtener los productos del carrito.";
        }
        
        // Cierra la conexión a la base de datos
        mysqli_close($mysqli);
    } else {
        // Error al conectar a la base de datos
        echo "Error al conectar a la base de datos.";
    }
} else {
    // Usuario no logueado
    echo "Debes iniciar sesión para ver tu carrito.";
}
?>
