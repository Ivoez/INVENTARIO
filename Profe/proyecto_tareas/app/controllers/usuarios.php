<?php require RUTA_APP . '/views/layout/header.php'; ?>

<div class="login-container">
    <div class="login-box">
        <h2>Acceso a la Universidad</h2>

        <?php if (!empty($datos['error'])): ?>
            <div class="alert alert-danger text-center"><?php echo $datos['error']; ?></div>
        <?php endif; ?>

        <form action="<?php echo RUTA_URL; ?>/usuarios/login" method="POST">
            <input type="text" name="username" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit" class="btn btn-primary">Ingresar</button>
        </form>

        <a href="<?php echo RUTA_URL; ?>/usuarios/olvideMiContraseña" class="forgot-password">¿Olvidaste tu contraseña?</a>
    </div>
</div>

<style>
    body {
        background: #e0f7fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .login-container {
        width: 100%;
        max-width: 400px;
        padding: 20px;
    }

    .login-box {
        background: #ffffff;
        border-radius: 15px;
        padding: 30px 25px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        text-align: center;
    }

    .login-box h2 {
        color: #00796b;
        margin-bottom: 25px;
        font-weight: 600;
    }

    .login-box input {
        width: 100%;
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #b2ebf2;
        border-radius: 8px;
        outline: none;
        transition: all 0.3s ease;
    }

    .login-box input:focus {
        border-color: #26c6da;
        box-shadow: 0 0 0 0.2rem rgba(38, 198, 218, 0.3);
    }

    .btn-primary {
        width: 100%;
        background-color: #26c6da;
        border: none;
        border-radius: 8px;
        padding: 12px;
        color: white;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #00acc1;
    }

    .forgot-password {
        display: block;
        margin-top: 15px;
        font-size: 14px;
        color: #00796b;
        text-decoration: none;
    }

    .forgot-password:hover {
        text-decoration: underline;
    }

    .alert-danger {
        font-size: 14px;
        padding: 10px;
        border-radius: 6px;
    }
</style>

<?php require RUTA_APP . '/views/layout/footer.php'; ?>
