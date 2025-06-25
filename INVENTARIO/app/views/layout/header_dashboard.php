<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard</title>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo RUTA_URL; ?>/Imagenes/InventarioIcono.ico">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/style2.css">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>

<body class="sb-nav-fixed"> <!-- ✅ El header debe ir dentro del body -->

<header>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-black">
            <!-- Navbar Brand-->
        <img src="<?php echo RUTA_URL; ?>/Imagenes/InventarioIconoImagen.png" alt="Icono" width="40" height="40" style="object-fit: contain; margin-left: 35px;">
            <a class="navbar-brand ps-3" href="<?php echo RUTA_URL; ?>/Pages/dashboardAdmin">Logistica RST</a>
            <!-- -->
            <form class="d-none d-md-inline-block ms-auto me-0 me-md-3 my-2 my-md-0" role="search">
                <div class="input-group">

                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Ajustes</a></li>
                        <li><a class="dropdown-item" href="#!">Registro de actividad</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="<?php echo RUTA_URL; ?>/AuthController/logout">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
</header>