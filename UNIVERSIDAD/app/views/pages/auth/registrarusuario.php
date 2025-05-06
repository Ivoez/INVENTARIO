<!-- Carga de estilos esenciales sin navbar -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Usuario</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/style.css">
</head>
<body>


<div class="container-fluid d-flex justify-content-center align-items-center" style="min-height: 100vh; background: url('<?php echo RUTA_URL; ?>/public/img/IMGDeFondo.jpg') no-repeat center center fixed; background-size: cover; background-position: center;">
    <div class="card shadow-lg p-5 rounded-4" style="width: 100%; max-width: 450px; background-color:rgba(255, 255, 255, 0.52); border: none;">
        <h3 class="text-center mb-4">Registro de Usuario</h3>

        <?php if (!empty($data['errorLogin'])): ?>
            <div class="alert alert-danger text-center">
                <?php echo $data['errorLogin']; ?>
            </div>
        <?php endif; ?>

        
        <form action="<?php echo RUTA_URL; ?>/AuthController/loginUsuario" method="POST">
            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre</label>
                <input type="Nombre" name="Nombre" id="Nombre" class="form-control" placeholder="Ingrese su Nombre" required>
            </div>
            <div class="mb-3">
                <label for="Apellido" class="form-label">Apellido</label>
                <input type="Apellido" name="Apellido" id="Apellido" class="form-control" placeholder="Ingrese su Apellido" required>
            </div>
            <div class="mb-3">
                <label for="Usuario" class="form-label">Usuario</label>
                <input type="Usuario" name="Usuario" id="Usuario" class="form-control" placeholder="Ingrese su Usuario" required>
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese su contraseña" required>
            </div>
            <div class="mb-3">
                <label for="DNI" class="form-label">DNI</label>
                <input type="DNI" name="DNI" id="DNI" class="form-control" placeholder="Ingrese su DNI" required>
            </div>
            <div class="mb-3">
                <label for="Email" class="form-label">Correo</label>
                <input type="email" name="Email" id="Email" class="form-control" placeholder="Ingrese su email" required>
            </div>
            <div class="mb-3">
                <label for="Celular" class="form-label">Celular</label>
                <input type="Celular" name="Celular" id="Celular" class="form-control" placeholder="Ingrese su Celular" required>
            </div>
            <div class="mb-3">
                <label for="foto_perfil" class="form-label">Foto de perfil</label>
                <input type="file" name="foto_perfil" id="foto_perfil" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-primary w-100">Registrarse</button>

            <!--Borrar debajo-->
            <!--<a href="<?php echo RUTA_URL; ?>/AuthController/registrarUsuario">¿Olvidaste tu contraseña?</a>-->
            
        </form>
    </div>
</div>

<?php require RUTA_APP . '/views/layout/footer.php'; ?>

