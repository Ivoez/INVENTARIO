<?php require RUTA_APP .'/views/layout/header.php';?>

<!-- CSS Y BOOTSTRAP 4.5.2 -->
<head>
<link rel="stylesheet" href="<?php echo RUTA_URL?>/public/css/infoStyle.css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<title class="text-center mb-0"><?php echo $data['title']; ?></title>
</head>
 
<div id="CarrerasDeGradoContainer" class="row"></div>
<!-- Fondo opaco (overlay) -->


<!-- Sidebar (Menu lateral) -->
<div id="mySidebar" class="sidebar" aria-hidden="true">
    <a href="javascript:void(0)" class="closebtn" onclick="closeCourse()">&times;</a>
    <h3 id="courseTitle"></h3> <!-- Corregido id -->
    <img id="courseImage" class="CarreraDeGrado-image" src="" alt=""> <!-- Corregido id -->
    <p id="courseDescription"></p> <!-- Corregido id -->
</div>
<div class="overlay" onclick="closeCourse()"></div>

  <!-- Ruta JS -->
<script src="<?php echo RUTA_URL?>/public/js/scriptCarrerasGrado.js"></script>
<?php require RUTA_APP .'/views/layout/footer.php';?>