<?php
session_start();

// Verificar si se han recibido los datos del producto y la cantidad
if (isset($_POST['producto_id'], $_POST['cantidad'], $_POST['usuario'])) {
    // Recuperar los datos del POST
    $producto_id = $_POST['producto_id'];
    $cantidad = $_POST['cantidad'];
    $usuario_id = $_POST['usuario'];
    $res = false;

    require("../conexion/conexion.php");

    $consulta = "INSERT INTO carrito (usuario_id, producto_id, cantidad) VALUES ($usuario_id,$producto_id,$cantidad)";

    if($resultado = $mysqli->query($consulta)){
        $res = true;
    }   else{
        $res = false;
    }
    echo $res;
}
?>