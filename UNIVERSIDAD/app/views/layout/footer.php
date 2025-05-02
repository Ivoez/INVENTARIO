<footer id="footerinfo" class="py-4 mt-5 border-top">
    <div class="container text-center">
        <img src="<?php echo RUTA_URL ?>/public/img/logoUniversidad.png" alt="Logo Universidad Papa Francisco" class="mb-3" style="max-width: 120px;">
        <h5 class="mb-2">Universidad Tecnológica Nacional</h5>
        <p class="mb-1"><strong>Teléfono:</strong> +54 11 9520 6408</p>
        <p class="mb-1"><strong>Email:</strong> <a href="mailto:universidadteconlogica@correo.com">universidadteconlogica@correo.com</a></p>
        <p class="mb-1"><strong>Dirección:</strong> Dirección Universidad</p>
        <p class="text-muted mt-3">&copy; 2025 <b>Universidad Tecnológica Nacional</b>. Todos los derechos reservados.</p>
    </div>
</footer>

<?php if (!isset($data['page']) || $data['page'] !== 'infoPostGrado'): ?>
    <script src="<?php echo RUTA_URL; ?>/public/js/main.js"></script>
<?php endif; ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Bootstrap Icons -->
<script src="<?php echo RUTA_URL?>/public/js/scriptCarrerasGrado.js" defer></script>
<script src="<?php echo RUTA_URL?>/public/js/script.js" defer></script>

</body>
</html>
