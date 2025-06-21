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
    <body class="sb-nav-fixed">
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
        </nav>

<script>  //carga de js
  const RUTA_URL = "<?php echo RUTA_URL; ?>";
</script>
<script src="<?php echo RUTA_URL; ?>/js/main.js"></script>


<div id="layoutSidenav" class="dashboard-admin">
  <div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
      <div class="sb-sidenav-menu">
        <div class="nav">                          
          <!--  -->
        <div class="container-fluid px-4 mt-4"> </div>
          <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
            <div class="sb-nav-link-icon"><i class="fas fa-cubes"></i></div>
              Gestión de productos
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
          </a>
          <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">


              <a href="#" class="nav-link" id="sidebarListadoProducto">✅Listado</a>

                                                                                            <!--tienen un id para poder asignarles un formulario segun la accion del boton, que se encuentra en main.js-->
              
             <a href="#" class="nav-link" id="sidebarAgregarProducto">✅Agregar</a>
             


            </nav>
          </div>
          <!--  -->
          <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsuarios" aria-expanded="false" aria-controls="collapseUsuarios">
            <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
              Gestión de usuarios
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
          </a>
          <div class="collapse" id="collapseUsuarios" aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">

              <a class="nav-link" href="#" id="sidebarUsuariosListado"> ✅Listado</a>


              <a class="nav-link" href="<?php echo RUTA_URL ?>/AuthController/register">✅Agregar</a>
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

              <a class="nav-link" href="#" id="sidebarListadoProveedores"> ✅Listado</a> <!--agregado 18:14 20/6-->

              <a class="nav-link" href="<?php echo RUTA_URL ?>/proveedorController/agregar_proveedor">✅Agregar</a>
            </nav>
          </div>


          <!--Gestión de Ordenes de Compra -->
          <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseOrdenes" aria-expanded="false" aria-controls="collapseOrdenes">
            <div class="sb-nav-link-icon"><i class="fa-solid fa-file-invoice-dollar"></i></div>
              Gestión de Ordenes de Compra
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
          </a>
          <div class="collapse" id="collapseOrdenes" aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">

            <a href="#" class="nav-link" id="sidebarListadoOrdenes">✅Listado</a>

            <a href="#" class="nav-link" id="sidebarAgregarOrden">✅Emitir una orden de compra</a>
            </nav>
          </div>

          
          <!--  -->
          <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMovimientos" aria-expanded="false" aria-controls="collapseMovimientos">
            <div class="sb-nav-link-icon"><i class="fa-solid fa-dolly"></i></div>
              Movimientos de Stock
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
          </a>
          <div class="collapse" id="collapseMovimientos" aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
              <a class="nav-link" href="layout-static.html">✅Listado</a>
              <a class="nav-link" href="<?php echo RUTA_URL ?>/movimientoStockController/agregar_movimiento">✅Agregar</a>
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
                <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 bg-black bottom-0 w-100">
                    <div class="col-md-4 d-flex align-items-center">
                        <span class="mb-3 mb-md-0 text-white ps-3">
                            Logistica RST | <?php echo date('d-m-Y');?> <!-- Imprime la fecha del día actual -->
                        </span>
                    </div>
                </footer>
        </div>
      </div>
    </main>
  </div>
</div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>


