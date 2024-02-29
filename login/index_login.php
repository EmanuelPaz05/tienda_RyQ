<?php
session_start();
require_once("../conexion/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    // Consulta SQL segura utilizando consultas preparadas
    $consulta = "SELECT * FROM usuarios2 WHERE usu_usuario = ?";
    $stmt = $mysqli->prepare($consulta);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {
        $fila = $resultado->fetch_assoc();
        if (password_verify($contrasena, $fila["usu_pass"])) {
            // Iniciar sesión y redirigir al usuario a una página de inicio
            $_SESSION["usuario"] = $fila["usu_usuario"];
            $_SESSION["usu_tipo_rol"] = $fila["usu_tipo_rol"]; // Guardar el tipo de rol en la sesión
            $_SESSION["usu_id"] = $fila["usu_id"];
            header("Location: ../index.php");
            exit;
        } else {
            echo "Usuario o contraseña incorrectos.";
        }
    } else {
        echo "Usuario o contraseña incorrectos.";
    }

    $mysqli->close();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="../logos/logo.png">
    <link rel="stylesheet" href="text_logins/text_logins.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="d-flex align-items-center py-4">

<style>
  :root{
      --primary-color: #02021b;
      --secondary-color: #0dcaf0;
  }
  
  html,
  body {
    height: 100%;
    background-color: var(--primary-color);
    overflow: hidden;
  }
  
  .fw-normal {
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
  
  /* Estilo de las meteoritos */
  .meteor {
    position: absolute;
    width: 2px;
    height: 2px;
    background-color: #ffffff;
  }
  
</style>

<script>
  function validarCorreoElectronico(correo) {
    var expresion = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return expresion.test(correo);
  }

  document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("loginForm").addEventListener("submit", function(event) {
      var email = document.getElementById("email").value;
      if (!validarCorreoElectronico(email)) {
        alert("Por favor, introduce un correo electrónico válido.");
        event.preventDefault();
      }
    });
  });
</script>

<main class="form-signin w-100 m-auto">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <H1 class="text-info">R&Q COMPUTACIÓN</H1>
      <h1 class="h3 mb-3 fw-normal text-light">Inicia Sesión</h1>
      <div class="form-floating mb-2">
          <input type="text" name="usuario" class="form-control bg-transparent border-info text-light" placeholder="usuario" required>
          <label for="usuario" class="text-info bg-transparent">Usuario</label>
      </div>
      <div class="form-floating mb-2">
          <input type="password" name="contrasena" class="form-control bg-transparent border-info text-light" placeholder="Password" required>
          <label for="contrasena" class="text-info bg-transparent">Contraseña</label>
      </div>
      <button class="btn btn-info w-100 py-2 mb-2" type="submit" value="iniciar_sesion">Iniciar Sesión</button>
      <p class="text-light">¡No tienes una cuenta?<a href="index_signup.php" class="link-info link-underline-opacity-0">Regístrate Ahora</a></p>
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
          { transform: `translate(${window.innerWidth + 100}px, ${window.innerHeight + 100}px) rotate(${angle}deg)` }
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
