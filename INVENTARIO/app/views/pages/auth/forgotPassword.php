<?php require RUTA_APP . '/views/layout/header.php'; ?>

<section class="bg-login">
  <div class="form-container">
    <img src="<?php echo RUTA_URL ?>/imagenes/Icono_simple.png" alt="usuario-login">
    <p class="title">Recuperar Contraseña</p>

    <!-- Mensaje de éxito o error (desde el controlador) -->
    <?php if (!empty($mensaje)): ?>
      <div style="color:green; margin-bottom: 1rem;"><?= $mensaje ?></div>
    <?php endif; ?>

    <form method="POST" action="<?= rtrim(RUTA_URL, '/') ?>/AuthController/recuperarContrasena">
      
      <label for="email">E-mail asociado a tu cuenta</label>
      <input type="email" name="email" required>

      <button type="submit" class="boton-login">Enviar nueva contraseña</button>
      <a href="<?= RUTA_URL ?>/AuthController/loginUsuario" class="boton-login" style="display: inline-block; text-align: center; text-decoration: none; margin-top: 1rem;">Volver al login</a>
    </form>
  </div>
</section>

<?php require RUTA_APP . '/views/layout/footer.php'; ?>