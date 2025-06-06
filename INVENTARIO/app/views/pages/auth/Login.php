<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario LOGIN</title>
    <link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/login_style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Special+Gothic+Expanded+One&display=swap">
</head>
<body class="background">

    <div class="form-container">

        <p class="text">Bienvenido al Sistema Inventario</p>

        <?php if (!empty($_SESSION['mensaje_exito'])): ?> <!--(Session) son variables de sesion temporal ya que no persisten como seria en el registro-->
            <div class="mensaje-exito">
                <?= htmlspecialchars($_SESSION['mensaje_exito']) ?>
            </div>
            <?php unset($_SESSION['mensaje_exito']); ?>
        <?php endif; ?>

        <?php if (!empty($errores['login'])): ?>
            <div class="mensaje-error"><?php echo $errores['login']; ?></div>
        <?php endif; ?>

        <form method="POST" action="<?php echo RUTA_URL ?>/AuthController/loginUsuario">
            <input type="email" name="email" placeholder="Correo electrónico" required value="<?php echo $data['email_usuario'] ?? '' ?>">
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit" class="boton-login">Iniciar sesión</button>
        </form>

        <div class="registro-link">
            <a href="<?php echo RUTA_URL ?>/AuthController/register">
                <button class="boton-login">Registrarse</button>
            </a>
        </div>

    </div>

</body>
</html>
