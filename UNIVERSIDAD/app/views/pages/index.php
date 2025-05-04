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

    <h3 class="text-center mb-0"><?php echo $data['title']; ?></h3>

  <!-- Carreras -->

  <div class="container py-4">
  <div class="row row-cols-1 row-cols-md-3 g-4">
    
    <!-- Card 1: Carreras de Grado -->
    <div class="col">
      <div class="card h-100 shadow-sm">
        <img src="<?php echo RUTA_URL; ?>/img/ImagenGrado.jpeg" class="card-img-top" alt="Carreras de Grado">
        <div class="card-body text-center">
          <h5 class="card-title">Carreras de Grado</h5>
          <p class="card-text">Programas universitarios enfocados en ciencia y tecnología para tu desarrollo profesional.</p>
          <a href="<?php echo RUTA_URL; ?>/Pages/infoCarrerasDeGrado" class="btn btn-primary">Ver más</a>
        </div>
      </div>
    </div>

    <!-- Card 2: Post-Grado -->
    <div class="col">
      <div class="card h-100 shadow-sm">
        <img src="<?php echo RUTA_URL; ?>/img/ImagenPostGrado.jpg" class="card-img-top" alt="Carreras de Post-Grado">
        <div class="card-body text-center">
          <h5 class="card-title">Carreras de Post-Grado</h5>
          <p class="card-text">Especializaciones para potenciar tu carrera con conocimientos avanzados y actualizados.</p>
          <a href="<?php echo RUTA_URL; ?>/Pages/infoPostGrado" class="btn btn-primary">Ver más</a>
        </div>
      </div>
    </div>

    <!-- Card 3: Cursos -->
    <div class="col">
      <div class="card h-100 shadow-sm">
        <img src="<?php echo RUTA_URL; ?>/img/ImagenCursos.jpg" class="card-img-top" alt="Cursos a distancia">
        <div class="card-body text-center">
          <h5 class="card-title">Cursos a Distancia</h5>
          <p class="card-text">Capacitate online en áreas tecnológicas, con flexibilidad y calidad académica.</p>
          <a href="<?php echo RUTA_URL; ?>/Pages/Info"  class="btn btn-primary">Ver más</a>
        </div>
      </div>
    </div>

  </div>
</div>




  <!--universidad info -->

  <section class="container my-5 seccion-universidad">
    <div class="row align-items-center">
        <div class="col-md-6">
        <img src="img/Universidad.jpg" alt="Cursos" class="img-fluid custom-img">
        </div>
        <div class="col-md-6">
            <h2 class="mb-3">Universidad Tecnologica Nacional: Innovación que transforma</h2>
            <p class="mb-4">Formamos profesionales altamente capacitados en ciencia, ingeniería y tecnología, con un enfoque práctico, multidisciplinario y adaptado al futuro del trabajo.</p>
            <a href="#" class="btn btn-primary btn-lg">Solicitá tu cupo ahora</a>
        </div>
    </div>
</section>

<section class="container my-5 seccion-contenedor">
    <div class="text-center mb-4">
        <h2>Programas Académicos en Ciencia y Tecnología</h2>
        <p>Desarrollamos talento para liderar la transformación digital y la innovación en la industria moderna.</p>
    </div>
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <h4 class="mb-2">Ingeniería en Software</h4>
            <p>Diseño, desarrollo y gestión de sistemas y aplicaciones. Capacitación en lenguajes modernos, metodologías ágiles y arquitectura de software.</p>
        </div>
        <div class="col-md-4 mb-4">
            <h4 class="mb-2">Ciencia de Datos e Inteligencia Artificial</h4>
            <p>Formación en análisis de datos, machine learning y algoritmos inteligentes. Aplicaciones en industria, salud, finanzas y más.</p>
        </div>
        <div class="col-md-4 mb-4">
            <h4 class="mb-2">Ingeniería en Robótica y Automatización</h4>
            <p>Estudios avanzados en sistemas ciberfísicos, robótica industrial, sensores inteligentes y automatización de procesos.</p>
        </div>
    </div>
</section>


    


  <!--boton para volver al top de la pagina -->
  <a href="#navegadorPaginaPrincipal" class="btn btn-primary position-fixed bottom-0 end-0 m-4 rounded-circle" title="Volver arriba">
    <i class="bi bi-arrow-up-circle-fill fs-3" ></i>
  </a>
  <!--footer -->
  
<?php require RUTA_APP .'/views/layout/footer.php';?>
