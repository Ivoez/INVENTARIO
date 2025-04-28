<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow p-4" style="width: 22rem;">
        <h2 class="text-center mb-4">Iniciar Sesión</h2>

        <?php if (!empty($data['error_login'])): ?>
            <?= $data['error_login'] ?>
        <?php endif; ?>

        <form action="<?= URLROOT ?>/nombreDelControlador/loginUsuario" method="POST">
            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" name="dni" id="dni" class="form-control" required value="<?= $data['dni'] ?>">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </div>
        </form>
    </div>

</body>
</html>
