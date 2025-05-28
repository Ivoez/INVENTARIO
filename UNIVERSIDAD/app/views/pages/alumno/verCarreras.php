<?php require RUTA_APP . '/views/layout/users/header.php'; ?>
<?php if (isset($mensaje)): ?>
  <div class="alert alert-success"><?php echo $mensaje; ?></div>
<?php endif; ?>
<link rel="stylesheet" href="<?php echo RUTA_URL?>/public/css/styleAlumno.css">

<div class="container">
    <h2>Bienvenido, <?php echo htmlspecialchars($data['Nombre']); ?></h2>
    <h3>Carreras disponibles:</h3>

    <?php
    $tipos = ['Grado', 'Posgrado', 'Curso'];

    foreach ($tipos as $tipo) {
        echo "<h4>$tipo</h4><div class='row'>";
        foreach ($data['carreras'] as $carrera) {
            if ($carrera->tipoCarrera == $tipo) {
                echo "<div class='col-md-4'>
                        <div class='card mb-3'>
                            <img src='" . RUTA_IMG_CARRERA . $carrera->rutaImagenMuestra . "' class='card-img-top' alt='Imagen Carrera'>
                            <div class='card-body'>
                                <h5 class='card-title'>" . htmlspecialchars($carrera->nombreCarrera) . "</h5>
                                <p class='card-text'>" . htmlspecialchars($carrera->descripcionMuestra) . "</p>
                                <a href='" . RUTA_URL . "/AlumnoController/inscribirse/" . $carrera->idCarrera . "' class='btn btn-success'>Inscribirme</a>
                            </div>
                        </div>
                      </div>";
            }
        }
        echo "</div>";
    }
    ?>
</div>

