<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/style.css">
</head>

<body>
  <!-- Contenedor principal con fondo -->
  <div class="container-fluid d-flex justify-content-center align-items-center"
       style="min-height: 100vh; background: url('<?php echo RUTA_URL; ?>/public/img/IMGDeFondo.jpg') no-repeat center center fixed; background-size: cover;">
    
    <div class="card shadow-lg p-5 rounded-4 text-center" style="width: 100%; max-width: 450px; background-color: rgba(255,255,255,0.9); border: none;">
      <h3 class="text-primary fw-bold mb-4">¡Correo Enviado!</h3>

      <div class="alert alert-success fw-semibold">
        Email enviado correctamente.<br>Por favor revise su bandeja de entrada o carpeta de <strong>SPAM</strong>.
      </div>

      <!-- Botón para ir a actualizar contraseña -->
      <div class="d-grid gap-2 mt-3">
        <a href="<?php echo RUTA_URL ?>/AuthController/actualizarVistaContra" class="btn btn-success rounded-pill py-2 fw-bold">
          Actualizar Contraseña
        </a>
      </div>

      <!-- Botón para volver a la página principal -->
      <div class="d-grid gap-2 mt-3">
        <a href="<?php echo RUTA_URL ?>" class="btn btn-outline-primary rounded-pill py-2 fw-bold">
          Volver a la Página Principal
        </a>
      </div>
    </div>
  </div>
</body>
