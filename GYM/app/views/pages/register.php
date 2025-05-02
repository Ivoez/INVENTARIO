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
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h3 class="card-title mb-4 text-center">Registrarse</h3>

                    <?php if (!empty($message)) echo $message; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Nombre de usuario</label>
                            <input type="text" name="username" class="form-control" id="username" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Registrarse</button>
                    </form>

                    <div class="mt-3 text-center">
                        <a href="login.php">¿Ya tienes cuenta? Iniciar sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>