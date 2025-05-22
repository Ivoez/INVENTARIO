<?php require RUTA_APP . '/views/layout/auth/headerForgotPassword.php'; ?>

<body>
    <div class="container">
        <div class="form-container">
            <form method="POST" action="">
                <h1 class="text-center">RECUPERAR CONTRASEÑA</h1>
                <span class="text-center">Ingresa tu mail para recibir un codigo y recuperar tu contraseña.</span>

                <input type="email" name="email" placeholder="Email" required>

                <button type="submit">
                    <span>ENVIAR!</span>
                </button>
            </form>
        </div>
    </div>
</body>