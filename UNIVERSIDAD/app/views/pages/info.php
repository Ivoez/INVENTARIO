<?php require RUTA_APP .'/views/layout/header.php';?>

<!-- CSS Y BOOTSTRAP 4.5.2 -->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo RUTA_URL?>/public/css/infoStyle.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <title><?php echo $data['title']; ?></title>
</head>
<body>
 
  <div class="container my-5">
    <div class="row" id="courseContainer">
      <!-- Los cursos se generan automáticamente en esta parte -->
    </div>
  </div>

  <!-- Sidebar (Menu lateral) -->
  <div id="mySidebar" class="sidebar" aria-hidden="true">
    <a href="javascript:void(0)" class="closebtn" onclick="closeCourse()">&times;</a>
    <h3 id="courseTitle"></h3>
    <img id="courseImage" class="course-image" src="" alt="">
    <p id="courseDescription"></p>
  </div>

  <!-- Ruta JS -->
  <script src="<?php echo RUTA_URL?>/public/js/script.js" defer></script>


<?php require RUTA_APP .'/views/layout/footer.php';?>
