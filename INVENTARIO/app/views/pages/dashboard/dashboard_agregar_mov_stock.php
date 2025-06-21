<?php
  $datos = $data ?? [];
  $codigos_producto = $datos['codigos_producto'] ?? [];
  $datas = $datos['datas'] ?? [];
  $errores = $datos['errores'] ?? [];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard</title>
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


<div id="layoutSidenav">
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
              <a class="nav-link" href="">✅Listado</a>
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
    <main class="bg-register">
      <div class="form-container">
        <img src="<?php echo RUTA_URL ?>/imagenes/Icono_simple.png" alt="usuario-login">
        <p class="title">Formulario de Registro de Movimiento de Stock Nuevo</p>
    
        <form method="POST" action="<?= rtrim(RUTA_URL, '/') ?>/movimientoStockController/agregar_movimiento">

          <label for="codigo_producto">Código de producto</label>
            <select id="codigo_producto" name="codigo_producto">
              <option value="Seleccione un código de producto">Seleccione un código de producto</option>
                <?php foreach ($codigos_producto as $codigo): ?>
                  <option value="<?= htmlspecialchars($codigo->codigo_producto) ?>">
                    <?= htmlspecialchars($codigo->codigo_producto) ?>
                  </option>
                <?php endforeach; ?>
            </select>
            <?php if (!empty($errores['codigo_producto'])): ?>
              <div style="color:red;"><?= $errores['codigo_producto'] ?></div>
            <?php endif; ?>


          <label for="tipo">Tipo de movimiento</label>
            <select id="tipo" name="tipo">
              <option value="Seleccione un tipo de movimiento">Seleccione un tipo de movimiento</option>
              <option value="Entrada">Entrada</option>
              <option value="Salida">Salida</option>
            </select>
            <?php if (!empty($errores['tipo'])): ?>
              <div style="color:red;"><?= $errores['tipo'] ?></div>
            <?php endif; ?>

          <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="fecha" value="<?= htmlspecialchars($datas['fecha'] ?? '') ?>" max="<?= date('Y-m-d') ?>">
              <?php if (!empty($errores['fecha'])): ?>
                <div style="color:red; font-size:0.9em; margin-top:2px;"><?= $errores['fecha'] ?></div>
              <?php endif; ?>

          <label for="cantidad">Cantidad</label>
            <input type="text" id="cantidad" name="cantidad" pattern="[0-9]+"  minlength="1" value=0 onkeypress="return soloNumeros(event)">
              <?php if (!empty($errores['cantidad'])): ?>
                <div style="color:red; font-size:0.9em; margin-top:2px;"><?= $errores['cantidad'] ?></div>
              <?php endif; ?>

          <?php if (!empty($errores['general'])): ?>
            <div style="color:red;"><?= $errores['general'] ?></div>
          <?php endif; ?>

          <button type="submit" class="boton-login">Agregar</button>
        </form>
      </div>
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