<?php require RUTA_APP . '/views/layout/users/header.php'; ?>

<?php if (isset($_SESSION['mensaje'])): ?>
    <div class="alert alert-success text-center">
        <?php echo $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger text-center">
        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
    </div>
<?php endif; ?>

<!-- Enlace al CSS externo -->
<link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public/css/stylesDashboard.css">

<div class="container py-5">
    <h2 class="mb-4 text-center">Bienvenido, <?php echo htmlspecialchars($data['Nombre']); ?></h2>

    <?php if (isset($mensaje)): ?>
        <div class="alert alert-success text-center"><?php echo $mensaje; ?></div>
    <?php endif; ?>

    <?php
    $tipos = ['Grado', 'Posgrado', 'Curso'];
    $colores = ['Grado' => 'primary', 'Posgrado' => 'warning', 'Curso' => 'info'];
    ?>

    <?php foreach ($tipos as $tipo): ?>
        <h3 class="text-capitalize"><?php echo $tipo; ?></h3>
        <div class="row g-4">
            <?php 
            $hayCarreras = false;
            foreach ($data['carreras'] as $carrera): 
                if ($carrera->tipoCarrera == $tipo):
                    $hayCarreras = true;
            ?>
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <img src="<?php echo RUTA_IMG_CARRERA . $carrera->rutaImagenMuestra; ?>" class="card-img-top" alt="Imagen de <?php echo htmlspecialchars($carrera->nombreCarrera); ?>">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="card-title mb-0"><?php echo htmlspecialchars($carrera->nombreCarrera); ?></h5>
                            <span class="badge bg-<?php echo $colores[$tipo]; ?> badge-tipo"><?php echo $tipo; ?></span>
                        </div>
                        <p class="card-text small text-muted"><?php echo htmlspecialchars($carrera->descripcionMuestra); ?></p>
                        <a href="<?php echo RUTA_URL; ?>/AlumnoController/inscribirse/<?php echo $carrera->idCarrera; ?>" class="btn btn-<?php echo $colores[$tipo]; ?> btn-inscribirse mt-auto">Inscribirme</a>
                    </div>
                </div>
            </div>
            <?php 
                endif;
            endforeach; 
            if (!$hayCarreras): 
            ?>
                <div class="col">
                    <div class="alert alert-light text-center w-100 border">No hay carreras de <?php echo strtolower($tipo); ?> disponibles.</div>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>

