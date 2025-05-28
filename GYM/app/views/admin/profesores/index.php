<?php require RUTA_APP . '/views/layout/admin/header.php'; ?>


<div class="container mt-5">
  <h2>Alta de Profesor</h2>
  <form action="/appweb_caba_1c_2025/GYM/public/Profesores/guardar" method="POST" enctype="multipart/form-data" class="row g-3">
    <div class="col-md-6"><input type="text" name="nombre" placeholder="Nombre" required></div>
    <div class="col-md-6"><input type="text" name="apellido" placeholder="Apellido" required></div>
    <div class="col-md-6"><input type="text" name="dni" placeholder="DNI" required></div>
    <div class="col-md-6"><input type="email" name="email" placeholder="Email" required></div>
    <div class="col-md-6"><input type="text" name="celular" placeholder="Celular"></div>
    <div class="col-md-6"><input type="file" name="foto" accept="image/*" required></div>
    <div class="col-12">
      <button type="submit">
        <span class="btn-register">Guardar</span>
      </button></div>
  </form>

  <hr>

  <h2 class="mt-5">Listado de Profesores</h2>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr><th>Foto</th><th>Nombre</th><th>DNI</th><th>Email</th><th>Celular</th></tr>
      </thead>
      <tbody>
        <?php foreach($profesores as $p): ?>
        <tr>
          <td><img src="/appweb_caba_1c_2025/GYM/public/<?= $p->foto_perfil ?>" width="50"></td>
          <td><?= $p->nombre . ' ' . $p->apellido ?></td>
          <td><?= $p->dni ?></td>
          <td><?= $p->email ?></td>
          <td><?= $p->celular ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>


