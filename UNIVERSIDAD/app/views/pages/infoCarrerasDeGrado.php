<?php require RUTA_APP .'/views/layout/header.php';?>

<!-- CSS Y BOOTSTRAP 4.5.2 -->
<head>
<link rel="stylesheet" href="<?php echo RUTA_URL?>/public/css/infoStyle.css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<title class="text-center mb-0"><?php echo $data['title']; ?></title>
</head>
 
<div id="CarrerasDeGradoContainer" class="row"></div>

<!-- Sidebar (Menu lateral) -->
<div id="mySidebar" class="sidebar" aria-hidden="true">
    <a href="javascript:void(0)" class="closebtn" onclick="closeCourse()">&times;</a>
    <h3 id="CarrerasDeGradoTitle"></h3>
    <img id="CarrerasDeGradoImage" class="CarreraDeGrado-image" src="" alt="">
    <p id="courseDescription"></p>
  </div>

  <!-- Ruta JS -->
<script src="<?php echo RUTA_URL?>/public/js/scriptCarrerasGrado.js"></script>
<?php require RUTA_APP .'/views/layout/footer.php';?>