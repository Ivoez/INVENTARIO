<?php
  $datos = $data ?? [];
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
        <p class="title">Formulario de Registro de Proveedor Nuevo</p>
    
        <form method="POST" action="<?= rtrim(RUTA_URL, '/') ?>/proveedorController/agregar_proveedor">

          <label for="razon_social">Razon Social</label>
            <input type="text" id="razon_social" name="razon_social" value="<?= htmlspecialchars($datas['razon_social'] ?? '') ?>">
              <?php if (!empty($errores['razon_social'])): ?>
                <div style="color:red; font-size:0.9em; margin-top:2px;"><?= $errores['razon_social'] ?></div>
              <?php endif; ?>

            <label for="CUIT">CUIT</label>
              <input type="text" id="CUIT" name="CUIT" pattern="[0-9]+"  minlength="11" maxlength="12" onkeypress="return soloNumeros(event)">
                <?php if (!empty($errores['CUIT'])): ?>
                  <div style="color:red; font-size:0.9em; margin-top:2px;"><?= $errores['CUIT'] ?></div>
                <?php endif; ?>

            <label for="direccion">Dirección</label>
              <input type="text" id="direccion" name="direccion" value="<?= htmlspecialchars($datas['direccion'] ?? '') ?>">
                <?php if (!empty($errores['direccion'])): ?>
                  <div style="color:red; font-size:0.9em; margin-top:2px;"><?= $errores['direccion'] ?></div>
                <?php endif; ?>

          <label for="telefono">Teléfono</label>
            <input type="text" id="telefono" name="telefono" value="<?= htmlspecialchars($datas['telefono'] ?? '') ?>">
              <?php if (!empty($errores['telefono'])): ?>
                <div style="color:red; font-size:0.9em; margin-top:2px;"><?= $errores['telefono'] ?></div>
              <?php endif; ?>
          
          <label for="email">E-mail</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($datas['email'] ?? '') ?>">
              <?php if (!empty($errores['email'])): ?>
                <div style="color:red;"><?= $errores['email'] ?></div>
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