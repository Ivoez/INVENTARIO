
<?php require RUTA_APP . '/views/layout/header.php'; ?>

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
            <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
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
              <a class="nav-link" href="layout-static.html">✅Listado</a>
              <a class="nav-link" href="<?php echo RUTA_URL ?>/proveedorController/agregar_proveedor">✅Agregar</a>
            </nav>
          </div>
          <!--  -->
          <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseOrdenes" aria-expanded="false" aria-controls="collapseOrdenes">
            <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
              Gestión de Ordenes de Compra
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
          </a>
          <div class="collapse" id="collapseOrdenes" aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
              <a class="nav-link" href="layout-static.html">✅Listado</a>
              <a class="nav-link" href="layout-sidenav-light.html">✅Emitir una orden de compra</a>
            </nav>
          </div>
          <!--  -->
          <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMovimientos" aria-expanded="false" aria-controls="collapseMovimientos">
            <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
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

                       <div class="row" id="tarjetasDashboard"> <!--div para ocultar las tarjetas-->

                        <div class="col-xl-6 col-md-6">
                            <div class="card card-proveedores text-white mb-4">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <span class="fs-4">Proveedores</span>
                                    <i class="fa-solid fa-users fs-1"></i> <!-- ícono -->
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-md-6">
                            <div class="card card-productos text-white mb-4">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <span class="fs-4">Productos en stock</span>
                                    <i class="fas fa-cubes fs-1"></i> <!-- ícono -->
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-md-6">
                            <div class="card card-ordenes text-white mb-4">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <span class="fs-4">Órdenes de compra</span>
                                    <i class="fa-solid fa-file-invoice-dollar fs-1"></i> <!-- ícono -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="card card-clientes text-white mb-4">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <span class="fs-4">Clientes</span>
                                    <i class="fa-solid fa-users-rectangle fs-1"></i> <!-- ícono -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="card card-movimientos text-white mb-4">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <span class="fs-4">Movimientos de stock</span>
                                    <i class="fa-solid fa-dolly fs-1"></i> <!-- ícono -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="card card-reportes text-white mb-4">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <span class="fs-4">Reportes</span>
                                    <i class="fa-solid fa-file-contract fs-1"></i> <!-- ícono -->
                                </div>
                            </div>
                        </div>
                      </div>

                        <div id="formularioDinamico" class="mt-4"></div> <!-- js va insertar el formulario aca sin tener que recargar la pagina -->

                </main>
        
         
        


        </div>
      </div>
    </main>
  </div>
</div>
<?php require RUTA_APP . '/views/layout/footer.php'; ?>


