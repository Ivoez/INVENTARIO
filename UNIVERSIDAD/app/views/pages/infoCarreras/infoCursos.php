<div style="background-image: url('../img/uniDefondo.jpg'); background-size: cover; background-position: center; background-attachment: fixed;">
<?php require RUTA_APP . '/views/layout/header.php'; ?>

<div class="container my-5">
  <div class="row" id="courseContainer">
    <?php if (!empty($data['cursos'])): ?>
      <?php foreach ($data['cursos'] as $curso): ?>
        <div class="col-md-4 mb-4">
          <div class="card course-card"
               data-title="<?php echo $curso['titulo']; ?>"
               data-image="<?php echo RUTA_URL . '/public/img/' . $curso['imagen']; ?>"
               data-description="<?php echo $curso['descripcion']; ?>"
               data-full-description="<?php echo htmlspecialchars($curso['descripcionCompleta'], ENT_QUOTES, 'UTF-8'); ?>"
               onclick="openCourse(this)">
               <img src="<?php echo RUTA_URL . '/public/img/' . $curso['imagen']; ?>" class="card-img-top" alt="<?php echo $curso['titulo']; ?>">
            <div class="card-body">
              <h5 class="card-title"><?php echo $curso['titulo']; ?></h5>
              <p class="card-text"><?php echo $curso['descripcion']; ?></p>
              <!-- Botón Ver Más que abre el sidebar -->
              
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p>No hay cursos disponibles en este momento.</p>
    <?php endif; ?>
  </div>
</div>

<div id="mySidebar" class="sidebar" aria-hidden="true">
  <a href="javascript:void(0)" class="closebtn" onclick="closeCourse()">&times;</a>
  <h3 id="courseTitle"></h3>
  <img id="courseImage" class="course-image" src="" alt="">
  <p id="courseDescription"></p>
</div>

<!-- Ruta JS externa (si todavía la necesitás) -->
<script src="<?php echo RUTA_URL?>/public/js/infoSidebar.js"></script>

<?php require RUTA_APP .'/views/layout/footer.php';?>
    </div>