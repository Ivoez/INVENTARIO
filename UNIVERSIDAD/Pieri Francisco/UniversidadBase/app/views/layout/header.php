<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo NOMBRE_SITIO; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<nav class="navbar navbar-expand-lg  px-3" style="background-color:rgb(14, 138, 226);">
  <!-- Icono de usuario -->
  <div class="dropdown me-5">
    <a class="user-icon dropdown-toggle" href="#" role="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false" style="color:rgb(200, 230, 252);">
      <i class="bi bi-person-circle"></i>
    </a>
    <ul class="dropdown-menu" aria-labelledby="userMenu" >
      <li><a class="dropdown-item" href="#">Perfil</a></li>
      <li><a class="dropdown-item" href="#">Configuración</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
    </ul>
  </div>

  <!-- Botón de menú responsive -->
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Enlaces del navbar -->
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto"> <!-- Alineación a la derecha -->
      <li class="nav-item">
        <a class="nav-link active text-white" href="#">Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Tablero</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Mis cursos</a>
      </li>
    </ul>
  </div>
</nav>

<!-- Iconos de Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
