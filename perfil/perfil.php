<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["usuario"])) {
    header("Location: ../index.php");
    exit;
}

$usuario = $_SESSION["usuario"];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="/css/perfil.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/header/header.css">
    <link rel="stylesheet" href="../css/footer/footer.css">
    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="shortcut icon" href="../logos/logo sin texto - header-png.png" />
</head>
<body style="background-color: #075e62;">

<h1>Bienvenido <?php echo $usuario; ?></h1>


<!-- Incluir el código del header aquí -->
<?php include "../partes/header.php"; ?>


<section>
    <!--Para pantallas > 768px-->
    <div class="container-fluid row contenido">
        <div class="col-3 p-3 panel-lateral d-none d-md-block">
            <h3 class="text-light">Panel De Usuario</h3>
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-info list-group-item-action seleccionado" data-contenido="contenido-resumen">Resumen de la cuenta</a>

                <a href="#" class="list-group-item list-group-item-info list-group-item-action" data-contenido="contenido-info">Información del perfil</a>

                <a href="#" class="list-group-item list-group-item-info list-group-item-action" data-contenido="contenido-apuestas">Apuestas Activas</a>

                <a href="#" class="list-group-item list-group-item-info list-group-item-action" data-contenido="contenido-historial">Historial de apuestas</a>

                <a href="#" class="list-group-item list-group-item-info list-group-item-action" data-contenido="contenido-estadisticas">Estadísticas y resultados</a>

                <a href="#" class="list-group-item list-group-item-info list-group-item-action" data-contenido="contenido-bonos">Bonos y promociones</a>

                <a href="#" class="list-group-item list-group-item-info list-group-item-action" data-contenido="contenido-soporte">Soporte al cliente</a>

                <a href="#" class="list-group-item list-group-item-info list-group-item-action" data-contenido="contenido-prefe">Preferencias de notificación</a>

                <a href="#" class="list-group-item list-group-item-info list-group-item-action" data-contenido="contenido-transacciones">Historial de transacciones</a>

                <a href="#" class="list-group-item list-group-item-info list-group-item-action" data-contenido="contenido-cerrar">Cerrar sesión</a>
            </div>
        </div>

        <div class="col-9 d-none d-md-block">

            <!--Resumen de la cuenta-->
            <div class="contenidos" id="contenido-resumen">
            <h4 class="mx-3">RESUMEN DE LA CUENTA</h4>
                <hr>
                <p class="mx-4 my-2"><b>Nombre:</b> <?= $_SESSION['name']?></p>
                <p class="mx-4 my-2"><b>Apellido:</b> <?= $_SESSION['lastname']?></p>
                <p class="mx-4 my-2"><b>DNI:</b> <?= $_SESSION['dni']?></p>
                <p class="mx-4 my-0"><b>Nombre de Usuario:</b> <?= $_SESSION['nick']?></p>
          </div>

            <!--Info de perfil-->
            <div class="contenidos" id="contenido-info">
            <h4 class="mx-3">INFORMACIÓN DEL PERFIL</h4>
                <hr>
            </div>

          <!--Apuestas activas-->
          <div class="contenidos" id="contenido-apuestas">
            <h4 class="mx-3">APUESTAS ACTIVAS</h4>
              <hr>
          </div>

          <!--Historial de apuestas-->
          <div class="contenidos" id="contenido-historial">
            <h4 class="mx-3">HISTORIAL DE APUESTAS</h4>
              <hr>
          </div>

          <!--Estadísticas y resultados-->
          <div class="contenidos"  id="contenido-estadisticas">
            <h4 class="mx-3">ESTADÍSTICAS Y RESULTADOS</h4>
              <hr>
          </div>

          <!--Bonos y promociones-->
          <div class="contenidos" id="contenido-bonos">
            <h4 class="mx-3">BONOS Y PROMOCIONES</h4>
              <hr>
          </div>

          <!--Soporte al cliente-->
          <div class="contenidos" id="contenido-soporte">
            <h4 class="mx-3">SOPORTE AL CLIENTE</h4>
              <hr>
          </div>

          <!--Preferencias de notificaciones-->
          <div class="contenidos" id="contenido-prefe">
            <h4 class="mx-3">PREFERENCIAS DE NOTIFICACIONES</h4>
              <hr>
          </div>

          <!--Historial de transacciones-->
          <div class="contenidos" id="contenido-transacciones">
            <h4 class="mx-3">HISTORIAL DE TRANSACCIONES</h4>
                <hr>
            </div>

            <!--Cerrar sesión-->
            <div class="contenidos" id="contenido-cerrar">
            <h4 class="mx-3">CERRAR SESIÓN</h4>
                <hr>
            </div>
        </div>
    </div>
    <!--Para pantallas < 768px-->
    <div class="container-fluid d-block d-md-none">
        <div class="d-block d-md-none">
            <a class="btn btn-outline-dark d-grid col-2 mx-auto mt-4" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                Menu
            </a>
            
            <div class="offcanvas offcanvas-start" style="background-color: #075e62; width: 50%;" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h3 class="text-light">Panel De Usuario</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="list-group">
                <a href="#" class="list-group-item list-group-item-info list-group-item-action seleccionado-2" data-contenido="contenido-resumen-2">Resumen de la cuenta</a>

                <a href="#" class="list-group-item list-group-item-info list-group-item-action" data-contenido="contenido-info-2">Información del perfil</a>

                <a href="#" class="list-group-item list-group-item-info list-group-item-action" data-contenido="contenido-apuestas-2">Apuestas Activas</a>

                <a href="#" class="list-group-item list-group-item-info list-group-item-action" data-contenido="contenido-historial-2">Historial de apuestas</a>

                <a href="#" class="list-group-item list-group-item-info list-group-item-action" data-contenido="contenido-estadisticas-2">Estadísticas y resultados</a>

                <a href="#" class="list-group-item list-group-item-info list-group-item-action" data-contenido="contenido-bonos-2">Bonos y promociones</a>

                <a href="#" class="list-group-item list-group-item-info list-group-item-action" data-contenido="contenido-soporte-2">Soporte al cliente</a>

                <a href="#" class="list-group-item list-group-item-info list-group-item-action" data-contenido="contenido-prefe-2">Preferencias de notificación</a>

                <a href="#" class="list-group-item list-group-item-info list-group-item-action" data-contenido="contenido-transacciones-2">Historial de transacciones</a>

                <a href="#" class="list-group-item list-group-item-info list-group-item-action" data-contenido="contenido-cerrar-2">Cerrar sesión</a>
                    </div>
                </div>
            </div>
            
        </div>

        <!--Contenidos cuando se achica pantalla-->
        <div class="d-block d-md-none">
        <!--Resumen de la cuenta-->
        <div class="contenidos-2 mb-4" id="contenido-resumen-2">
          <h4 class="mx-3">RESUMEN DE LA CUENTA</h4>
            <hr>
              <p class="mx-4 my-2"><b>Nombre:</b> <?= $_SESSION['name']?></p>
              <p class="mx-4 my-2"><b>Apellido:</b> <?= $_SESSION['lastname']?></p>
              <p class="mx-4 my-2"><b>DNI:</b> <?= $_SESSION['dni']?></p>
              <p class="mx-4 my-0"><b>Nombre de Usuario:</b> <?= $_SESSION['nick']?></p>
        </div>

        <!--Info de perfil-->
        <div class="contenidos-2 mb-4" id="contenido-info-2">
          <h4 class="mx-3">INFORMACIÓN DEL PERFIL</h4>
            <hr>
        </div>

        <!--Apuestas activas-->
        <div class="contenidos-2 mb-4" id="contenido-apuestas-2">
          <h4 class="mx-3">APUESTAS ACTIVAS</h4>
            <hr>
        </div>

        <!--Historial de apuestas-->
        <div class="contenidos-2 mb-4" id="contenido-historial-2">
          <h4 class="mx-3">HISTORIAL DE APUESTAS</h4>
            <hr>
        </div>

        <!--Estadísticas y resultados-->
        <div class="contenidos-2 mb-4"  id="contenido-estadisticas-2">
          <h4 class="mx-3">ESTADÍSTICAS Y RESULTADOS</h4>
            <hr>
        </div>

        <!--Bonos y promociones-->
        <div class="contenidos-2 mb-4" id="contenido-bonos-2">
          <h4 class="mx-3">BONOS Y PROMOCIONES</h4>
            <hr>
        </div>

        <!--Soporte al cliente-->
        <div class="contenidos-2 mb-4" id="contenido-soporte-2">
          <h4 class="mx-3">SOPORTE AL CLIENTE</h4>
            <hr>
        </div>

        <!--Preferencias de notificaciones-->
        <div class="contenidos-2 mb-4" id="contenido-prefe">
          <h4 class="mx-3">PREFERENCIAS DE NOTIFICACIONES</h4>
            <hr>
        </div>

        <!--Historial de transacciones-->
        <div class="contenidos-2 mb-4" id="contenido-transacciones-2">
          <h4 class="mx-3">HISTORIAL DE TRANSACCIONES</h4>
            <hr>
        </div>

        <!--Cerrar sesión-->
        <div class="contenidos-2 mb-4" id="contenido-cerrar-2">
          <h4 class="mx-3">CERRAR SESIÓN</h4>
            <hr>
        </div>

        </div>
    </div>
</section>



<footer>
        <!--Contenedor Footer-->
        <div class="container-fluid p-3" style="background-color: #044144; width: 100%;">

            <!--Contenedor De Los Elementos-->
            <div class="row justify-content-around text-center text-md-start">

                <!--Contenedor de logo-->
                <div class="col-md-2 text-center">
                    <img class="mt-3" src="/logos/logo sin texto - header.svg" width="120px" alt="logo-footer">
                </div>

                <!--Elementos de AYUDA-->
                <div class="col-md-2 text-center">
                    <ul class="list-unstyled">
                        <li class="fw-bold fs-4 my-2 text-dark">AYUDA</li>
                        <li><a href="#" class="text-decoration-none link-secondary">COMO REGISTRARSE</a></li>
                        <li><a href="#" class="text-decoration-none link-secondary">QUIENES SOMOS</a></li>
                        <li><a href="#" class="text-decoration-none link-secondary">COMO PREDECIR</a></li>
                    </ul>
                </div>

                <!--Elementos de CARGAS-->
                <div class="col-md-2 text-center">
                    <ul class="list-unstyled">
                        <li class="fw-bold fs-4 my-2 text-dark">CARGAS</li>
                        <li><a href="" class="text-decoration-none link-secondary">MEDIOS DE PAGOS</a></li>
                        <li><a href="" class="text-decoration-none link-secondary">DEPOSITOS</a></li>
                        <li><a href="" class="text-decoration-none link-secondary">RETIROS</a></li>
                    </ul>
                </div>

                <!--Elementos de CONTACTO-->
                <div class="col-md-2 fs-4 text-center">
                    <ul class="list-unstyled">
                        <li class="fw-bold my-2 text-dark">CONTACTO</li>
                        <div class="icons">
                            <a class="link-secondary" href="https://www.facebook.com/ISCP.PILAR?mibextid=9R9pXO"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
                            </svg></a>

                            <a class="link-secondary ms-1 me-1" href="https://instagram.com/iscp_pilar?igshid=MzRlODBiNWFlZA=="><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
                            </svg></a>

                            <a class="link-secondary" href="https://wa.me/+543572408172"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                            <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"></path>
                            </svg></a>
                        </div>
                    </ul>
                </div>
            </div>
        </div>

        <!--Contenedor de copyright-->
        <div class="container-fluid" style="background-color: #011314; width: 100%">
            <div class="col-md-12 text-center pt-1 row">    
                <p class="text-white-50">&copy; 2023 Copyright - Prode I.S.C.P Argentina</p>
            </div>
        </div>
</footer>



</body>

<!--Para que cuando en barra lateral toques un elemento y Muestre el div de contenido correspondiente-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(".list-group-item").click(function() {
            // Oculta todos los divs de contenido
            $(".contenidos").hide();

            // Obtén el ID del contenido correspondiente al enlace clicado
            var enlaceClicado = $(this).data("contenido");
            
            // Muestra el div de contenido correspondiente
            $("#" + enlaceClicado).show();
        });
    });

    $(document).ready(function() {
        // Mostrar contenido de "Resumen de la cuenta"
        $("#contenido-resumen").show();
        
        // Marcar el enlace correspondiente como seleccionado
        $(".seleccionado").addClass("active");
        
        // Manejar el evento click en los enlaces
        $(".list-group-item").click(function() {
            // Ocultar todos los divs de contenido
            $(".contenidos").hide();

            // Obtener el ID del contenido correspondiente al enlace clicado
            var enlaceClicado = $(this).data("contenido");
            
            // Mostrar el div de contenido correspondiente
            $("#" + enlaceClicado).show();

            // Marcar el enlace clicado como seleccionado
            $(".list-group-item").removeClass("active");
            $(this).addClass("active");
        });
    });

    /*Al cargar la pag. se mostrará el contenido de "Resumen de la cuenta"*/
    document.addEventListener('DOMContentLoaded', function() {
        // Ocultar todos los divs de contenido excepto "Resumen de la cuenta"
        var contenidos = document.querySelectorAll('.contenidos');
        for (var i = 0; i < contenidos.length; i++) {
            contenidos[i].classList.add('oculto');
        }
        var contenidoResumen = document.getElementById('contenido-resumen');
        contenidoResumen.classList.remove('oculto');
    });


    $(document).ready(function(){
        $('#menu').load('../header/header.html');
    })

</script>

<!--(PAGINAS CHICAS)Para que cuando en barra lateral toques un elemento y Muestre el div de contenido correspondiente-->
<script>
    $(document).ready(function() {
        $(".list-group-item").click(function() {
            // Oculta todos los divs de contenido
            $(".contenidos-2").hide();

            // Obtén el ID del contenido correspondiente al enlace clicado
            var enlaceClicado = $(this).data("contenido");
            
            // Muestra el div de contenido correspondiente
            $("#" + enlaceClicado).show();
        });
    });

    $(document).ready(function() {
        // Mostrar contenido de "Resumen de la cuenta"
        $("#contenido-resumen-2").show();
        
        // Marcar el enlace correspondiente como seleccionado
        $(".seleccionado-2").addClass("active");
        
        // Manejar el evento click en los enlaces
        $(".list-group-item").click(function() {
            // Ocultar todos los divs de contenido
            $(".contenidos-2").hide();

            // Obtener el ID del contenido correspondiente al enlace clicado
            var enlaceClicado = $(this).data("contenido");
            
            // Mostrar el div de contenido correspondiente
            $("#" + enlaceClicado).show();

            // Marcar el enlace clicado como seleccionado
            $(".list-group-item").removeClass("active");
            $(this).addClass("active");
        });
    });

    /*(PANTALLAS GRANDES)Al cargar la pag. se mostrará el contenido de "Resumen de la cuenta"*/
    document.addEventListener('DOMContentLoaded', function() {
        // Ocultar todos los divs de contenido excepto "Resumen de la cuenta"
        var contenidos = document.querySelectorAll('.contenidos-2');
        for (var i = 0; i < contenidos.length; i++) {
            contenidos[i].classList.add('oculto');
        }
        var contenidoResumen = document.getElementById('contenido-resumen-2');
        contenidoResumen.classList.remove('oculto');
    });



</script>


<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</html>