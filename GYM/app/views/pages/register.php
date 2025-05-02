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

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Login / Register</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public/css/styleregister.css">
</head>
<body>

<input type="radio" name="panel" id="sign-in-toggle" checked hidden>
<input type="radio" name="panel" id="sign-up-toggle" hidden>

<div class="container">
<div class="form-container sign-up-container">
    <form action="#">
    <h1>Crear cuenta!</h1>
    <span>Usa tu mail para registrarte!</span>
    <input type="text" placeholder="Npmbre" />
    <input type="email" placeholder="Email" />
    <input type="password" placeholder="Contraseña" />
    <button>REGISTRARSE!</button>
    </form>
</div>

<div class="form-container sign-in-container">
    <form action="#">
    <h1>Iniciar Sesion!</h1>
    <span>Usa tu mail para acceder a tu cuenta!</span>
    <input type="email" placeholder="Email" />
    <input type="password" placeholder="Contraseña" />
    <a href="#">Olvidaste tu contraseña?</a>
    <button>INICIAR SESION!</button>
    </form>
</div>

<div class="overlay-container">
    <div class="overlay">
    <div class="overlay-panel overlay-left">
        <h1>Hola devuelta!</h1>
        <p>Accede con tu informacion personal para conectarte!</p>
        <label for="sign-in-toggle" class="ghost btn">INICIAR SESION!</label>
    </div>
    <div class="overlay-panel overlay-right">
        <h1>Bienvenido!</h1>
        <p>Pasanos tus datos y sumate a nuestra familia!</p>
        <label for="sign-up-toggle" class="ghost btn">REGISTRARSE!</label>
    </div>
    </div>
</div>
</div>

</body>
</html>
