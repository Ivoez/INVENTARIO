<?php require_once __DIR__ . '/../layout/landing/header.php';
 ?>

<div class="container mt-5">
  <h1 class="mb-4">Panel de Administración</h1>

  <div class="row g-4">
    <div class="col-md-4">
      <div class="card text-bg-primary shadow">
        <div class="card-body">
          <h5 class="card-title">Usuarios</h5>
          <p class="card-text">Gestionar socios registrados en el sistema.</p>
          <a href="/Usuarios/index" class="btn btn-light">Ir a Usuarios</a>
        </div>
      </div>
    </div>
    
    <div class="col-md-4">
      <div class="card text-bg-danger shadow">
        <div class="card-body">
          <h5 class="card-title">Cerrar sesión</h5>
          <p class="card-text">Salir del sistema de administración.</p>
          <a href="/Auth/logout" class="btn btn-light">Logout</a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once __DIR__ . '/../layout/landing/footer.php'; ?>
