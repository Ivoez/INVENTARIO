<div class="card mt-4">
  <div class="card-header bg-primary text-white">
    Listado de Usuarios
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Usuario</th>
          <th>Email</th>
          <th>Tipo</th>
          <th>Estado</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($data['usuarios'])): ?>
          <?php foreach ($data['usuarios'] as $usuario): ?>
            <tr>
                <td><?php echo $usuario->nombre_usuario . ' ' . $usuario->apellido_usuario; ?></td>
                <td><?php echo $usuario->email_usuario; ?></td>
                <td><?php echo $usuario->nombre_tipo_usuario; ?></td>
                <td><?php echo $usuario->nombre_estado_usuario; ?></td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr><td colspan="4">No hay usuarios registrados.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
