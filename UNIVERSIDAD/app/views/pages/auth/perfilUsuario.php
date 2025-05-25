<?php
if (!isset($_SESSION['tipoUsuario']) || !in_array($_SESSION['tipoUsuario'], ['Profesor', 'Alumno', 'admin'])) {
    $this->view('pages/auth/login');
    exit;
}
?>

<?php require RUTA_APP . '/views/layout/users/header.php'; ?>
<div class="container vh-100 d-flex justify-content-center align-items-center">
  <div class="card shadow-lg p-5 rounded-4" style="width: 100%; max-width: 450px; background-color:rgba(255, 255, 255, 0.9); border: none;">
    <?php if (!empty($data['error'])): ?>
      <div class="alert alert-danger text-center">
        <?php echo $data['error']; ?>
      </div>
    <?php endif; ?>
    <!-- archivo: perfil.php -->
    <form method="POST" action="<?php echo RUTA_URL; ?>/AuthController/verPerfilCambios" id="perfilForm">
      <h2 class="text-center mb-4">Perfil de usuario</h2>

      <label for="nombreUsuario">Nombre de usuario:</label>
      <input type="text" name="nombreUsuario" id="nombreUsuario" class="form-control mb-3" value="<?php echo $_SESSION['NombreUsuario']; ?>" disabled required>

      <label for="Nombre">Nombre:</label>
      <input type="text" name="Nombre" id="Nombre" class="form-control mb-3" value="<?php echo $_SESSION['Nombre']; ?>" disabled required>

      <label for="apellido">Apellido:</label>
      <input type="text" name="apellido" id="apellido" class="form-control mb-3" value="<?php echo $_SESSION['Apellido']; ?>" disabled>

      <label for="dni">DNI:</label>
      <input type="text" name="dni" id="dni" class="form-control mb-3" value="<?php echo $_SESSION['DNI']; ?>" disabled>

      <label for="telefono">Teléfono:</label>
      <input type="text" name="telefono" id="telefono" class="form-control mb-4" value="<?php echo $_SESSION['telefono']; ?>" disabled>

      <div class="d-flex justify-content-between">
        <button type="button" class="btn btn-secondary" id="btnEditar">Desbloquear</button>
        <button type="submit" class="btn btn-secondary" disabled id="btnModificar">Modificar</button>
      </div>
    </form>

  </div>
</div>


<script>
  const btnEditar = document.getElementById('btnEditar');
  const btnModificar = document.getElementById('btnModificar');
  const form = document.getElementById('perfilForm');

  btnEditar.addEventListener('click', () => {
    // Habilitar todos los inputs dentro del form
    form.querySelectorAll('input').forEach(input => input.disabled = false);
    btnModificar.disabled = false; // habilita botón modificar
    btnEditar.disabled = true; // deshabilita botón editar para evitar doble click
  });

  
</script>

<?php require RUTA_APP . '/views/layout/footer.php'; ?>