<?php

    session_start();


    if(!isset($_SESSION['loggedin'])){

        echo '<script>window.location.href = "https://www.fixture.iscp.edu.ar/login/indexlogin.html";</script>';
        exit;
    }

?>