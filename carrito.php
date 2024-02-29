<?php
include 'conexion/conexion.php';

// Verifica si hay un usuario logueado
if (isset($_SESSION["usu_id"])) {
    
    // Verifica si la conexión fue exitosa
    if ($mysqli) {
        // Realiza la consulta para obtener los productos del carrito
        $usuario_id = $_SESSION["usuario_id"];
        $sql = "SELECT * FROM carrito WHERE usuario_id = $usuario_id";
        $result = mysqli_query($conexion, $sql);
        
        // Verifica si la consulta devolvió resultados
        if ($result) {
            // Procesa los resultados obtenidos
            if (mysqli_num_rows($result) > 0) {
                // Muestra los productos del carrito
                $total_carrito = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $total_carrito += $row['subtotal'];
                    echo "<tr>";
                    echo "<td>" . $row['pro_modelo'] . "</td>";
                    echo "<td>$" . $row['pro_precio_publico'] . "</td>";
                    echo "<td>" . $row['cantidad'] . "</td>";
                    echo "<td>$" . $row['subtotal'] . "</td>";
                    echo "</tr>";
                }
                echo "<tr>";
                echo "<td colspan='3'><strong>Total</strong></td>";
                echo "<td><strong>$total_carrito</strong></td>";
                echo "</tr>";
            } else {
                // No hay productos en el carrito
                echo "<tr><td colspan='4'>El carrito está vacío.</td></tr>";
            }
        } else {
            // Error al ejecutar la consulta
            echo "Error al obtener los productos del carrito.";
        }
        
        // Cierra la conexión a la base de datos
        mysqli_close($conexion);
    } else {
        // Error al conectar a la base de datos
        echo "Error al conectar a la base de datos.";
    }
} else {
    // Usuario no logueado
    echo "Debes iniciar sesión para ver tu carrito.";
}
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


    <div class="container mt-5">
        <h1 class="mb-4">Carrito de Compras</h1>
        <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Subtotal</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
            // Los productos del carrito ya fueron mostrados arriba
        ?>
        </tbody>
        </table>
        <tfoot>
            <tr>
                <td colspan="4" class="text-right">Total:</td>
                <td>$100.00</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="6" class="text-center">
                    <button class="btn btn-secondary mr-2">Vaciar Pedido</button>
                    <button class="btn btn-primary" id="enviarPedidoBtn">Enviar Pedido</button>
                </td>
            </tr>
        </tfoot>
    </table>
    <div id="mensajeEnviarPedido" class="alert alert-success d-none" role="alert">
        Te hablaremos por este correo electrónico: <span id="emailUsuario"></span>
    </div>
    </div>

    <div id="footerContainer"></div>



    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>
    $(document).ready(function() {
        $('#headerContainer').load('partes/header.php');
        $('#footerContainer').load('partes/footer.html');
        $('#enviarPedidoBtn').click(function() {
            var email = prompt("Por favor ingresa tu correo electrónico:");
            if (email) {
            $('#emailUsuario').text(email);
            $('#mensajeEnviarPedido').removeClass('d-none');
        }
    });
});
</script>
</body>
</html>
