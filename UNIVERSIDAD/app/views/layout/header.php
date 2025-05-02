<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="<?php echo RUTA_URL?>/public/css/style.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
   <link rel="stylesheet" href="<?php echo RUTA_URL?>/public/css/style.css">
   <!--Icono de la pestaña -->
   <link rel="icon" href="<?php echo RUTA_URL?>/img/logoUniversidad.png" type="image/x-icon">
   <title><?php echo NOMBRESITIO;?> </title>
</head>
<body>

   <!--Header -->
<header>
    <!--Navegador -->
        <nav id="navegadorPaginaPrincipal" class="navbar navbar-expand-lg py-2 px-3 mb-1">
            <div class="dropdown me-5">
            <a class="user-icon" href="<?php echo RUTA_URL; ?>" role="button" id="userMenu">
             <img src="<?php echo RUTA_URL; ?>/img/logoUniversidad.png" alt="LogoIzq" class="me-2 rounded-circle" style="width: 60px; height: 60px;">
            </a>
            </div> 

                    <!-- Botón hamburguesa -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
             aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>




            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto mb-0"> 
                <li class="nav-item">
                <li class="nav-item">
                <li class="nav-item">
                <li class="nav-item">
            <a class="nav-link" href="<?php echo RUTA_URL; ?>/usuarios/login">Ingresar</a>
            </li>

              </li>


              </li>
                <li class="nav-item">
                  <a class="nav-link  " href="#universidadInfo">Informacion</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link  " href="#footerinfo">Contactanos</a>
                </li>
              </ul>
            </div>
          </nav>
</header>