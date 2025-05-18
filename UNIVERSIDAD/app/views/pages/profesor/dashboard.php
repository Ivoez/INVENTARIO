<?php
if (!isset($_SESSION['tipoUsuario']) == 'Profesor') {
    // Si no está activo, redirige al login
    $this->view('pages/auth/login');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title>Dashboard Profesor</title>

    <!-- Bootstrap y Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public/css/stylesDashboard.css" />

    <!-- Ícono -->
    <link rel="icon" href="<?php echo RUTA_URL; ?>/public/img/utnBlanco.png" type="image/x-icon" />
</head>

<body>

    <!-- Header personalizado para Profesor -->
    <header class="shadow-sm bg-white">
        <nav class="navbar navbar-expand-lg py-3">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <i class="bi bi-person-badge-fill text-primary fs-3 me-2"></i>
                    <span class="fw-bold fs-5 text-dark">Panel Profesor</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarUsuario"
                    aria-controls="navbarUsuario" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarUsuario">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-semibold" href="<?php echo RUTA_URL; ?>/Profesor/materias">
                                <i class="bi bi-journal-text me-1"></i>Mis Materias
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-semibold" href="<?php echo RUTA_URL; ?>/Profesor/evaluaciones">
                                <i class="bi bi-card-checklist me-1"></i>Evaluaciones
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-semibold" href="<?php echo RUTA_URL; ?>/Profesor/asistencia">
                                <i class="bi bi-check2-square me-1"></i>Registrar Asistencia
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-danger ms-3" href="<?php echo RUTA_URL; ?>/AuthController/logout">
                                <i class="bi bi-box-arrow-right me-1"></i>Salir
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Contenido principal -->
    <div class="container-fluid px-3 mt-4">

        <h3 class="mb-4">Bienvenido, <?php echo htmlspecialchars($_SESSION['Nombre']); ?> (<?php echo htmlspecialchars($_SESSION['tipoUsuario']); ?>)</h3>

        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-journal-text fs-2 text-primary me-3"></i>
                        <div>
                            <h6 class="mb-0">Mis Materias</h6>
                            <small>3 asignadas</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-calendar-check fs-2 text-success me-3"></i>
                        <div>
                            <h6 class="mb-0">Próxima clase</h6>
                            <small>Martes 10:00hs</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-clipboard-data fs-2 text-warning me-3"></i>
                        <div>
                            <h6 class="mb-0">Evaluaciones pendientes</h6>
                            <small>2 por corregir</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-bar-chart-line fs-2 text-info me-3"></i>
                        <div>
                            <h6 class="mb-0">Resumen académico</h6>
                            <small>Actualizado al día</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gráfico de avance -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-light">
                <h6 class="mb-0">Avance de Evaluaciones</h6>
            </div>
            <div class="card-body">
                <canvas id="avanceChart" height="100"></canvas>
            </div>
        </div>

        <!-- Tareas recientes -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-light">
                <h6 class="mb-0">Actividades Recientes</h6>
            </div>
            <div class="card-body">
                <ul>
                    <li>📌 Subiste calificaciones de Álgebra - 15/05/2025</li>
                    <li>📌 Registraste asistencia en Física</li>
                    <li>📌 Programaste nueva evaluación en Programación</li>
                </ul>
            </div>
        </div>

        <!-- Noticias institucionales -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-light">
                <h6 class="mb-0">Novedades institucionales</h6>
            </div>
            <div class="card-body">
                <ul>
                    <li>📢 Capacitación docente el 22/05</li>
                    <li>📅 Reunión de cátedra - viernes 24</li>
                    <li>📝 Evaluaciones globales desde 01/06</li>
                </ul>
            </div>
        </div>

        <div class="mt-4">
            <a class="btn btn-primary" href="#">Exportar Reporte</a>
            <a class="btn btn-danger ms-3" href="<?php echo RUTA_URL; ?>/AuthController/logout">Cerrar Sesión</a>
        </div>

    </div>

    <!-- Footer -->
    <?php require RUTA_APP . '/views/layout/footer.php'; ?>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('avanceChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Álgebra', 'Matematica', 'Programación'], //Materias para cambiar segun las que asignemos en DataBase
                datasets: [{
                    label: 'Evaluaciones corregidas (%)',
                    data: [80, 65, 90],
                    backgroundColor: ['#0d6efd', '#198754', '#ffc107'],
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        max: 100,
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
