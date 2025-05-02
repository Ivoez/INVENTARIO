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
    <div class="carousel-item active" data-bs-interval="10000">
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
    <div class="carousel-item">
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

  <div class="container text-center py-4">
  <div class="row justify-content-center g-5">
    <!-- IMAGEN 1 -->
    <div class="col-md-4 position-relative image-wrapper">
      <a href="<?php echo RUTA_URL; ?>/Pages/infoCarrerasDeGrado" target="_blank">
        <img src="img/ImagenGrado.jpeg" alt="CarreraGrado" class="img-fluid custom-img">
      </a>
      <div class="overlay-text"> Carreras de Grado </div> 
    </div>
    <!-- IMAGEN 2 -->
    <div class="col-md-4 position-relative image-wrapper">
      <a href="<?php echo RUTA_URL; ?>/Pages/infoPostGrado" target="_blank"> 
        <img src="img/ImagenPostGrado.jpg" alt="PostGrado" class="img-fluid custom-img">
      </a>
      <div class="overlay-text"> Carreras de Post-Grado </div>
    </div>
    <!-- IMAGEN 3 -->
    <div class="col-md-4 position-relative image-wrapper">
    <a href="<?php echo RUTA_URL; ?>/Pages/Info" target="_blank">
        <img src="img/ImagenCursos.jpg" alt="Cursos" class="img-fluid custom-img">
      </a>
      <div class="overlay-text"> Cursos a distancia </div>
    </div>
  </div>
</div>
<!-- ESTILO IMAGENES Y TEXTO -->
<style>
  .custom-img{ 
    width: 100%;
    height: 300px;
    object-fit: cover;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    transition: transform 0.3s ease;
    margin-top: 50px;
  }

  .image-wrapper:hover .custom-img{
    transform: scale(1.05);
  }

  .position-relative{
    position: relative;
    overflow: hidden;
  }

  .overlay-text{
    position: absolute;
    top: 70%;
    left: 75%;
    transform: translate(-50%, -50%);
    color: white;
    background-color: rgba(0, 0, 0, 0.5);
    padding: 10px 20px;
    border-radius: 6px;
    font-size: 1.2rem;
    font-weight: bold;
  }
  </style>



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
