<?php

    require('info.php');

    $mysqli = new mysqli($host, $user, $pass, $bd);

    if (!$mysqli)
    echo "No conectado";

    elseif ($mysqli->connect_errno) {
        printf("Falló la conexión: %s\n", $mysqli->connect_error);
        exit();
    }else{
        return $mysqli;
        //echo "conectado";
    }

?>