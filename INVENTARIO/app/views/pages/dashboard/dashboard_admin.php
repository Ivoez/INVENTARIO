<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/style2.css">
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

<?php require RUTA_APP . '/views/layout/header.php'; ?>
    <section class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
        <img src="<?php echo RUTA_URL; ?>/Imagenes/InventarioIconoImagen.png" alt="Icono" width="40" height="40" style="object-fit: contain;">
            <a class="navbar-brand ps-3" href="Dashboard.html">Logistica RST</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Buscar..." aria-label="Buscar..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
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
                        <li><a class="dropdown-item" href="#!">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseClientes" aria-expanded="false" aria-controls="collapseClientes">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-users-rectangle"></i></div>
                                Clientes
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseClientes" aria-labelledby="headingClientes" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="clientes-listado.html">Listado</a>
                                    <a class="nav-link" href="clientes-agregar.html">Agregar</a>
                                </nav>
                            </div>
                            <!--  -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-cubes"></i></div>
                                Gestión de productos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Listado</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Movimiento de stock</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Agregar</a>
                                </nav>
                            </div>
                            <!--  -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProveedores" aria-expanded="false" aria-controls="collapseProveedores">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                                Gestión de usuarios
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseProveedores" aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Listado</a>
                                    <a class="nav-link" href="<?php echo RUTA_URL ?>/AuthController/register">Agregar</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Buscar usuarios</a>
                                </nav>
                            </div>
                            <!--  -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProveedores" aria-expanded="false" aria-controls="collapseProveedores">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                                Gestión de proveedores
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseProveedores" aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Listado</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Agregar</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Emitir una orden de compra</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">

                        <ol class="breadcrumb mb-4">

                        </ol>
                        <div class="row">
                        <div class="col-xl-4 col-md-6">
                            <div class="card card-proveedores text-white mb-4">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <span class="fs-4">Proveedores</span>
                                    <i class="fa-solid fa-users fs-1"></i> <!-- ícono -->
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6">
                            <div class="card card-productos text-white mb-4">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <span class="fs-4">Productos en stock</span>
                                    <i class="fas fa-cubes fs-1"></i> <!-- ícono -->
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6">
                            <div class="card card-ordenes text-white mb-4">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <span class="fs-4">Órdenes de compra</span>
                                    <i class="fa-solid fa-file-invoice-dollar fs-1"></i> <!-- ícono -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card card-clientes text-white mb-4">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <span class="fs-4">Clientes</span>
                                    <i class="fa-solid fa-users-rectangle fs-1"></i> <!-- ícono -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card card-movimientos text-white mb-4">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <span class="fs-4">Movimientos de stock</span>
                                    <i class="fa-solid fa-dolly fs-1"></i> <!-- ícono -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card card-reportes text-white mb-4">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <span class="fs-4">Reportes</span>
                                    <i class="fa-solid fa-file-contract fs-1"></i> <!-- ícono -->
                                </div>
                            </div>
                        </div>
                </main>
</section>

<?php require RUTA_APP . '/views/layout/footer.php'; ?>


