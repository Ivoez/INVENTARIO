<?php require_once __DIR__ . '/../../layout/admin/header.php'; ?>

<div class="container mt-5">
  <h2>Alta de Profesor</h2>
  <form action="/appweb_caba_1c_2025/GYM/public/Profesores/guardar" method="POST" enctype="multipart/form-data" class="row g-3">
    <div class="col-md-6"><input type="text" name="nombre" class="form-control" placeholder="Nombre" required></div>
    <div class="col-md-6"><input type="text" name="apellido" class="form-control" placeholder="Apellido" required></div>
    <div class="col-md-6"><input type="text" name="dni" class="form-control" placeholder="DNI" required></div>
    <div class="col-md-6"><input type="email" name="email" class="form-control" placeholder="Email" required></div>
    <div class="col-md-6"><input type="text" name="celular" class="form-control" placeholder="Celular"></div>
    <div class="col-md-6"><input type="file" name="foto" class="form-control" accept="image/*" required></div>
    <div class="col-12"><button type="submit" class="btn btn-primary">Guardar</button></div>
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


