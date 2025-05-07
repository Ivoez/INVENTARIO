<?php require RUTA_APP . '/views/layout/header.php'; ?>

<!-- Contenido con fondo -->
<div class="container-fluid d-flex justify-content-center align-items-center position-relative" style="min-height: 100vh; background: url('<?php echo RUTA_URL; ?>/public/img/IMGDeFondo.jpg') no-repeat center center fixed; background-size: cover;">
    <div class="card shadow-lg p-5 rounded-4" style="width: 100%; max-width: 450px; background-color: rgba(255, 255, 255, 0.70); border: none;">
        <h3 class="text-center mb-4">Universidad Tecnológica Nacional (UTN)</h3>

        <p class="text-justify">
            <strong>Bienvenidos a la UTN</strong><br>
            La Universidad Tecnológica Nacional (UTN) es una institución educativa ficticia dedicada a la formación de profesionales altamente capacitados en el ámbito tecnológico, científico y de innovación.
        </p>

        <p class="text-justify">
            <strong>¿Quiénes somos?</strong><br>
            Fundada con el objetivo de impulsar la educación técnica y superior, la UTN se ha consolidado como un referente académico gracias a su compromiso con la excelencia, la inclusión y el progreso.
        </p>

        <p class="text-justify">
            <strong>Oferta académica:</strong>
            <ul>
                <li>Ingeniería en Sistemas</li>
                <li>Ingeniería Electrónica</li>
                <li>Ingeniería Industrial</li>
                <li>Licenciatura en Tecnología de la Información</li>
                <li>Maestrías y especializaciones técnicas</li>
            </ul>
        </p>

        <p class="text-justify">
            <strong>Nuestros valores:</strong>
            <ul>
                <li><strong>Innovación:</strong> Apostamos al desarrollo de nuevas tecnologías y metodologías educativas.</li>
                <li><strong>Compromiso:</strong> Formamos profesionales comprometidos con su entorno social y laboral.</li>
                <li><strong>Calidad:</strong> Promovemos la mejora continua en la enseñanza, investigación y extensión.</li>
            </ul>
        </p>

        <p class="text-justify">
            <strong>Contacto:</strong><br>
            📍 Dirección: Don Bosco 3729, Cdad. Autónoma de Buenos Aires<br>
            📞 Teléfono: +54 11 9520 6408<br>
            📧 Correo: universidadteconlogica@correo.com
        </p>
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
