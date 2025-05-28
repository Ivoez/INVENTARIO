<?php require RUTA_APP . '/views/layout/admin/header.php'; ?>

<form action="<?= RUTA_URL ?>/Actividades/guardar" method="POST" class="row g-3">
<h2>Alta de Profesor</h2>
  <div class="col-md-4"><input type="text" name="nombre" class="form-control" placeholder="Nombre de la actividad" required></div>
  <div class="col-md-4">
    <select name="dia" class="form-select" required>
      <option value="">Día</option>
      <option>Lunes</option>
      <option>Martes</option>
      <option>Miércoles</option>
      <option>Jueves</option>
      <option>Viernes</option>
      <option>Sábado</option>
    </select>
  </div>
  <div class="col-md-4"><input type="time" name="hora" class="form-control" required></div>
  <div class="col-md-6">
    <select name="profesor_id" class="form-select" required>
      <option value="">Profesor</option>
      <?php foreach($profesores as $prof): ?>
        <option value="<?= $prof->id ?>"><?= $prof->nombre . ' ' . $prof->apellido ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="col-md-12">
    <button type="submit" >
        <span class="btn-register">Guardar</span>
  </button>
</div>
</form>

<h2 class="mt-5">Listado de Actividades</h2>
<div class="table-responsive">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Día</th>
        <th>Hora</th>
        <th>Profesor</th>
        <th>Foto</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($actividades as $a): ?>
      <tr>
        <td><?= $a->nombre ?></td>
        <td><?= $a->dia ?></td>
        <td><?= date('H:i', strtotime($a->hora)) ?></td>
        <td><?= $a->profesor_nombre ?></td>
        <td>
          <?php if (!empty($a->foto_perfil)): ?>
            <img src="/appweb_caba_1c_2025/GYM/public/<?= $a->foto_perfil ?>" width="50">
          <?php else: ?>
            Sin foto
          <?php endif; ?>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>




