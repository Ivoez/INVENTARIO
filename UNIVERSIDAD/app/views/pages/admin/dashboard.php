<?php
if (!isset($_SESSION['tipoUsuario']) == 'admin') {
    // Si no está activo, redirige al login
    $this->view('pages/auth/login');
    exit;
}
?>
<?php require RUTA_APP . '/views/layout/header.php'; ?>


<h1>Hola <?php echo $data['Nombre']; ?>, <?php echo $data['tipoUsuario']?></h1>

<a class="nav-link" href="<?php echo RUTA_URL; ?>/AuthController/logout">Cerrar Sesion</a>
<?php require RUTA_APP . '/views/layout/footer.php'; ?>