<?php require RUTA_APP . '/views/layout/header.php'; ?>

<!-- Contenido con fondo -->
<div class="container-fluid d-flex justify-content-center align-items-center position-relative" style="min-height: 100vh; background: url('<?php echo RUTA_URL; ?>/public/img/IMGDeFondo.jpg') no-repeat center center fixed; background-size: cover;">
    <div class="card shadow-lg p-5 rounded-4" style="width: 100%; max-width: 600px; background-color: rgba(255, 255, 255, 0.95); border: none;">
        

        <div class="mb-4 text-center">
            <h2 class="text-dark fw-bold">Universidad Tecnológica Nacional</h2>
            <p class="text-muted">Formando el futuro desde hoy</p>
            <hr class="my-3">
        </div>

        <section class="mb-4">
            <h5 class="text-primary fw-semibold"><i class="fas fa-university me-2"></i>¿Quiénes somos?</h5>
            <p>La UTN es una institución educativa comprometida con la excelencia, la innovación y la formación de profesionales en áreas tecnológicas y científicas.</p>
        </section>

        <section class="mb-4">
            <h5 class="text-primary fw-semibold"><i class="fas fa-book me-2"></i>Oferta Académica</h5>
            <ul class="list-unstyled ps-3">
                <li>🎓 Ingeniería en Sistemas</li>
                <li>🔌 Ingeniería Electrónica</li>
                <li>🏭 Ingeniería Industrial</li>
                <li>💻 Licenciatura en Tecnología de la Información</li>
                <li>📚 Maestrías y especializaciones técnicas</li>
            </ul>
        </section>

        <section class="mb-4">
            <h5 class="text-primary fw-semibold"><i class="fas fa-heart me-2"></i>Nuestros Valores</h5>
            <ul class="list-unstyled ps-3">
                <li><strong>💡 Innovación:</strong> Desarrollo de tecnologías y métodos educativos modernos.</li>
                <li><strong>🤝 Compromiso:</strong> Con el entorno social y profesional.</li>
                <li><strong>📈 Calidad:</strong> Mejora continua en educación e investigación.</li>
            </ul>
        </section>

        <section>
            <h5 class="text-primary fw-semibold"><i class="fas fa-envelope me-2"></i>Contacto</h5>
            <p class="mb-1">📍 Don Bosco 3729, CABA</p>
            <p class="mb-1">📞 +54 11 9520 6408</p>
            <p>📧 universidadteconlogica@correo.com</p>
        </section>
    </div>
</div>


<!-- Botón Volver a la Landing Page (Arriba Izquierda) -->
<a href="<?php echo RUTA_URL; ?>" class="btn btn-secondary" id="backToLandingBtn" aria-label="Volver a la landing"
   style="position: absolute; top: 150px; left: 20px; z-index: 1000; padding: 10px 20px; background-color: rgba(14, 0, 0, 0.397); color: white; border: none; border-radius: 30px; font-size: 16px; transition: background-color 0.3s ease;">
   Volver a Inicio
</a>

<!-- Botón Volver Arriba (Flecha Azul) -->
<a href="#" class="btn btn-primary rounded-circle" id="backToTopBtn" aria-label="Volver al inicio"
   style="position: fixed; bottom: 20px; right: 20px; z-index: 1000; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; background-color: #007bff; border: none; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); transition: background-color 0.3s ease;">
   <i class="fas fa-arrow-up text-white" style="font-size: 25px;"></i>
</a>

<!-- Script para scroll suave -->
<script>
    document.getElementById("backToTopBtn").addEventListener("click", function(e) {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
</script>

<!-- Efectos Hover con JS -->
<script>
    const backToTopBtn = document.getElementById("backToTopBtn");
    const backToLandingBtn = document.getElementById("backToLandingBtn");

    // Hover para el botón "Volver arriba"
    backToTopBtn.addEventListener('mouseover', () => {
        backToTopBtn.style.backgroundColor = '#0056b3';  // Cambia el color azul al pasar el mouse
    });
    backToTopBtn.addEventListener('mouseout', () => {
        backToTopBtn.style.backgroundColor = '#007bff';  // Vuelve al color original azul
    });

    // Hover para el botón "Volver a la Landing"
    backToLandingBtn.addEventListener('mouseover', () => {
        backToLandingBtn.style.backgroundColor = '#1ABC9C';  // Cambia el color cuando pasa el mouse
    });
    backToLandingBtn.addEventListener('mouseout', () => {
        backToLandingBtn.style.backgroundColor = 'rgba(14, 0, 0, 0.397)';  // Vuelve al color original
    });
</script>

<?php require RUTA_APP . '/views/layout/footer.php'; ?>
