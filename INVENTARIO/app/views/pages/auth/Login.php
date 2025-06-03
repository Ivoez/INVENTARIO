<!DOCTYPE html>
<html lang="es">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario LOGIN</title>
    <link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/login_style.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Special+Gothic+Expanded+One&display=swap">
</head>
<body>

    <div class="form-body">
        <p class="text">Bienvenido al Sistema Inventario</p>

    <?php if (!empty($_SESSION['mensaje_exito'])): ?> <!--(Session) son variables de sesion temporal ya que no persiten como seria en el registro-->

        <div style="color: green; font-weight: bold; text-align:center; margin-bottom: 10px;">
        <?= htmlspecialchars($_SESSION['mensaje_exito']) ?>
        </div>

    <?php unset($_SESSION['mensaje_exito']); ?>
    <?php endif; ?>



        <?php if (!empty($errores['login'])): ?>

            <div style="color:red;"><?php echo $errores['login']; ?></div>
        <?php endif; ?>

        <form class="text" method="POST" action="<?php echo RUTA_URL ?>/AuthController/loginUsuario">
            <input type="email" name="email" placeholder="Correo electrónico" required value="<?php echo $data['email_usuario'] ?? '' ?>">
            
            <input type="password" name="password" placeholder="Contraseña" required>

            <button type="submit" class="text tarjeta-destacada">Iniciar sesión</button>
        </form>

        <div class="text" style="margin-top: 1em;">
            <a href="<?php echo RUTA_URL ?>/AuthController/register">
                <button class="text tarjeta-destacada">Registrarse</button>
            </a>
        </div>
    </div>

</body>
</html>