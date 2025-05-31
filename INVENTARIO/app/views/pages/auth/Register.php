<link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/Register.css">
<?php require RUTA_APP . '/views/layout/header.php'; ?>

<?php
$data = $data ?? [];
$errores = $errores ?? [];
?>

<title>Registro de Usuarios</title>

<div class="container-body" style="display: flex; justify-content: flex-start;">
    <div class="ctn-form" style="width: 400px; margin-left: 50px;">
        <img src="<?php echo RUTA_URL ?>/imagenes/Icono_simple.png" alt="usuario-login">
        <h1 class="title">Formulario de Registro de Usuario Nuevo</h1>

        <?php if (!empty($errores['general'])): ?>
            <div style="color: red; text-align:center; margin-bottom:10px;">
                <?= $errores['general'] ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo RUTA_URL; ?>/AuthController/register">
            <label for="usuario">Nombre de usuario</label>
            <input type="text" name="usuario" required value="<?= htmlspecialchars($data['nombre_usuario'] ?? '') ?>">
            <?php if (!empty($errores['usuario'])): ?>
                <div style="color:red;"><?= $errores['usuario'] ?></div>
            <?php endif; ?>

            <label for="password">Contraseña</label>
            <input type="password" name="password" required>
            <?php if (!empty($errores['password'])): ?>
                <div style="color:red;"><?= $errores['password'] ?></div>
            <?php endif; ?>

            <label for="email">E-mail</label>
            <input type="email" name="email" required value="<?= htmlspecialchars($data['email_usuario'] ?? '') ?>">
            <?php if (!empty($errores['email'])): ?>
                <div style="color:red;"><?= $errores['email'] ?></div>
            <?php endif; ?>

            <label for="tipo_usuario">Tipo de usuario</label>
            <select name="tipo_usuario" required>
                <option value="">Seleccione un tipo</option>
                <option value="Administrador" <?= ($data['tipo_usuario'] ?? '') == 'Administrador' ? 'selected' : '' ?>>Administrador</option>
                <option value="Usuario" <?= ($data['tipo_usuario'] ?? '') == 'Usuario' ? 'selected' : '' ?>>Usuario</option>
            </select>
            <?php if (!empty($errores['tipo_usuario'])): ?>
                <div style="color:red;"><?= $errores['tipo_usuario'] ?></div>
            <?php endif; ?>

            <label for="avatar">Avatar</label>
            <input type="text" name="avatar" placeholder="URL o nombre de imagen" value="<?= htmlspecialchars($data['avatar_usuario'] ?? '') ?>">

            <input type="submit" name="boton" value="Registrarse">
        </form>
    </div>
</div>

<?php require RUTA_APP . '/views/layout/footer.php'; ?>