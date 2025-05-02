<?php require RUTA_APP . '/views/layout/header.php'; ?>

<div class="container mt-5" style="max-width: 400px;">
    <h2 class="text-center mb-4">Login Universidad</h2>

    <?php if (!empty($datos['error'])): ?>
        <div class="alert alert-danger text-center">
            <?php echo $datos['error']; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo RUTA_URL; ?>/usuarios/login">
        <div class="mb-3">
            <input type="text" name="username" class="form-control" placeholder="Usuario" required>
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Ingresar</button>
    </form>
</div>

<?php require RUTA_APP . '/views/layout/footer.php'; ?>
