<div class="card"> 
  <div class="card-header bg-primary text-white">
    Generar nueva Orden de Compra
  </div>

  <div class="card-body">
    <form method="POST" action="<?= RUTA_URL ?>/ordencompra/guardar">

      
<div class="row mb-3">
  
  <div class="col-md-6">
    <label for="proveedor" class="form-label">Proveedor</label>
    <select class="form-select" id="proveedor" name="proveedor" required onchange="cargarProductos()">
      <option value="">Seleccionar proveedor</option>
      <?php foreach ($data['proveedores'] as $proveedor): ?>
        <option value="<?= $proveedor->id_proveedor ?>">
          <?= $proveedor->razon_social_proveedor ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="col-md-6">
    <label for="fecha" class="form-label">Fecha</label>
    <input type="date" class="form-control" id="fecha" name="fecha" value="<?= date('Y-m-d') ?>" readonly>
  </div>
</div>
     


<div class="row g-3 align-items-end mb-2">
  <div class="col-md-5">
    <label class="form-label">Producto</label>
  </div>
  <div class="col-md-3">
    <label class="form-label">Cantidad</label>
  </div>
  <div class="col-md-2">
    <label class="form-label">Confirmar</label>
  </div>
</div>


<div id="productos">
  <?php for ($i = 0; $i < 10; $i++): ?>
    <div class="row g-3 align-items-end producto-item mb-2">
      <div class="col-md-5">
        <select class="form-select" name="productos[]">
          <option value="">Seleccione un producto</option>
          <?php foreach ($data['productos'] as $producto): ?>
            <option value="<?= $producto->codigo_producto ?>">
              <?= $producto->codigo_producto ?> - <?= $producto->nombre_producto ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="col-md-3">
        <input type="number" class="form-control" name="cantidades[]" min="1">
      </div>
      <div class="col-md-2 text-center">
        <input type="checkbox" class="form-check-input" name="confirmados[]" value="<?= $i ?>">
      </div>
    </div>
  <?php endfor; ?>
</div>

     
      <div class="mb-3 mt-4">
        <label for="nota" class="form-label">Notas adicionales</label>
        <textarea class="form-control" name="nota" id="nota" rows="3"></textarea>
      </div>


      
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Emitir Orden de Compra</button>
      </div>

    </form>
  </div>
</div>