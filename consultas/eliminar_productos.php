<?php

require("../conexion/conexion.php");

    $id = $_POST['id'];
    $res = false;

    $consulta = "DELETE FROM `productos` WHERE `pro_id` = $id";
    $resultado = mysqli_query($mysqli, $consulta);
    if ($resultado == true){
        $res=true;
    }
    echo ($res);
?>