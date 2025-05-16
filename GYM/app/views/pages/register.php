<?php
//require 'gym.sql';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_apellido = trim($_POST["nombre_apellido"]);
    $dni = trim($_POST["dni"]);
    $email = trim($_POST["email"]);
    $celular = trim($_POST["celular"]);
    $password = $_POST["password"];

    if (!empty($nombre_apellido) && !empty($dni) && !empty($email) && !empty($celular) && !empty($password)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO socios (nombre_apellido, dni, email, celular, password) VALUES (?, ?, ?, ?, ?)");
            if ($stmt->execute([$nombre_apellido, $dni, $email, $celular, $passwordHash]));
	        $message = '<div class="alert alert-success">Usuario registrado exitosamente.</div>';
	    } else {
		$message = '<div class="alert alert-danger">Error al registrar el usuario.</div>';
	    }           
        } else {
            $message = '<div class="alert alert-danger">Email inválido.</div>';
        }
    } else {
        $message = '<div class="alert alert-warning">Por favor completa todos los campos.</div>';
    }

?>
<?php require RUTA_APP . '/views/layout/auth/header.php'; ?>

<input type="radio" name="panel" id="sign-in-toggle" checked hidden>
<input type="radio" name="panel" id="sign-up-toggle" hidden>

<div class="container">
<div class="form-container sign-up-container">
    <form action="http://localhost/appweb_caba_1c_2025/GYM/AuthController/registrar" method="POST">
    <h1>Crear cuenta!</h1>
    <span>Usa tu mail para registrarte!</span>
    <input type="text" placeholder="Nombre" name="nombre" />
    <input type="text" placeholder="Apellido" name="apellido" />
    <input type="text" placeholder="DNI" name="dni" />
    <input type="email" placeholder="Email" name="email" />
    <input type="text" placeholder="Número de celular" name="celular" />
    <input type="password" placeholder="Contraseña" name="password" />
    <input type="password" placeholder="Ingrese nuevamente su contraseña" name="password2" />
    <button type="submit">
        <span class="btn-register">REGISTRARSE!</span>
    </button>
    </form>
</div>

<div class="form-container sign-in-container">
    <form action="#">
    <h1 class="sign-in-text-form">Iniciar Sesion!</h1>
    <span>Ingresa tu DNI para acceder a tu cuenta!</span>
    <input type="text" placeholder="DNI" />
    <input type="password" placeholder="Contraseña" />
    <a href="#" class="forgot-password">¿Olvidaste tu contraseña?</a>
    <button>
        <span>INICIAR SESION!</span>
    </button>
    </form>
</div>

<div class="overlay-container">
    <div class="overlay">
    <div class="overlay-panel overlay-left">
        <h1 class="overlay-text">Hola devuelta!</h1>
        <p class="overlay-text">Accede con tu información personal para conectarte!</p>
        <label for="sign-in-toggle" class="ghost btn overlay-btn">INICIAR SESION!</label>
    </div>
    <div class="overlay-panel overlay-right">
        <h1 class="overlay-text">Bienvenido!</h1>
        <p class="overlay-text">Pasanos tus datos y sumate a nuestra familia!</p>
        <label for="sign-up-toggle" class="ghost btn overlay-btn">REGISTRARSE!</label>
    </div>
    </div>
</div>
</div>

</body>
</html>
