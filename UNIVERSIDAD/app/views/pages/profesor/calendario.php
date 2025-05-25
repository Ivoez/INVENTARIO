<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Calendario de Clases</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public/css/stylesDashboard.css" />
    <link rel="icon" href="<?php echo RUTA_URL; ?>/public/img/utnBlanco.png" type="image/x-icon" />
</head>

<body>

    <!-- HEADER PROFESOR -->
    <header class="shadow-sm bg-white">
        <nav class="navbar navbar-expand-lg py-3">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <i class="bi bi-person-badge-fill text-primary fs-3 me-2"></i>
                    <span class="fw-bold fs-5 text-dark">Panel Profesor</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarUsuario">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarUsuario">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-semibold" href="<?php echo RUTA_URL; ?>/Pages/materias">
                                <i class="bi bi-journal-text me-1"></i>Mis Materias
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-semibold" href="<?php echo RUTA_URL; ?>/Pages/evaluaciones">
                                <i class="bi bi-card-checklist me-1"></i>Evaluaciones
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-semibold" href="<?php echo RUTA_URL; ?>/Pages/calendario">
                                <i class="bi bi-check2-square me-1"></i>Calendario de Clases
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

    <!-- CONTENIDO PRINCIPAL -->
    <div class="container mt-4">
        <h3 class="mb-4"><i class="bi bi-calendar3 me-2"></i>Calendario de Clases</h3>

        <div class="row g-4">
            <!-- Repite esta tarjeta para cada día/semana de clases -->
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-calendar-event me-2 text-primary"></i>Lunes 27 Mayo</h5>
                        <ul class="list-group list-group-flush mt-3">
                            <li class="list-group-item">
                                <strong>08:00 - 09:30</strong> — Física 1 (Aula 12)
                            </li>
                            <li class="list-group-item">
                                <strong>10:00 - 11:30</strong> — Matemática 2 (Aula 15)
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Otro día -->
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-calendar-event me-2 text-primary"></i>Martes 28 Mayo</h5>
                        <ul class="list-group list-group-flush mt-3">
                            <li class="list-group-item">
                                <strong>09:00 - 10:30</strong> — Química (Aula 8)
                            </li>
                            <li class="list-group-item">
                                <strong>11:00 - 12:30</strong> — Laboratorio (Lab 1)
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Puedes seguir agregando más días -->
        </div>
    </div>

    <!-- FOOTER -->
    <?php require RUTA_APP . '/views/layout/footer.php'; ?>

    <!-- JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
