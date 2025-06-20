<div class="card">
  <div class="card-header bg-primary text-white">
    Generar nueva Orden de Compra
  </div>

  <div class="card-body">
    <form method="POST" action="<?php echo RUTA_URL ?>/ordencompra/guardar">

      <!-- Proveedor -->
      <div class="mb-3">
        <label for="proveedor" class="form-label">Proveedor</label>
        <select class="form-select" id="proveedor" name="proveedor" required>
          <option value="">Seleccionar proveedor</option>
          <?php foreach ($data['proveedores'] as $proveedor): ?>
            <option value="<?php echo $proveedor['id_proveedor']; ?>">
              <?php echo $proveedor['nombre_proveedor']; ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- Fecha -->
      <div class="mb-3">
        <label for="fecha" class="form-label">Fecha</label>
        <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo date('Y-m-d'); ?>" readonly>
      </div>

      <!-- Productos (bloque dinámico) -->
      <div id="productos">
        <div class="row g-3 align-items-end producto-item">
          <div class="col-md-6">
            <label class="form-label">Producto</label>
            <select class="form-select" name="productos[]" required>
              <option value="">Seleccione un producto</option>
              <?php foreach ($data['productos'] as $producto): ?>
                <option value="<?php echo $producto['id_producto']; ?>">
                  <?php echo $producto['nombre_producto']; ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-4">
            <label class="form-label">Cantidad</label>
            <input type="number" class="form-control" name="cantidades[]" min="1" required>
          </div>
          <div class="col-md-2">
            <button type="button" class="btn btn-success" onclick="agregarProducto()">+</button>
          </div>
        </div>
      </div>

      <!-- Nota -->
      <div class="mb-3 mt-4">
        <label for="nota" class="form-label">Notas adicionales</label>
        <textarea class="form-control" name="nota" id="nota" rows="3"></textarea>
      </div>

      <!-- Botón -->
      <button type="submit" class="btn btn-primary">Emitir Orden de Compra</button>
    </form>
  </div>
</div>

<!-- Script para clonar filas -->
<script>
function agregarProducto() {
  const contenedor = document.getElementById('productos');
  const clon = contenedor.querySelector('.producto-item').cloneNode(true);
  clon.querySelector('input').value = '';
  clon.querySelector('select').selectedIndex = 0;
  clon.querySelector('button').outerHTML = '<button type="button" class="btn btn-danger" onclick="eliminarProducto(this)">–</button>';
  contenedor.appendChild(clon);
}

function eliminarProducto(boton) {
  const item = boton.closest('.producto-item');
  item.remove();
}
</script>