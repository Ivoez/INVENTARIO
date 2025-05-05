<?php require RUTA_APP . '/views/layout/header.php'; ?>

<!-- Agregar imagen de fondo a toda la página -->
<div style="background-image: url('img/IMGDeFondo.jpg'); background-size: cover; background-position: center; background-attachment: fixed;">

  <div id="carouselUTN" class="carousel slide carousel-fade mb-5" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselUTN" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselUTN" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselUTN" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
      <!-- Slide 1 -->
      <div class="carousel-item active">
        <img src="img/GrupoEstudiantes.jpg" class="d-block w-100" style="object-fit: cover; height: 500px;" alt="Cursos">
        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
          <h5 class="text-white fw-bold">PROGRAMAS ACADÉMICOS DE EXCELENCIA</h5>
          <p class="text-white">Transformá tu futuro con cursos innovadores en tecnología, ciencia e ingeniería.</p>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <img src="img/EdificioUni.jpg" class="d-block w-100" style="object-fit: cover; height: 500px;" alt="Estudiante">
        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
          <h5 class="text-white fw-bold">INSCRIPCIONES ABIERTAS</h5>
          <p class="text-white">Sumate hoy y empezá a construir un futuro profesional brillante.</p>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item">
        <img src="img/grupo.jpg" class="d-block w-100" style="object-fit: cover; height: 500px;" alt="Grupo de estudiantes">
        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
          <h5 class="text-white fw-bold">TU FUTURO ESTÁ AQUÍ</h5>
          <p class="text-white">Aprendé en un entorno que potencia tu creatividad y colaboración.</p>
        </div>
      </div>
    </div>

    <!-- Controles -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselUTN" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselUTN" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>

  <!-- Carreras -->
  <section class="py-5 bg-gradient-to-r from-blue-500 to-indigo-600 text-white">
    <div class="container py-4">
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- Card 1: Carreras de Grado -->
        <div class="col d-flex align-items-stretch">
          <div class="card h-100 border-0 shadow-lg rounded-3 bg-gradient-to-r from-teal-400 to-green-500">
            <img src="<?php echo RUTA_URL; ?>/img/ImagenGrado.jpeg" class="card-img-top" alt="Carreras de Grado">
            <div class="card-body text-center">
              <h5 class="card-title">Carreras de Grado</h5>
              <p class="card-text">Programas universitarios enfocados en ciencia y tecnología para tu desarrollo profesional.</p>
              <a href="<?php echo RUTA_URL; ?>/Pages/infoCarrerasDeGrado" class="btn btn-outline-light">Ver más</a>
            </div>
          </div>
        </div>

        <!-- Card 2: Post-Grado -->
        <div class="col d-flex align-items-stretch">
          <div class="card h-100 border-0 shadow-lg rounded-3 bg-gradient-to-r from-pink-400 to-purple-500">
            <img src="<?php echo RUTA_URL; ?>/img/ImagenPostGrado.jpg" class="card-img-top" alt="Carreras de Post-Grado">
            <div class="card-body text-center">
              <h5 class="card-title">Carreras de Post-Grado</h5>
              <p class="card-text">Especializaciones para potenciar tu carrera con conocimientos avanzados y actualizados.</p>
              <a href="<?php echo RUTA_URL; ?>/Pages/infoPostGrado" class="btn btn-outline-light">Ver más</a>
            </div>
          </div>
        </div>

        <!-- Card 3: Cursos -->
        <div class="col d-flex align-items-stretch">
          <div class="card h-100 border-0 shadow-lg rounded-3 bg-gradient-to-r from-orange-400 to-yellow-500">
            <img src="<?php echo RUTA_URL; ?>/img/ImagenCursos.jpg" class="card-img-top" alt="Cursos a distancia">
            <div class="card-body text-center">
              <h5 class="card-title">Cursos a Distancia</h5>
              <p class="card-text">Capacitate online en áreas tecnológicas, con flexibilidad y calidad académica.</p>
              <a href="<?php echo RUTA_URL; ?>/Pages/InfoCursos" class="btn btn-outline-light">Ver más</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Información Universidad -->
  <section class="container my-5 py-4 px-3 bg-gradient-to-r from-gray-100 to-gray-300 rounded shadow-lg seccion-universidad">
    <div class="row align-items-center">
      <!-- Imagen -->
      <div class="col-lg-6 mb-4 mb-lg-0">
        <img src="img/ImaUniversi.jpg" alt="Universidad" class="img-fluid rounded-3 w-100 shadow-sm">
      </div>

      <!-- Universidad tecnológica -->
      <div class="col-lg-6">
        <h2 class="mb-3 fw-bold text-primary">Universidad Tecnológica Nacional: Innovación que transforma</h2>
        <p class="mb-4 text-muted">
          Formamos profesionales altamente capacitados en ciencia, ingeniería y tecnología, con un enfoque práctico, multidisciplinario y adaptado al futuro del trabajo.
        </p>
        <a href="<?php echo RUTA_URL; ?>/AuthController/loginUsuario" class="btn" style="background: rgba(0, 0, 0, 0.5); border: 1px solid rgba(255, 255, 255, 0.5); color: white;">Acceder a mi cuenta</a>
        
      </div>
    </div>
  </section>

  <!-- Programas académicos -->
  <section class="container my-5 py-4 px-3 bg-gradient-to-r from-teal-100 to-teal-200 rounded shadow-lg seccion-contenedor">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-primary">Programas Académicos en Ciencia y Tecnología</h2>
      <p class="p-2" style="color: white !important;">Desarrollamos talento para liderar la transformación digital y la innovación en la industria moderna.</p>

    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4 text-center">
      <div class="col-md-4 mb-4">
        <div class="p-4 h-100 border rounded shadow-lg bg-white">
          <h4 class="mb-3 text-primary">Ingeniería en Software</h4>
          <p class="text-muted">
            Diseño, desarrollo y gestión de sistemas y aplicaciones. Capacitación en lenguajes modernos, metodologías ágiles y arquitectura de software.
          </p>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="p-4 h-100 border rounded shadow-lg bg-white">
          <h4 class="mb-3 text-primary">Ciencia de Datos e Inteligencia Artificial</h4>
          <p class="text-muted">
            Formación en análisis de datos, machine learning y algoritmos inteligentes. Aplicaciones en industria, salud, finanzas y más.
          </p>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="p-4 h-100 border rounded shadow-lg bg-white">
          <h4 class="mb-3 text-primary">Ingeniería en Robótica y Automatización</h4>
          <p class="text-muted">
            Estudios avanzados en sistemas ciberfísicos, robótica industrial, sensores inteligentes y automatización de procesos.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Botón para volver al top -->
  <a href="#navegadorPaginaPrincipal" class="btn btn-primary position-fixed bottom-0 end-0 m-4 rounded-circle" title="Volver arriba">
    <i class="bi bi-arrow-up-circle-fill fs-3"></i>
  </a>

  <!-- Script para forzar el arranque automático del carrusel -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const myCarouselElement = document.querySelector('#carouselUTN');
      if (myCarouselElement) {
        new bootstrap.Carousel(myCarouselElement, {
          interval: 3000,
          ride: 'carousel',
          pause: false, // por si pasa el mouse encima
          wrap: true
        });
      }
    });
  </script>

</div>

<?php require RUTA_APP . '/views/layout/footer.php'; ?>
