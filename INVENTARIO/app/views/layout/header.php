<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="<?php echo RUTA_URL?>/css/style.css">
   <link rel="shortcut icon" type="image/x-icon" href="<?php echo RUTA_URL; ?>/Imagenes/InventarioIcono.ico">

   <!--ENLACE A JS-->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

   <!--ENLACE A BS-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

   <title><?php echo NOMBRESITIO; ?></title>
</head>

<body> <!-- ✅ El header debe ir dentro del body -->

  <header>
    <!--barra de navegación-->
    <nav class="navbar-custom d-flex justify-content-between align-items-center px-4">
      <div class="d-flex align-items-center">
        <a href="<?php echo RUTA_URL; ?>/Pages/Landing">
          <img src="<?php echo RUTA_URL; ?>/Imagenes/InventarioIcono.ico" alt="Icono" class="icono me-4" width="40" height="40">
        </a>
        <h1 class="navbar-title text-white m-0" id="logoTitle">Logística RST</h1>
      </div>
      <div class="d-flex gap-3">
        <!-- botones si querés agregar -->
      </div>
    </nav>
  </header>



