<?php
  $datos = $data ?? [];
  $codigos_producto = $datos['codigos_producto'] ?? [];
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
  </div>
</div>
<?php require RUTA_APP . '/views/layout/footer.php'; ?>