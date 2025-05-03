<!-- usuarios/olvide.php -->
<?php require RUTA_APP . '/views/layout/header.php'; ?>

<div class="olvide-box">
    <h2>¿Olvidaste tu contraseña?</h2>
    <?php if (!empty($data['error'])): ?>
        <p class="error"><?php echo $data['error']; ?></p>
    <?php endif; ?>
    <?php if (!empty($data['success'])): ?>
        <p class="success"><?php echo $data['success']; ?></p>
    <?php endif; ?>
    <form action="<?php echo RUTA_URL; ?>/AuthController/enviarCorreo" method="POST">
        <input type="email" name="email" placeholder="Correo electrónico" required>
        <button type="submit">Enviar enlace de recuperación</button>
    </form>
</div>

<?php require RUTA_APP . '/views/layout/footer.php'; ?>
