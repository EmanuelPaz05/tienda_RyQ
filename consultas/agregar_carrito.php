<?php
session_start();

// Verificar si se han recibido los datos del producto y la cantidad
if (isset($_POST['producto_id'], $_POST['cantidad'], $_POST['usuario_id'])) {
    // Recuperar los datos del POST
    $producto_id = $_POST['producto_id'];
    $cantidad = $_POST['cantidad'];
    $usuario_id = $_POST['usuario_id'];

    // Crear un arreglo asociativo con los datos del producto
    $producto = array(
        'producto_id' => $producto_id,
        'cantidad' => $cantidad
        // Aquí podrías agregar más información del producto si es necesario
    );

    // Verificar si ya existe una sesión para el carrito
    if (isset($_SESSION['carrito'])) {
        // Agregar el producto al carrito
        $_SESSION['carrito'][] = $producto;
    } else {
        // Crear una nueva sesión para el carrito y agregar el producto
        $_SESSION['carrito'] = array($producto);
    }

    // Devolver una respuesta exitosa
    echo json_encode(array('success' => true));
} else {
    // Si faltan datos, devolver un mensaje de error
    echo json_encode(array('success' => false, 'message' => 'Faltan datos'));
}
?>
