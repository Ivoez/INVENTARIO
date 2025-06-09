<link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/style2.css">
  <!--?php require RUTA_APP . '/views/layout/header.php'; ?>-->
  <?php
    $datos = $data ?? [];
    $data = $datos['data'] ?? [];          //se deben pasar 
    $errores = $datos['errores'] ?? [];
  ?>

<?php require RUTA_APP . '/views/layout/header.php'; ?>

<section class="bg-register">
  <div class="form-container">
    <img src="<?php echo RUTA_URL ?>/imagenes/Icono_simple.png" alt="usuario-login">
    <h1 class="title">Formulario de Registro de Usuario Nuevo</h1>
    
    <form method="POST" action="<?= rtrim(RUTA_URL, '/') ?>/AuthController/register">

      <label for="usuario">Nombre de usuario</label>
        <input type="text" id="usuario" name="usuario" value="<?= htmlspecialchars($data['nombre_usuario'] ?? '') ?>">
          <?php if (!empty($errores['usuario'])): ?>
            <div style="color:red; font-size:0.9em; margin-top:2px;"><?= $errores['usuario'] ?></div>
          <?php endif; ?>

        <label for="password">Contraseña</label>
          <input type="password" name="password">
            <?php if (!empty($errores['password'])): ?>
              <div style="color:red;"><?= $errores['password'] ?></div>
            <?php endif; ?>

        <label for="email">E-mail</label>
          <input type="email" name="email" value="<?= htmlspecialchars($data['email_usuario'] ?? '') ?>">
          <?php if (!empty($errores['email'])): ?>
            <div style="color:red;"><?= $errores['email'] ?></div>
          <?php endif; ?>

        <label for="tipo_usuario">Tipo de usuario</label>
          <select name="tipo_usuario">
            <option value="">Seleccione un tipo</option>
            <option value="Administrador" <?= ($data['tipo_usuario'] ?? '') === 'Administrador' ? 'selected' : '' ?>>Administrador</option>
            <option value="Usuario" <?= ($data['tipo_usuario'] ?? '') === 'Usuario' ? 'selected' : '' ?>>Usuario</option>
          </select>
        <?php if (!empty($errores['tipo_usuario'])): ?>
            <div style="color:red;"><?= $errores['tipo_usuario'] ?></div>
        <?php endif; ?>

        <label for="avatar">Avatar</label>
          <input type="text" name="avatar" placeholder="URL o nombre de imagen" value="<?= htmlspecialchars($data['avatar_usuario']) ?>">

        <?php if (!empty($errores['general'])): ?>
            <div style="color:red;"><?= $errores['general'] ?></div>
        <?php endif; ?>

        <button type="submit" class="boton-login">Registrarse</button>

    </form>

  </div>

</section>

<?php require RUTA_APP . '/views/layout/footer.php'; ?>