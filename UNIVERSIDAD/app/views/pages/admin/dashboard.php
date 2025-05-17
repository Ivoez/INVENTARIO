<?php
if (!isset($_SESSION['tipoUsuario']) == 'admin') {
    // Si no está activo, redirige al login
    $this->view('pages/auth/login');
    exit;
}
?>
<!-- Cambiar mensaje-->
<?php if (isset($_SESSION['mensaje'])): ?>
    <div class="alert alert-success">
        <?= $_SESSION['mensaje'] ?>
    </div>
    <?php unset($_SESSION['mensaje']); // Borra el mensaje para que no aparezca siempre ?>
<?php endif; ?>
<!-- header para usuarios -->
<?php require RUTA_APP . '/views/layout/users/header.php'; ?>


<h1 style="color: white;">Hola <?php echo $_SESSION['Nombre']; ?>, <?php echo $_SESSION['tipoUsuario']?></h1>
