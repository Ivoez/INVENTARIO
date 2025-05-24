<?php require RUTA_APP . '/views/layout/auth/headerForgotPassword.php'; ?>

<body>
    <div class="container">
        <div class="form-container">
            <form method="POST" action="">
                <h1 class="text-center">RECUPERAR CONTRASEÑA</h1>
                <span class="text-center">Ingresa tu nueva contraseña para reestablecerla.</span>

                <!-- Campos ocultos para email y código -->
                <input type="hidden" name="email" value="<?= htmlspecialchars($_GET['email'] ?? '') ?>">
                <input type="hidden" name="codigo" value="<?= htmlspecialchars($_GET['codigo'] ?? '') ?>">

                <input type="password" name="nueva_password" placeholder="Nueva contraseña" required>
                <input type="password" name="repetir_password" placeholder="Repetir nueva contraseña" required>

                <button type="submit">
                    <span>ENVIAR!</span>
                </button>
            </form>
        </div>
    </div>
</body>
