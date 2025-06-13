<?php
  $datos = $data ?? [];
  $tipos_usuario = $datos['tipos_usuario'] ?? [];
  $estados_usuario = $datos['tipos_usuario'] ?? [];

  $datas = $datos['datas'] ?? [];
  $errores = $datos['errores'] ?? [];
?>

<?php require RUTA_APP . '/views/layout/header.php'; ?>

  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">                          
            <!--  -->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fas fa-cubes"></i></div>
                Gestión de productos
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="layout-static.html">✅Listado</a>
                <a class="nav-link" href="layout-sidenav-light.html">✅Agregar</a>
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
                <a class="nav-link" href="layout-static.html">✅Listado</a>
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
                <a class="nav-link" href="layout-sidenav-light.html">✅Agregar</a>
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
              </nav>
            </div>
          </div>
        </div>
      </nav>
    </div>
  <div id="layoutSidenav_content">
  <main class="masthead">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
              <tr>
                  <th>Título</th>
                  <th>Descripción</th>
                  <th>Fecha de Alta</th>
                  <th>Vencimiento</th>
                  <th>Estado</th>
                  <th class="text-center" colspan="2">Acciones</th>
              </tr>
          </thead>
          <tbody>
              <?php if (!empty($data['tareas'])):?>
              <?php foreach($data['tareas'] as $tarea):?>
              <tr>
                  <td><?php echo $tarea->titulo;?></td>
                  <td><?php echo $tarea->descripcion;?></td>
                  <td><?php echo date('d/m/Y',strtotime($tarea->created_at));?></td>
                  <td><?php echo date('d/m/Y',strtotime($tarea->expired_at));?></td>
                  <td style="color:<?php echo $tarea->color;?>"><strong><?php echo $tarea->tipoEstado;?></strong></td>
                  <td><span class="text-info"><a
                              href="<?php echo RUTA_URL;?>/TareaController/editarTarea/<?php echo $tarea->id_tarea;?>"
                              class="btn btn-outline-success btn-sm"><i
                                  class="fas fa-pen mr-2"></i>
                              Editar</a></span></td>
                  <td><span class="text-danger"><a
                              href="<?php echo RUTA_URL;?>/TareaController/borrarTarea/<?php echo $tarea->id_tarea;?>"
                              class="btn btn-outline-danger btn-sm "><i
                                  class="fas fa-trash-alt mr-2"></i>Eliminar</a></span></td>
              </tr>
              <?php endforeach;?>
              <?php else:?>
              <tr><h4 class="text-secondary">NO HAY TAREAS CARGADAS</h4></tr>
              <?php endif;?>
          </tbody>
      </table>
    </div>
  </main>
<?php require RUTA_APP . '/views/layout/footer.php'; ?>
