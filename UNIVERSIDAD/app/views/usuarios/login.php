<?php require RUTA_APP . '/views/layout/header.php'; ?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="card shadow-lg p-4 rounded" style="width: 100%; max-width: 400px;">
        <h3 class="text-center mb-4">Acceso a la Universidad</h3>

        <?php if (!empty($data['error'])): ?>
            <div class="alert alert-danger text-center">
                <?phpecho $data['error']; ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo RUTA_URL; ?>/usuarios/login" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Usuario</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Ingrese su usuario" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese su contraseña" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Ingresar</button>
                <a href="<?php echo RUTA_URL; ?>/usuarios/olvide">¿Olvidaste tu contraseña?</a>


            </div>
        </form>
    </div>
</div>

<?php require RUTA_APP . '/views/layout/footer.php'; ?>
