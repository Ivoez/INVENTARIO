<!-- usuarios/olvide.php -->
<?php require RUTA_APP . '/views/layout/header.php'; ?>

<div class="olvide-box">
    <h2>¿Olvidaste tu contraseña?</h2>
    <?php if (!empty($data['error'])): ?>
        <p class="error"><?php echo $data['error']; ?></p>
    <?php endif; ?>
    <?php if (!empty($data['success'])): ?>
        <p class="success"><?php echo $data['success']; ?></p>
    <?php endif; ?>
    <form action="<?php echo RUTA_URL; ?>/usuarios/enviarCorreo" method="POST">
        <input type="email" name="email" placeholder="Correo electrónico" required>
        <button type="submit">Enviar enlace de recuperación</button>
    </form>
</div>

<style>
    /* General Box Styling */
    .olvide-box {
        width: 100%;
        max-width: 400px;
        margin: 80px auto;
        padding: 40px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        text-align: center;
        transition: transform 0.3s ease;
    }
    .olvide-box:hover {
        transform: translateY(-5px);
    }

    /* Heading Style */
    .olvide-box h2 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
        font-family: 'Arial', sans-serif;
    }

    /* Input Styling */
    .olvide-box input {
        width: 100%;
        padding: 12px;
        margin: 15px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        transition: all 0.3s;
    }
    .olvide-box input:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.2);
    }

    /* Button Styling */
    .olvide-box button {
        width: 100%;
        padding: 12px;
        background: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .olvide-box button:hover {
        background-color: #0056b3;
    }

    /* Error and Success Messages */
    .olvide-box .error {
        color: red;
        font-size: 14px;
        margin-bottom: 15px;
        background: #f8d7da;
        padding: 10px;
        border-radius: 5px;
        text-align: left;
        font-weight: bold;
    }
    .olvide-box .success {
        color: green;
        font-size: 14px;
        margin-bottom: 15px;
        background: #d4edda;
        padding: 10px;
        border-radius: 5px;
        text-align: left;
        font-weight: bold;
    }

    /* Responsive Styles */
    @media (max-width: 480px) {
        .olvide-box {
            padding: 20px;
        }
        .olvide-box h2 {
            font-size: 20px;
        }
    }
</style>

<?php require RUTA_APP . '/views/layout/footer.php'; ?>
s