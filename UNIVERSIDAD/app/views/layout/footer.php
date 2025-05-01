<footer id ="footerinfo" class="py-4 mt-5 border-top">
    <div class="container text-center">
        <img src="<?php echo RUTA_URL?>/public/img/logoUniversidad.png" alt="Logo Universidad Papa Francisco" class="mb-3" style="max-width: 120px;">
        <h5 class="mb-2">Universidad Tecnologica Nacional </h5>
        <p class="mb-1"><strong>Teléfono:</strong> +54 11 9520 6408</p>
        <p class="mb-1"><strong>Email:</strong> <a href="mailto:universidadteconlogica@correo.com">universidadteconlogica@correo.com</a></p>
        <p class="mb-1"><strong>Direccion:</strong> Direccion Universidad</p>
        <p class="text-muted mt-3">&copy; 2025 <b>Universidad Tecnologica Nacional</b>. Todos los derechos reservados.</p>
    </div>
</footer>

<?php if ($data['page'] !== 'infoPostGrado'): ?>
   <script src="<?php echo RUTA_URL; ?>/public/js/main.js"></script>
<?php endif; ?>

<?php if ($data['page'] !== 'infoCarrerasDeGrado'): ?>
   <script src="<?php echo RUTA_URL; ?>/public/js/main.js"></script>
<?php endif; ?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


</body>


</html>