<?php
if (!isset($_SESSION['tipoUsuario']) == 'Cliente') {
    // Si no está activo, redirige al login
    $this->view('pages/auth/login');
    exit;
}
?>
<!-- header para usuarios -->
<?php require RUTA_APP . '/views/layout/users/header.php'; ?>

<!-- Contenido principal -->
<div class="container-fluid px-3">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <h3 class="mb-4">Bienvenido, <?php echo $data['Nombre']; ?> (<?php echo $data['tipoUsuario']; ?>)</h3>

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-journal-text fs-2 text-primary me-3"></i>
                    <div>
                        <h6 class="mb-0">Materias</h6>
                        <small>6 activas</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-calendar-event fs-2 text-success me-3"></i>
                    <div>
                        <h6 class="mb-0">Próxima clase</h6>
                        <small>Lunes 8:00hs</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-mortarboard fs-2 text-warning me-3"></i>
                    <div>
                        <h6 class="mb-0">Promedio</h6>
                        <small>7.8 general</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráfico de rendimiento -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-light">
            <h6 class="mb-0">Rendimiento Académico</h6>
        </div>
        <div class="card-body">
            <canvas id="rendimientoChart" height="100"></canvas>
        </div>
    </div>

    <!-- Noticias -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-light">
            <h6 class="mb-0">Novedades institucionales</h6>
        </div>
        <div class="card-body">
            <ul>
                <li>📢 Se habilitó la inscripción a finales.</li>
                <li>📅 El viernes 20 no habrá clases por mantenimiento.</li>
                <li>📝 Se publicó el cronograma de exámenes 2025.</li>
            </ul>
        </div>
    </div>
</div>



<h1>Hola <?php echo $data['Nombre']; ?>, <?php echo $data['tipoUsuario']?></h1>

<a class="nav-link" href="<?php echo RUTA_URL; ?>/AuthController/logout">Cerrar Sesion</a>
<?php require RUTA_APP . '/views/layout/footer.php'; ?>