<?php require RUTA_APP .'/views/layout/header.php';?>

<!-- CSS Y BOOTSTRAP 4.5.2 -->
<head>
<link rel="stylesheet" href="<?php echo RUTA_URL?>/public/css/infoStyle.css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<title class="text-center mb-0"><?php echo $data['title']; ?></title>
</head>
 
  <div class="container my-5">
    <div class="row" id="CarrerasDeGradoContainer">
      <!-- Los cursos se generan automáticamente en esta parte -->
    </div>
  </div>

  <!-- Sidebar (Menu lateral) -->
  <div id="mySidebar" class="sidebar" aria-hidden="true">
    <a href="javascript:void(0)" class="closebtn" onclick="closeCourse()">&times;</a>
    <h3 id="CarrerasDeGradoTitle"></h3>
    <img id="CarrerasDeGradoTitle" class="CarrerasDeGrado-image" src="" alt="">
    <p id="CarrerasDeGradoTitleDescription"></p>
  </div>

  <!-- Ruta JS -->
<script src="<?php echo RUTA_URL?>/public/js/scriptCarrerasGrado.js"></script>
<?php require RUTA_APP .'/views/layout/footer.php';?>