<div class="card">
  <div class="card-header bg-primary text-white">
    Movimientos de stock
  </div>
  <div class="card-body p-0">
    <?php if (!empty($data['movimientos'])): ?>
      <table class="table table-striped table-hover mb-0">
        <thead class="table-light">
          <tr>
            <th>Fecha</th>
            <th>Producto</th>
            <th>Tipo</th>
            <th>Cantidad</th>
            <th>Responsable</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data['movimientos'] as $m): ?>
            <tr>
              <td><?= $m->fecha_movimiento ?></td>
              <td><?= $m->nombre_producto ?></td>
              <td><?= $m->cantidad > 0 ? 'Entrada' : 'Salida' ?></td>
              <td><?= abs($m->cantidad) ?></td>
              <td><?= $m->nombre_usuario . ' ' . $m->apellido_usuario ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>
      <div class="alert alert-info p-3">No hay movimientos de stock registrados.</div>
    <?php endif; ?>
  </div>
</div>