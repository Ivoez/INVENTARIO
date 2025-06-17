<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/style2.css">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo RUTA_URL; ?>/Imagenes/InventarioIcono.ico">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Special+Gothic+Expanded+One&display=swap">
  <script src="<?php echo RUTA_URL ?>/public/js/main.js" defer></script>
  <!--ENLACE A JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  <!--ENLACE A BS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <title><?php echo NOMBRESITIO; ?></title>
</head>

<body> <!-- ✅ El header debe ir dentro del body -->

<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-black px-4 py-2 shadow">
    <div class="container-fluid d-flex align-items-center">
      <a class="navbar-brand d-flex align-items-center gap-3" href="<?php echo RUTA_URL; ?>/Pages/Landing">
        <img src="<?php echo RUTA_URL; ?>/Imagenes/InventarioIconoImagen.png" alt="Icono" width="40" height="40" style="object-fit: contain;">
        <span class="fs-4 fw-semibold">Logística RST</span>
      </a>
    </div>
  </nav>
</header>