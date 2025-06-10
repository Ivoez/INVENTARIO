<link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/style2.css">
  <?php
    $datos = $data ?? [];
    $data = $datos['data'] ?? [];          //se deben pasar 
    $errores = $datos['errores'] ?? [];
  ?>

<?php require RUTA_APP . '/views/layout/header.php'; ?>

<section class="bg-register">
  <div class="form-container">
    <p class="text">Bienvenido al Sistema Inventario</p>


    <form method="POST" action="<?= rtrim(RUTA_URL, '/') ?>/AuthController/loginUsuario">

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
    
  </div>

</section> 

<?php require RUTA_APP . '/views/layout/footer.php'; ?>


