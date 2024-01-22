<?php
session_start();

require("../conexion/conexion.php");


$usuario=$_POST['usuario'];
$pass=$_POST['pass'];
$dir="index.html";
$consulta="SELECT * FROM cliente WHERE nick='$usuario' AND pass='$pass'";
if($resultado=$mysqli->query($consulta)){
    $encontro=$resultado->num_rows;
    if($encontro>0){
        $extrae = mysqli_fetch_array($resultado);
        $nick=$extrae['nick'];
        $uid=$extrae['id_cliente'];
        $nombre = $extrae['nombre'];
        $apellido = $extrae['apellido'];
        $dni = $extrae['dni'];
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['nick'] = $nick;
        $_SESSION['uid'] = $uid;
        $_SESSION['name'] = $nombre;
        $_SESSION['lastname'] = $apellido;
        $_SESSION['dni'] = $dni;
        echo '<script>window.location.href = "../index.php";</script>';
    }else{
        echo '<script>window.location.href = "indexlogin.html";</script>';
    }
}else{
    echo '<script>window.location.href = "indexlogin.html";</script>';
}

?>