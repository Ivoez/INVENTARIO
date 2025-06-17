<div class="card">
  <div class="card-header bg-primary text-white">
    Agregar nuevo producto
  </div>
  <div class="card-body">
    <form id="formAgregarProducto" method="POST" action="<?php echo RUTA_URL ?>/productoController/insertarProducto">

      <!-- Nombre -->
      <div class="mb-3">
        <label for="nombre_producto" class="form-label">Nombre del producto</label>
        <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" required>
      </div>

      <!-- Código -->
      <div class="mb-3">
        <label for="codigo_producto" class="form-label">Código del producto</label>
        <input type="text" class="form-control" id="codigo_producto" name="codigo_producto" required>
      </div>

      <!-- Cantidad en stock -->
      <div class="mb-3">
        <label for="cantidad_stock_producto" class="form-label">Cantidad en stock</label>
        <input type="number" min="0" class="form-control" id="cantidad_stock_producto" name="cantidad_stock_producto" value="0" required>
      </div>

      <!-- Precio costo -->
      <div class="mb-3">
        <label for="precio_costo_producto" class="form-label">Precio de costo</label>
        <input type="number" step="0.01" min="0" class="form-control" id="precio_costo_producto" name="precio_costo_producto" value="0" required>
      </div>

      <!-- Categoría existente -->
      <div class="mb-3">
        <label for="categoria" class="form-label">Categoría existente</label>
        <select class="form-select" id="categoria" name="categoria">
          <option value="">Seleccionar categoría</option>
          <?php if (isset($data['categorias']) && !empty($data['categorias'])): ?>
            <?php foreach ($data['categorias'] as $categoria): ?>
              <option value="<?php echo $categoria->id_categoria_producto; ?>">
                <?php echo $categoria->nombre_categoria_producto; ?>
              </option>
            <?php endforeach; ?>
          <?php else: ?>
            <option disabled>No hay categorías cargadas</option>
          <?php endif; ?>
        </select>
      </div>

      <!-- Nueva categoría -->
      <div class="mb-3">
        <label for="nueva_categoria" class="form-label">O agregar nueva categoría</label>
        <input type="text" class="form-control" id="nueva_categoria" name="nueva_categoria">
        <div class="form-text">Solo completa este campo si querés crear una nueva categoría.</div>
      </div>

      <!-- Proveedor -->
      <div class="mb-3">
        <label for="proveedor" class="form-label">Proveedor</label>
        <select class="form-select" id="proveedor" name="proveedor" required>
          <option value="">Seleccionar proveedor</option>
          <?php if (isset($data['proveedores']) && !empty($data['proveedores'])): ?>
            <?php foreach ($data['proveedores'] as $proveedor): ?>
              <option value="<?php echo $proveedor->id_proveedor; ?>">
                <?php echo $proveedor->razon_social_proveedor; ?>
              </option>
            <?php endforeach; ?>
          <?php else: ?>
            <option disabled>No hay proveedores cargados</option>
          <?php endif; ?>
        </select>
      </div>

      <!-- Botón -->
      <button type="submit" class="btn btn-success">Guardar producto</button>
    </form>
  </div>
</div>