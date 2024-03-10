<?php
require '../librerias/vendor/autoload.php';

use Dompdf\Dompdf;

// Verifica si se recibió el contenido del pedido
if (isset($_POST['contenido_pedido'])) {
    // Obtén el contenido del pedido desde el formulario
    $contenido_pedido = $_POST['contenido_pedido'];

    // Crea una nueva instancia de Dompdf
    $dompdf = new Dompdf();

    // Define el HTML con la tabla de productos
    $html = '
        <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                }
                th, td {
                    border: 1px solid #dddddd;
                    text-align: left;
                    padding: 8px;
                }
                th {
                    background-color: #f2f2f2;
                }

                .borrar_pdf{
                    display: none;
                }
            </style>
        </head>
        <body>
            <table>
                <tbody>
                    ' . $contenido_pedido . '
                </tbody>
            </table>
        </body>
        </html>
    ';

    // Carga el HTML del pedido
    $dompdf->loadHtml($html);

    // Establece el tamaño y la orientación del papel
    $dompdf->setPaper('A4', 'portrait');

    // Renderiza el PDF
    $dompdf->render();

    // Descarga el PDF con un nombre específico
    $dompdf->stream('pedido.pdf');
} else {
    // Si no se recibió el contenido del pedido, redirige de vuelta a la página del carrito
    header('Location: ../carrito.php');
    exit();
}
?>
