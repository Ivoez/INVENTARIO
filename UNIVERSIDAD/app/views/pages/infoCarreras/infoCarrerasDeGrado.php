<div style="background-image: url('../img/uniDefondo.jpg'); background-size: cover; background-position: center; background-attachment: fixed;">
  <?php require RUTA_APP . '/views/layout/header.php'; ?>

  <!-- Botón de volver al inicio -->
  <div class="container mt-4">
    <a href="<?php echo RUTA_URL; ?>" class="btn-volver-inicio">
      🏠 Volver al Inicio
    </a>
  </div>

  <div class="container my-5">
    <div class="row" id="courseContainer">
      <?php if (!empty($data['infoCarrerasDeGrado'])): ?>
        <?php foreach ($data['infoCarrerasDeGrado'] as $infoCarrerasDeGrado): ?>
          <div class="col-md-4 mb-4">
            <div class="card course-card"
              data-title="<?php echo $infoCarrerasDeGrado['titulo']; ?>"
              data-image="<?php echo RUTA_URL . '/public/img/' . $infoCarrerasDeGrado['imagen']; ?>"
              data-description="<?php echo $infoCarrerasDeGrado['descripcion']; ?>"
              data-full-description="<?php echo htmlspecialchars($infoCarrerasDeGrado['descripcionCompleta'], ENT_QUOTES, 'UTF-8'); ?>"
              onclick="openCourse(this)">
              <img src="<?php echo RUTA_URL . '/public/img/' . $infoCarrerasDeGrado['imagen']; ?>" class="card-img-top" alt="<?php echo $infoCarrerasDeGrado['titulo']; ?>">
              <div class="card-body">
                <h5 class="card-title"><?php echo $infoCarrerasDeGrado['titulo']; ?></h5>
                <p class="card-text"><?php echo $infoCarrerasDeGrado['descripcion']; ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>No hay carreras de postgrado disponibles en este momento.</p>
      <?php endif; ?>
    </div>
  </div>

  <div id="mySidebar" class="sidebar" aria-hidden="true">
    <a href="javascript:void(0)" class="closebtn" onclick="closeCourse()">&times;</a>
    <h3 id="courseTitle"></h3>
    <img id="courseImage" class="course-image" src="" alt="">
    <p id="courseDescription"></p>
  </div>

  <!-- Ruta JS -->
  <script src="<?php echo RUTA_URL; ?>/public/js/infoSidebar.js"></script>

  <?php require RUTA_APP . '/views/layout/footer.php'; ?>
</div>
