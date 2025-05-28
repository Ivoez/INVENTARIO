<?php require RUTA_APP . '/views/layout/admin/header.php'; ?>

<div class="container mt-5">
  <h1 class="mb-4">Panel de Administración</h1>

  <div class="row g-4">
  
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title text-white">👨‍🏫 Profesores</h2>
          <p class="card-text text-white">Dar de alta nuevos profesores y ver el listado completo.</p>
          <!-- <a  href="<?= RUTA_URL ?>/Profesores/index" class="btn btn-primary">Gestionar Profesores</a> -->
          <a href="<?= RUTA_URL ?>/Profesores/index">
            <button>
              <span class="btn-register">Gestionar profesores</span>
            </button>
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title text-white">🏋️ Actividades</h2>
          <p class="card-text text-white">Administrar las actividades: alta, edición y eliminación.</p>
          <!-- <a href="/Actividades/index" class="btn btn-success">Gestionar Actividades</a> -->
          <a href="<?= RUTA_URL ?>/Actividades/index">
            <button href="#">
              <span class="btn-register">Gestionar actividades</span>
            </button>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>


