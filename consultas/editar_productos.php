<?php
require("../conexion/conexion.php");

if (isset($_POST['actualizar_producto'])) {
    $id = $_POST['pro_id'];
    $marca = $_POST['pro_marca'];
    $rubro = $_POST['pro_rubro'];
    $modelo = $_POST['pro_modelo'];
    $color = $_POST['pro_color'];
    $desc = $_POST['pro_desc'];
    $precio_publico = $_POST['pro_precio_publico'];
    $precio_costo = $_POST['pro_precio_costo'];
    $precio_mayorista = $_POST['pro_precio_mayorista'];
    $img_1 = $_POST['imagen_1'];
    $img_2 = $_POST['imagen_2'];
    $img_3 = $_POST['imagen_3'];

    // Lógica para actualizar el producto en la base de datos
    $actualizar_query = "UPDATE productos SET pro_marca = '$marca', pro_rubro = '$rubro', pro_modelo = '$modelo', pro_color = '$color', pro_desc = '$desc', pro_precio_publico = '$precio_publico', pro_precio_costo = '$precio_costo', pro_precio_mayorista = '$precio_mayorista', imagen_1 = '$img_1', imagen_2 = '$img_2', imagen_3 = '$img_3' WHERE pro_id = $id";
    
    if (mysqli_query($mysqli, $actualizar_query)) {
        // Actualización exitosa
        echo json_encode(array('success' => true, 'message' => 'Producto actualizado correctamente'));
    } else {
        // Error en la actualización
        echo json_encode(array('success' => false, 'message' => 'Error al actualizar el producto'));
    }
}
?>
