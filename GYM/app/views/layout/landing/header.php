<?php
  $css = isset($estiloPagina) ? $estiloPagina : 'style.css';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>GYM</title>
  <link rel="icon" href="public/img/favicon.png" type="image/x-icon" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Share+Tech+Mono&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:ital,wght@0,100..900;1,100..900&family=Share+Tech+Mono&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="public/css/style.css" />
  <link rel="stylesheet" href="<?php echo RUTA_URL . '/public/css/' . $css; ?>" />
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark custom-navbar mb-4">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="public/img/logogymtransparent.png" alt="Logo GYM" />
        <span>GYM-UNLZ</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarGYM" aria-controls="navbarGYM" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarGYM">
        <ul class="navbar-nav ms-auto me-2">
          <li class="nav-item">
            <a class="nav-link active" href="#">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Socios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Actividades</a>
          </li>
        </ul>

        <a href="/appweb_caba_1c_2025/GYM/public/register" target="" class="btn btn-outline-light btn-rounded d-flex align-items-center">
          <svg viewBox="0 0 24 24" class="arr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24">
            <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"/>
          </svg>
          <span class="btn-text ms-2">Registrarse</span>
          <span class="btn-circle ms-2"></span>
          <svg viewBox="0 0 24 24" class="arr-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24">
            <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"/>
          </svg>
        </a>
      </div>
    </div>
  </nav>

  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
