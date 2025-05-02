<?php require RUTA_APP .'/views/layout/header.php'; ?>


<div class="container my-5">
  <div class="row" id="postGradoContainer">

  </div>
</div>

<!-- Sidebar que se muestra al hacer clic -->
<div id="mySidebar" class="sidebar" aria-hidden="true">
  <a href="javascript:void(0)" class="closebtn" onclick="closeCourse()">&times;</a>
  <h3 id="courseTitle"></h3>
  <img id="courseImage" class="course-image" src="" alt="">
  <p id="courseDescription"></p>
</div>

<!-- Archivo JS que contiene la lógica -->

<script src="<?php echo RUTA_URL?>/public/js/scriptPostGrado.js"></script>
<?php require RUTA_APP .'/views/layout/footer.php'; ?>
