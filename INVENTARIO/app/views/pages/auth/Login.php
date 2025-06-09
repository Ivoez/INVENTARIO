<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario LOGIN</title>
    <link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/style2.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Special+Gothic+Expanded+One&display=swap">
</head>
<body class="bg-login" style="background-image: url('<?php echo RUTA_URL; ?>/Imagenes/FondoInventario.png');">
<?php require RUTA_APP . '/views/layout/header.php'; ?>
    <div class="form-container">

        <p class="text">Bienvenido al Sistema Inventario</p>

        <?php if (!empty($_SESSION['mensaje_exito'])): ?> <!--(Session) son variables de sesion temporal ya que no persisten como seria en el registro-->
            <div class="mensaje-exito">
                <?= htmlspecialchars($_SESSION['mensaje_exito']) ?>
            </div>
            <?php unset($_SESSION['mensaje_exito']); ?>
        <?php endif; ?>

        <form method="POST" action="<?php echo RUTA_URL ?>/AuthController/loginUsuario">
          <label for="email">E-mail</label>
            <input type="email" name="email" value="<?= htmlspecialchars($data['email_usuario'] ?? '') ?>">
              <?php if (!empty($errores['email'])): ?>
                  <div style="color:red;"><?= $errores['email'] ?></div>
              <?php endif; ?>

          <label for="password">Contraseña</label>
            <input type="password" name="password">
              <?php if (!empty($errores['password'])): ?>
                <div style="color:red;"><?= $errores['password'] ?></div>
              <?php endif; ?>

            <?php if (!empty($errores['general'])): ?>
                <div style="color:red;"><?= $errores['general'] ?></div>
            <?php endif; ?>

            <button type="submit" class="boton-login">Iniciar sesión</button>
        </form>
        <div class="registro-link">
          <a href="<?php echo RUTA_URL ?>/AuthController/register">
            <button class="boton-login">Registrarse</button>
          </a>
        </div>
      </div>

<?php require RUTA_APP . '/views/layout/footer.php'; ?>
</body>
</html>
