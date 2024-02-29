<?php
require("../conexion/conexion.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $marca = $_POST['marca'];
    $rubro = $_POST['rubro'];
    $modelo = $_POST['modelo'];
    $color = $_POST['color'];
    $cantidad = $_POST['cantidad'];
    $desc = $_POST['desc'];
    $precio_publico = $_POST['precio_publico'];
    $precio_costo = $_POST['precio_costo'];
    $precio_mayorista = $_POST['precio_mayorista'];
    $img_1 = $_POST['imagen_1'];
    $img_2 = $_POST['imagen_2'];
    $img_3 = $_POST['imagen_3'];

    $barra = $marca.$rubro.$modelo.$color;

    $res = false;
    if($id==0){
        $actualizar_query = "INSERT INTO `productos2`(`pro_barra`, `pro_marca`, `pro_rubro`, `pro_modelo`, `pro_color`, `pro_cantidad`, `pro_desc`, `pro_precio_publico`, `pro_precio_costo`, `pro_precio_mayorista`, `imagen_1`, `imagen_2`, `imagen_3`, `pro_estado`) VALUES ('$barra','$marca','$rubro','$modelo','$color', '$cantidad', '$desc',$precio_publico,$precio_costo,$precio_mayorista,'$img_1','$img_2','$img_3','1')";
    }else{
        $actualizar_query = "UPDATE productos2 SET pro_marca = '$marca', pro_rubro = '$rubro', pro_modelo = '$modelo', pro_color = '$color', pro_cantidad = '$cantidad', pro_desc = '$desc', pro_precio_publico = '$precio_publico', pro_precio_costo = '$precio_costo', pro_precio_mayorista = '$precio_mayorista', imagen_1 = '$img_1', imagen_2 = '$img_2', imagen_3 = '$img_3' WHERE pro_id = $id";
    }
    
    if (mysqli_query($mysqli, $actualizar_query)) {
        $res=true;
        echo($res);
    } else {
        $res=false;
        echp($res);
    }
}
?>
