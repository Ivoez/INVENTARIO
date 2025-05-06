<link rel="stylesheet" href="public/css/style.css">
<?php require RUTA_APP . '/views/layout/header.php'; ?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="card shadow-lg p-4 rounded" style="width: 100%; max-width: 400px;">
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

