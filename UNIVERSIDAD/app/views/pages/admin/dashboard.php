<?php
if (!isset($_SESSION['tipoUsuario']) == 'admin') {
    // Si no está activo, redirige al login
    $this->view('pages/auth/login');
    exit;
}
?>
<!-- header para usuarios -->
<?php require RUTA_APP . '/views/layout/users/header.php'; ?>


<h1>Hola <?php echo $data['Nombre']; ?>, <?php echo $data['tipoUsuario']?></h1>


<?php require RUTA_APP . '/views/layout/footer.php'; ?>