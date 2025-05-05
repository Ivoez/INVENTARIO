<?php require RUTA_APP .'/views/layout/header.php';?>

  

    <!--imagen con carusel -->
    <div id="carouselExampleDark" class="carousel carousel-dark slide mb-3">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
   <!--<button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>-->
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="2000">
      <img src="img/cursos.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block" style="color: white; font-size: 24px;">
        <h5>PROGRAMAS ACADÉMICOS DE EXCELENCIA</h5>
        <p>"En la Universidad Tecnológica Nacional, ofrecemos una amplia variedad de cursos diseñados para transformar tu futuro profesional. Adquiere habilidades avanzadas en tecnología, ciencia e innovación con una formación que te prepara para liderar en un mundo digital en constante cambio".</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="img/estudiante.jpeg" class="d-block w-100" alt="..." >
      <div class="carousel-caption d-none d-md-block" style="color: white; font-size: 20px;">
        <h5>INCRIPCIONES ABIERTAS</h5>
        <p>"Inscríbete hoy y comienza tu viaje hacia un futuro brillante."</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="img/grupo.jpg" class="d-block w-100" alt="..." >
      <div class="carousel-caption d-none d-md-block" style="color: white; font-size: 20px;">
        <h5>TU FUTURO ESTA AQUÍ</h5>
        <p>"Desarrolla tus habilidades en un entorno que fomenta la creatividad y la colaboración.".</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


  <!-- Carreras -->

  <section class="py-5 ">
  <div class="container py-4">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      
      <!-- Card 1: Carreras de Grado -->
      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="<?php echo RUTA_URL; ?>/img/ImagenGrado.jpeg" class="card-img-top img-card" alt="Carreras de Grado">
          <div class="card-body text-center">
            <h5 class="card-title">Carreras de Grado</h5>
            <p class="card-text">Programas universitarios enfocados en ciencia y tecnología para tu desarrollo profesional.</p>
            <a href="<?php echo RUTA_URL; ?>/Pages/infoCarrerasDeGrado" class="stretched-link">Ver más</a>
          </div>
        </div>
      </div>

      <!-- Card 2: Post-Grado -->
      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="<?php echo RUTA_URL; ?>/img/ImagenPostGrado.jpg" class="card-img-top img-card" alt="Carreras de Post-Grado">
          <div class="card-body text-center">
            <h5 class="card-title">Carreras de Post-Grado</h5>
            <p class="card-text">Especializaciones para potenciar tu carrera con conocimientos avanzados y actualizados.</p>
            <a href="<?php echo RUTA_URL; ?>/Pages/infoPostGrado" class="stretched-link">Ver más</a>
          </div>
        </div>
      </div>

      <!-- Card 3: Cursos -->
      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="<?php echo RUTA_URL; ?>/img/ImagenCursos.jpg" class="card-img-top img-card" alt="Cursos a distancia">
          <div class="card-body text-center">
            <h5 class="card-title">Cursos a Distancia</h5>
            <p class="card-text">Capacitate online en áreas tecnológicas, con flexibilidad y calidad académica.</p>
            <a href="<?php echo RUTA_URL; ?>/Pages/InfoCursos" class="stretched-link">Ver más</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>




  <!--universidad info -->
  <section class="container my-5 py-4 px-3 bg-light rounded shadow seccion-universidad">
  <div class="row align-items-center">
    <!-- Imagen -->
    <div class="col-lg-6 mb-4 mb-lg-0">
      <img src="img/Universidad.jpg" alt="Universidad" class="img-fluid rounded-3 w-100 shadow-sm">
    </div>

    <!-- Universidad tecnologica -->
    <div class="col-lg-6">
      <h2 class="mb-3 fw-bold text-primary">Universidad Tecnológica Nacional: Innovación que transforma</h2>
      <p class="mb-4 text-muted">
        Formamos profesionales altamente capacitados en ciencia, ingeniería y tecnología, con un enfoque práctico, multidisciplinario y adaptado al futuro del trabajo.
      </p>
      <a href="#" class="btn btn-primary btn-lg shadow">Solicitá tu cupo ahora</a>
    </div>
  </div>
</section>

<!-- Programas academicos -->

<section class="container my-5 py-4 px-3 bg-light rounded shadow seccion-contenedor">
  <div class="text-center mb-5">
    <h2 class="fw-bold text-primary">Programas Académicos en Ciencia y Tecnología</h2>
    <p class="p-2 text-muted">Desarrollamos talento para liderar la transformación digital y la innovación en la industria moderna.</p>
  </div>
  
  <div class="row row-cols-1 row-cols-md-3 g-4 text-center">
    <div class="col-md-4 mb-4">
      <div class="p-4 h-100 border rounded shadow-sm bg-white">
        <h4 class="mb-3 text-secondary">Ingeniería en Software</h4>
        <p class="text-muted">
          Diseño, desarrollo y gestión de sistemas y aplicaciones. Capacitación en lenguajes modernos, metodologías ágiles y arquitectura de software.
        </p>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="p-4 h-100 border rounded shadow-sm bg-white">
        <h4 class="mb-3 text-secondary">Ciencia de Datos e Inteligencia Artificial</h4>
        <p class="text-muted">
          Formación en análisis de datos, machine learning y algoritmos inteligentes. Aplicaciones en industria, salud, finanzas y más.
        </p>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="p-4 h-100 border rounded shadow-sm bg-white">
        <h4 class="mb-3 text-secondary">Ingeniería en Robótica y Automatización</h4>
        <p class="text-muted">
          Estudios avanzados en sistemas ciberfísicos, robótica industrial, sensores inteligentes y automatización de procesos.
        </p>
      </div>
    </div>
  </div>
</section>

    


  <!--boton para volver al top de la pagina -->
  <a href="#navegadorPaginaPrincipal" class="btn btn-primary position-fixed bottom-0 end-0 m-4 rounded-circle" title="Volver arriba">
    <i class="bi bi-arrow-up-circle-fill fs-3" ></i>
  </a>
  <!--footer -->
  
<?php require RUTA_APP .'/views/layout/footer.php';?>
