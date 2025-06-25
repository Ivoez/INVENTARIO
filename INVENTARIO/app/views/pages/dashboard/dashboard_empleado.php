<?php require RUTA_APP . '/views/layout/header_dashboard.php'; ?>

<script>  //carga de js
  const RUTA_URL = "<?php echo RUTA_URL; ?>";
</script>
<script src="<?php echo RUTA_URL; ?>/js/main.js"></script>

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
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="container-fluid px-4 mt-4"> </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseClientes" aria-expanded="false" aria-controls="collapseClientes">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                                Usuarios
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
<div class="row" id="tarjetasDashboard"> <div class="col-xl-4 col-md-4 mb-4">
        <div class="card card-proveedores text-white mb-4">
            <div class="card-body d-flex flex-column align-items-start"> 
                
                <div class="d-flex justify-content-between align-items-center w-100">
                    <span class="fs-4">Proveedores</span>
                    <i class="fa-solid fa-users fs-1"></i> </div>

                <div class="fs-1 fw-bold mt-2 ms-3" id="cantidadProveedores">
    
</div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card card-productos text-white mb-4">
            <div class="card-body d-flex flex-column align-items-start"> 
                <div class="d-flex justify-content-between align-items-center w-100">
                    <span class="fs-4">Productos en stock</span>
                    <i class="fas fa-cubes fs-1"></i> </div>

                <div class="fs-1 fw-bold mt-2 ms-3" id="cantidadProductos">
    
</div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card card-ordenes text-white mb-4">
            <div class="card-body d-flex flex-column align-items-start"> 
                <div class="d-flex justify-content-between align-items-center w-100">
                    <span class="fs-4">Órdenes de compra</span>
                    <i class="fa-solid fa-file-invoice-dollar fs-1"></i> </div>
                <div class="fs-1 fw-bold mt-2 ms-3">
                    123
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card card-clientes text-white mb-4"> 
            <div class="card-body d-flex flex-column align-items-start"> 
                <div class="d-flex justify-content-between align-items-center w-100">
                    <span class="fs-4">Usuarios</span>
                    <i class="fa-solid fa-user fs-1"></i> </div>

                <div class="fs-1 fw-bold mt-2 ms-3" id="cantidadClientes">
    
</div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card card-movimientos text-white mb-4"> 
            <div class="card-body d-flex flex-column align-items-start"> 
                <div class="d-flex justify-content-between align-items-center w-100">
                    <span class="fs-4">Movimientos de stock</span>
                    <i class="fa-solid fa-dolly fs-1"></i> </div>
                <div class="fs-1 fw-bold mt-2 ms-3">
                    123
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card card-reportes text-white mb-4"> 
            <div class="card-body d-flex flex-column align-items-start"> 
                <div class="d-flex justify-content-between align-items-center w-100">
                    <span class="fs-4">Reportes</span>
                    <i class="fas fa-chart-line fs-1"></i> </div>
                <div class="fs-1 fw-bold mt-2 ms-3">
                    123
                </div>
            </div>
        </div>
    </div>

</div>

                        <div id="formularioDinamico" class="mt-4"></div> <!-- js va insertar el formulario aca sin tener que recargar la pagina -->

                </main>

    </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    <?php require RUTA_APP . '/views/layout/footer.php'; ?>
            </div>
        </div>
