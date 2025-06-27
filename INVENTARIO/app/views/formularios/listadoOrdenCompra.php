<div class="container mt-4">
  <h2>Listado de Órdenes de Compra</h2>

  <?php if (!empty($data['ordenes'])): ?>
    <table class="table table-striped table-bordered mt-3">
      <thead class="table-dark">
        <tr>
          <th>Nro Orden</th>
          <th>Fecha</th>
          <th>Proveedor</th>
          <th>Producto</th>
          <th>Cantidad</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data['ordenes'] as $orden): ?>
          <tr>
            <td><?= htmlspecialchars($orden->nro) ?></td>
            <td><?= htmlspecialchars($orden->fecha) ?></td>
            <td><?= htmlspecialchars($orden->proveedor) ?>
            <td><?= htmlspecialchars($orden->producto) ?>
            <td><?= htmlspecialchars($orden->cantidad) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <div class="alert alert-info mt-3">
      No se encontraron órdenes de compra registradas.
    </div>
  <?php endif; ?>
</div>