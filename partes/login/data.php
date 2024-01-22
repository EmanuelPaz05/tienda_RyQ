<?php


session_start();

    require("../conexion/conexion.php");

    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $dni=$_POST['dni'];
    $pass=$_POST['pass'];
    $nick=$_POST['user'];
    $consulta="INSERT INTO cliente (dni, nombre, apellido, pass, nick) VALUES ('$dni','$nombre','$apellido','$pass','$nick')";

    if($mysqli->query($consulta) == true){
        echo "Datos insertados con éxito.";
        echo '<script>window.location.href = "https://www.fixture.iscp.edu.ar/login/indexlogin.html";</script>';
    } else {
        echo "Error al insertar datos:";
    }
?>  