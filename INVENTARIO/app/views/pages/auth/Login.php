<?php
  $datos = $data ?? [];
  $datas = $datos['datas'] ?? [];
  $errores = $datos['errores'] ?? [];
?>

<?php require RUTA_APP . '/views/layout/header.php'; ?>

<section class="bg-register">
  <div class="form-container">
    <img src="<?php echo RUTA_URL ?>/imagenes/Icono_simple.png" alt="usuario-login">
    <p class="title">Formulario de Login</p>
    
    <form method="POST" action="<?= rtrim(RUTA_URL, '/') ?>/AuthController/loginUsuario">
      <label for="email">E-mail</label>
        <input type="email" name="email" value="<?= htmlspecialchars($datas['email'] ?? '') ?>">
        <?php if (!empty($errores['email'])): ?>
          <div style="color:red;"><?= $errores['email'] ?></div>
        <?php endif; ?>

        <label for="pass">Contraseña</label>
          <input type="password" name="pass">
            <?php if (!empty($errores['pass'])): ?>
              <div style="color:red;"><?= $errores['pass'] ?></div>
            <?php endif; ?>

        <?php if (!empty($errores['general'])): ?>
            <div style="color:red;"><?= $errores['general'] ?></div>
        <?php endif; ?>

        <button type="submit" class="boton-login">Iniciar Sesión</button>
    </form>
  </div>
</section>

<?php require RUTA_APP . '/views/layout/footer.php'; ?>


