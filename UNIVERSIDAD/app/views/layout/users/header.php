<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="<?php echo RUTA_URL?>/css/style.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
   <link rel="stylesheet" href="<?php echo RUTA_URL?>/public/css/infoStyle.css">
   <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public/css/stylesDashboard.css" />
   <link rel="icon" href="<?php echo RUTA_URL?>/public/img/utnBlanco.png" type="image/x-icon">
   <!--Icono de la pestaña -->
   <title><?php echo NOMBRESITIO;?> </title>
</head>
<body>

   <!--Header -->
<header>
    <!--Navegador -->
        <nav id="navegadorPaginaPrincipal" class="navbar navbar-expand-lg py-2 px-3 mb-1">
            <div class="dropdown me-5">
             <img src="<?php echo RUTA_URL; ?>/img/utnBlanco.png" alt="LogoIzq" class="me-2" style="width: 90px; height: 90px;"> 
            </div> 

                    <!-- Botón hamburguesa -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
             aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>




            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto mb-0"> 
                <?php switch($_SESSION['tipoUsuario']){
                case 'admin':
                ?>
                <li class="nav-item">
                  <a style="color: white;" class="nav-link nav-button " href="<?php echo RUTA_URL; ?>/AdminController/agregarCarrera">Agregar Carrera</a>
                </li>
                <li class="nav-item">
                  <a style="color: white;" class="nav-link nav-button" href="<?php echo RUTA_URL; ?>/MateriaController/crear">Agregar Materia</a>
                </li>
                <li class="nav-item">
                  <a style="color: white;" class="nav-link nav-button" href="<?php echo RUTA_URL; ?>/MateriaController/vincular">Planificación de Materias</a>
                </li>
                <?php 
                break;
                case 'Profesor':
                ?>
                <li class="nav-item">
                  <a class="nav-link  " href="#">Mis Materias</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link  " href="#">Mis Alumnos</a>
                </li>

                <?php 
                break;
                case 'Alumno':
                ?>
                <li class="nav-item">
                 <a class="nav-link text-dark fw-semibold" href="<?php echo RUTA_URL; ?>/AlumnoController/verCarreras">
                <i style="color: white;" class="bi bi-mortarboard-fill me-1"></i>Ver Carreras
                </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link text-dark fw-semibold" href="<?php echo RUTA_URL; ?>/AlumnoController/materias">
                    <i style="color: white;" class="bi bi-journal-text me-1"></i>Materias
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-dark fw-semibold" href="<?php echo RUTA_URL; ?>/AlumnoController/tareas">
                    <i style="color: white;" class="bi bi-list-task me-1"></i>Tareas
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-dark fw-semibold" href="<?php echo RUTA_URL; ?>/Alumno/asistencia">
                    <i style="color: white;" class="bi bi-check2-circle me-1"></i>Asistencia
                  </a>
                </li>
                <?php
                break;
                }
                ?>
              
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="perfilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle fs-4" style="color: white;"></i>
                  </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="perfilDropdown">
                  <li>
                    <a class="dropdown-item" href="<?php echo RUTA_URL; ?>/AuthController/verPerfilCambios">Mi Perfil</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?php echo RUTA_URL; ?>/AuthController/logout">Cerrar Sesión</a>
                  </li>
                </ul>
              </li>
              
              </ul>
            </div>
          </nav>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

          </body>
</header>