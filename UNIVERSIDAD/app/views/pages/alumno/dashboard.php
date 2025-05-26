<?php
if (!isset($_SESSION['tipoUsuario']) || $_SESSION['tipoUsuario'] !== 'Alumno') {
    header('Location: ' . RUTA_URL . '/auth/login');
    exit;
}
if (!isset($grado)) $grado = [];
if (!isset($postgrado)) $postgrado = [];
if (!isset($cursos)) $cursos = [];
?>
<?php if (isset($mensaje)): ?>
  <div class="alert alert-success"><?php echo $mensaje; ?></div>
<?php endif; ?>

<?php if (isset($error)): ?>
  <div class="alert alert-danger"><?php echo $error; ?></div>
<?php endif; ?>


<?php require RUTA_APP . '/views/layout/users/header.php'; ?>

<?php if (isset($mensaje)): ?>
  <div class="alert alert-success"><?php echo $mensaje; ?></div>
<?php endif; ?>

    <!-- Estilos del dashboard del stylesDashboard.css -->
     <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public/css/stylesDashboard.css">



<div class="container-fluid px-3 mt-4">

    <h3 class="mb-4">Bienvenido, <?php echo htmlspecialchars($_SESSION['Nombre']); ?> (<?php echo htmlspecialchars($_SESSION['tipoUsuario']); ?>)</h3>

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-light">
                    <h6 class="mb-0">Carreras de Grado</h6>
                </div>
                <div class="card-body">
                    <?php if (!empty($grado)): ?>
                        <?php foreach ($grado as $carrera): ?>
                            <div class="mb-3">
                                <h6 class="fw-bold"><?php echo htmlspecialchars($carrera->nombreCarrera); ?></h6>
                                <p class="mb-2"><?php echo htmlspecialchars($carrera->descripcionMuestra); ?></p>
                                <form action="<?php echo RUTA_URL; ?>/AlumnoController/inscribirseCarrera" method="POST">
                                    <input type="hidden" name="idCarrera" value="<?php echo $carrera->idCarrera; ?>">
                                    <button type="submit" class="btn btn-success btn-sm w-100">Inscribirse</button>
                                </form>
                            </div>
                            <hr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="alert alert-info text-center">
                            No hay carreras de grado disponibles.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-light">
                    <h6 class="mb-0">Carreras de Posgrado</h6>
                </div>
                <div class="card-body">
                    <?php if (!empty($postgrado)): ?>
                        <?php foreach ($postgrado as $carrera): ?>
                            <div class="mb-3">
                                <h6 class="fw-bold"><?php echo htmlspecialchars($carrera->nombreCarrera); ?></h6>
                                <p class="mb-2"><?php echo htmlspecialchars($carrera->descripcionMuestra); ?></p>
                                <form action="<?php echo RUTA_URL; ?>/AlumnoController/inscribirseCarrera" method="POST">
                                    <input type="hidden" name="idCarrera" value="<?php echo $carrera->idCarrera; ?>">
                                    <button type="submit" class="btn btn-success btn-sm w-100">Inscribirse</button>
                                </form>
                            </div>
                            <hr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="alert alert-info text-center">
                            No hay carreras de posgrado disponibles.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-light">
                    <h6 class="mb-0">Cursos</h6>
                </div>
                <div class="card-body">
                    <?php if (!empty($cursos)): ?>
                        <?php foreach ($cursos as $curso): ?>
                            <div class="mb-3">
                                <h6 class="fw-bold"><?php echo htmlspecialchars($curso->nombreCarrera); ?></h6>
                                <p class="mb-2"><?php echo htmlspecialchars($curso->descripcionMuestra); ?></p>
                                <form action="<?php echo RUTA_URL; ?>/AlumnoController/inscribirseCarrera" method="POST">
                                    <input type="hidden" name="idCarrera" value="<?php echo $curso->idCarrera; ?>">
                                    <button type="submit" class="btn btn-success btn-sm w-100">Inscribirse</button>
                                </form>
                            </div>
                            <hr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="alert alert-info text-center">
                            No hay cursos disponibles.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Tareas pendientes -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-light">
            <h6 class="mb-0">Tareas Pendientes</h6>
        </div>
        <div class="card-body">
            <ul>
                <li>📌 Informe biología - entrega 25/05/2025</li>
                <li>📌 Proyecto matemáticas - entrega 30/05/2025</li>
                <li>📌 Leer capítulo 5 literatura</li>
            </ul>
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

    <div class="mt-4">
        <a class="btn btn-primary" href="#">Descargar Reporte</a>
    </div>

</div>

</body>
</html>
