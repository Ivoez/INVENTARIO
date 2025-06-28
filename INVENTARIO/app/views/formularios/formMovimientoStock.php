<div class="card mt-4">
  <div class="card-header bg-primary text-white">
    Registrar movimiento de stock
  </div>

  <div class="card-body">
    <?php
      $errores = $data['errores'] ?? [];
      $form = $data['dataForm'] ?? [];
    ?>

    <?php if (!empty($errores)): ?>
      <div class="alert alert-danger">
        <ul class="mb-0">
          <?php foreach ($errores as $error): ?>
            <li><?= $error ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form method="POST" action="<?= RUTA_URL ?>/movimientoStockController/insertarMovimiento">


    
      <div class="mb-3">
        <label for="producto_id" class="form-label">Producto</label>
        <select class="form-select" id="producto_id" name="producto_id" required>
          <option value="">Seleccionar producto</option>
          <?php foreach ($data['productos'] as $producto): ?>
            <option value="<?= $producto->id_producto ?>"
              <?= ($form['producto_id'] ?? '') == $producto->id_producto ? 'selected' : '' ?>>
              <?= $producto->nombre_producto ?> (<?= $producto->codigo_producto ?>)
            </option>
          <?php endforeach; ?>
        </select>
      </div>


      
      <div class="mb-3">
        <label for="tipo" class="form-label">Tipo de movimiento</label>
        <select class="form-select" id="tipo" name="tipo" required>
          <option value="">Seleccionar tipo</option>
          <option value="entrada" <?= ($form['tipo'] ?? '') == 'entrada' ? 'selected' : '' ?>>Entrada</option>
          <option value="salida" <?= ($form['tipo'] ?? '') == 'salida' ? 'selected' : '' ?>>Salida</option>
        </select>
      </div>


      
      <div class="mb-3">
        <label for="cantidad" class="form-label">Cantidad</label>
        <input type="number" class="form-control" name="cantidad" id="cantidad"
               min="1" required value="<?= htmlspecialchars($form['cantidad'] ?? '') ?>">
      </div>


      
      <div class="mb-3">
        <label for="fecha" class="form-label">Fecha</label>
        <input type="date" class="form-control" name="fecha" id="fecha"
               required value="<?= htmlspecialchars($form['fecha'] ?? date('Y-m-d')) ?>">
      </div>


      
      <button type="submit" class="btn btn-success">Registrar movimiento</button>
    </form>
  </div>
</div>