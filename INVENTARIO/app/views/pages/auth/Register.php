<link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/style2.css">

  <?php
    $datos = $data ?? [];
    $tipos_usuario = $datos['tipos_usuario'] ?? [];
    $datas = $datos['datas'] ?? [];
    $errores = $datos['errores'] ?? [];
  ?>

<?php require RUTA_APP . '/views/layout/header.php'; ?>

<section class="bg-register">
  <div class="form-container">
    <img src="<?php echo RUTA_URL ?>/imagenes/Icono_simple.png" alt="usuario-login">
    <h1 class="title">Formulario de Registro de Usuario Nuevo</h1>
    
    <form method="POST" action="<?= rtrim(RUTA_URL, '/') ?>/AuthController/register">

      <label for="nombre">Nombre de usuario</label>
        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($datas['nombre'] ?? '') ?>">
          <?php if (!empty($errores['nombre'])): ?>
            <div style="color:red; font-size:0.9em; margin-top:2px;"><?= $errores['nombre'] ?></div>
          <?php endif; ?>

        <label for="apellido">Apellido de usuario</label>
          <input type="text" id="apellido" name="apellido" value="<?= htmlspecialchars($datas['apellido'] ?? '') ?>">
            <?php if (!empty($errores['apellido'])): ?>
              <div style="color:red; font-size:0.9em; margin-top:2px;"><?= $errores['apellido'] ?></div>
            <?php endif; ?>

        <label for="DNI">DNI de usuario</label>
          <input type="text" id="DNI" name="DNI" pattern="[0-9]+"  minlength="8" maxlength="10" onkeypress="return soloNumeros(event)">
            <?php if (!empty($errores['DNI'])): ?>
              <div style="color:red; font-size:0.9em; margin-top:2px;"><?= $errores['DNI'] ?></div>
            <?php endif; ?>

        <label for="pass">Contraseña</label>
          <input type="password" name="pass">
            <?php if (!empty($errores['pass'])): ?>
              <div style="color:red;"><?= $errores['pass'] ?></div>
            <?php endif; ?>

        <label for="email">E-mail</label>
          <input type="email" name="email" value="<?= htmlspecialchars($datas['email'] ?? '') ?>">
          <?php if (!empty($errores['email'])): ?>
            <div style="color:red;"><?= $errores['email'] ?></div>
          <?php endif; ?>

        <label for="tipo">Tipo de usuario</label>
          <select name="tipo">
            <option value="">Seleccione un tipo</option>
            <?php foreach ($tipos_usuario as $tipo): ?>
              <option value="<?= htmlspecialchars($tipo->nombre_tipo_usuario) ?>">
                <?= htmlspecialchars($tipo->nombre_tipo_usuario) ?>
              </option>
            <?php endforeach; ?>
          </select>

        <?php if (!empty($errores['tipo'])): ?>
            <div style="color:red;"><?= $errores['tipo'] ?></div>
        <?php endif; ?>

        <label for="avatar">Avatar</label>
          <input type="text" name="avatar" placeholder="URL o nombre de imagen" value="<?= htmlspecialchars($datas['avatar']) ?>">

        <?php if (!empty($errores['general'])): ?>
            <div style="color:red;"><?= $errores['general'] ?></div>
        <?php endif; ?>

        <button type="submit" class="boton-login">Registrarse</button>

    </form>

  </div>

</section>

<?php require RUTA_APP . '/views/layout/footer.php'; ?>