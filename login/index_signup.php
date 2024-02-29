<?php
require_once("../conexion/conexion.php");

// Si se envió el formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_apellido = $_POST["nombre_apellido"];
    $nombre_apellido_array = explode(" ", $nombre_apellido);
    $nombre = isset($nombre_apellido_array[0]) ? $nombre_apellido_array[0] : "";
    $apellido = isset($nombre_apellido_array[1]) ? $nombre_apellido_array[1] : "";
    $email = $_POST["email"];
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    // Validación de campos obligatorios
    if (empty($nombre) || empty($apellido) || empty($email) || empty($usuario) || empty($contrasena)) {
        echo "Todos los campos son obligatorios.";
    } else {
        // Verificar si el correo electrónico ya está en uso
        $consulta_email = "SELECT * FROM usuarios2 WHERE usu_email = '$email'";
        $resultado_email = $mysqli->query($consulta_email);
        if ($resultado_email->num_rows > 0) {
            echo "El correo electrónico ya está en uso.";
        } else {
            // Verificar si el nombre de usuario ya está en uso
            $consulta_usuario = "SELECT * FROM usuarios2 WHERE usu_usuario = '$usuario'";
            $resultado_usuario = $mysqli->query($consulta_usuario);
            if ($resultado_usuario->num_rows > 0) {
                echo "El nombre de usuario ya está en uso.";
            } else {
                // Insertar el nuevo usuario en la base de datos
                $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);
                $consulta_insertar = "INSERT INTO usuarios2 (usu_nom_ape, usu_usuario, usu_pass, usu_email) VALUES ('$nombre $apellido', '$usuario', '$contrasena_hash', '$email')";
                if ($mysqli->query($consulta_insertar) === TRUE) {
                    // Redirigir al usuario a index_login.php
                    header("Location: index_login.php");
                    exit();
                } else {
                    echo "Error al registrar usuario: " . $mysqli->error;
                }
            }
        }
    }
    $mysqli->close();
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="shortcut icon" href="../logos/logo.png">
    <link rel="stylesheet" href="text_logins/text_logins.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>

<style>
    :root{
        --primary-color: #02021b;
        --secondary-color: #0dcaf0;
    }
    
    html,
    body {
      height: 100%;
      background-color: var(--primary-color);
      overflow: hidden; /* Evita la aparición de barras de desplazamiento */
    }
    
    .fw-normal, {
        color: var(--secondary-color);
    }
    
    .form-signin {
      max-width: 330px;
      padding: 1rem;
    }
    
    .form-signin .form-floating:focus-within {
      z-index: 2;
    }
    
    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }
    
    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }

    /* Estilo de los meteoritos */
    .meteor {
      position: absolute;
      width: 2px;
      height: 2px;
      background-color: #ffffff;
    }
</style>


<main class="form-signin w-100 m-auto">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2 class="mb-4 text-info">R&Q COMPUTACIÓN</h2>
        <h1 class="h3 mb-3 fw-normal text-light">Regístrate</h1>

        <div class="form-floating mb-2">
            <input type="text" class="form-control bg-transparent border-info text-light" name="nombre_apellido" placeholder="Juan Perez" required>
            <label for="nombre_apellido" class="text-info bg-transparent">Nombre y Apellido</label>
        </div>
        <div class="form-floating mb-2">
            <input type="text" class="form-control bg-transparent border-info text-light" name="usuario" placeholder="Juan Perez" required>
            <label for="usuario" class="text-info bg-transparent">Usuario</label>
        </div>
        <div class="form-floating mb-2">
            <input type="email" name="email" class="form-control bg-transparent border-info text-light" placeholder="name@example.com" required>
            <label for="email" class="text-info bg-transparent">Email</label>
        </div>
        <div class="form-floating mb-2">
            <input type="password" name="contrasena" class="form-control bg-transparent border-info text-light" placeholder="contrasena" required>
            <label for="contrasena" class="text-info bg-transparent">Contraseña</label>
        </div>
            <button class="btn btn-info w-100 py-2" type="submit" value="registrarse">Registrarse</button>
            <p class="mt-5 mb-3 text-secondary">© 2024 R&Q COMPUTACIÓN</p>
    </form>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const numMeteorites = 20; // Número de meteoritos
        
        for (let i = 0; i < numMeteorites; i++) {
            createMeteorite();
        }
    
        function createMeteorite() {
            const meteorite = document.createElement("div");
            meteorite.classList.add("meteor");
            meteorite.style.top = `${Math.random() * window.innerHeight}px`; // Posición vertical aleatoria
            meteorite.style.left = `${Math.random() * window.innerWidth}px`; // Posición horizontal aleatoria
            const speed = Math.random() * 2 + 1; // Velocidad aleatoria
            const angle = Math.random() * 360; // Ángulo aleatorio
            meteorite.style.transform = `rotate(${angle}deg)`; // Rotar el meteorito
            document.body.appendChild(meteorite);
            
            // Animación del meteorito
            const animation = meteorite.animate([
              { transform: `translate(-100px, -100px) rotate(${angle}deg)` },
              { transform: `translate(${window.innerWidth + 100}px, ${window.innerHeight + 100}px) rotate(${angle}  deg)` }
            ], {
              duration: speed * 1000, // Duración de la animación basada en la velocidad
              iterations: Infinity, // Repetir infinitamente
              easing: 'linear'
            });
            
            // Reiniciar posición cuando el meteorito sale de la pantalla
            animation.onfinish = () => {
              meteorite.style.top = `${Math.random() * window.innerHeight}px`;
              meteorite.style.left = `${-100}px`;
            };
        }
    });
</script>

</body>
</html>
