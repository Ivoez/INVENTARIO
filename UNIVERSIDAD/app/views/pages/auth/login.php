<?php require RUTA_APP . '/views/layout/header.php'; ?>

<!-- Contenedor principal con la imagen de fondo -->
<div class="container-fluid d-flex justify-content-center align-items-center" style="min-height: 100vh; background: url('<?php echo RUTA_URL; ?>/public/img/IMGDeFondo.jpg') no-repeat center center fixed; background-size: cover; background-position: center;">
    <div class="card shadow-lg p-5 rounded-4" style="width: 100%; max-width: 450px; background-color: rgba(255, 255, 255, 0.75); border: none;">
        <h3 class="text-center mb-4 text-primary fw-bold">Acceso a la Universidad</h3>

        <!-- Error de login -->
        <?php if (!empty($data['errorLogin'])): ?>
            <div class="alert alert-danger text-center">
                <?php echo $data['errorLogin']; ?>
            </div>
        <?php endif; ?>

        <!-- Formulario de Login -->
        <form action="<?php echo RUTA_URL; ?>/AuthController/loginUsuario" method="POST">
            <div class="mb-3">
                <label for="Email" class="form-label text-dark">Correo Electrónico</label>
                <input type="email" name="Email" id="Email" class="form-control rounded-pill border-0 shadow-sm" placeholder="Ingrese su email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label text-dark">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control rounded-pill border-0 shadow-sm" placeholder="Ingrese su contraseña" required>
            </div>

            <!-- Botón de login -->
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary rounded-pill py-2 fw-bold">Ingresar</button>
                <a href="<?php echo RUTA_URL; ?>/AuthController/olvide" class="d-block text-center text-decoration-none text-muted">¿Olvidaste tu contraseña?</a>
            </div>
        </form>

        <!-- Botón para regresar a la página principal -->
        <div class="d-grid gap-2 mt-3">
            <a href="<?php echo RUTA_URL; ?>" class="btn btn-outline-secondary rounded-pill py-2">Volver a la Landing Page</a>
        </div>
    </div>
</div>

<?php require RUTA_APP . '/views/layout/footer.php'; ?>
