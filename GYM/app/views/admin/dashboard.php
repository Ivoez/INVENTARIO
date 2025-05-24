<?php require_once __DIR__ . '/../layout/landing/header.php'; ?>

<div class="container mt-5">
  <h1 class="mb-4">Panel de Administración</h1>

  <div class="row g-4">
  
    <div class="col-md-6">
      <div class="card shadow border-0">
        <div class="card-body">
          <h5 class="card-title">👨‍🏫 Profesores</h5>
          <p class="card-text">Dar de alta nuevos profesores y ver el listado completo.</p>
          <a  href="<?= RUTA_URL ?>/Profesores/index" class="btn btn-primary">Gestionar Profesores</a>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card shadow border-0">
        <div class="card-body">
          <h5 class="card-title">🏋️ Actividades</h5>
          <p class="card-text">Administrar las actividades: alta, edición y eliminación.</p>
          <a href="/Actividades/index" class="btn btn-success">Gestionar Actividades</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../layout/landing/footer.php'; ?>
