<?php require RUTA_APP .'/views/layout/header.php';?>

  
<!--Header -->
<header>
    <!--Navegador -->
        <nav id="navegadorPaginaPrincipal" class="navbar navbar-expand-lg px-3">
            <div class="dropdown me-5">
              <a class="user-icon" href="#" role="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false" style="color:rgb(3, 40, 66);">
                <img src="<?php echo RUTA_URL; ?>/img/logoUniversidad.png" alt="LogoIzq" class="me-2 rounded-circle" style="width: 50px; height: 50px;">
              </a>
            </div> 
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto"> 
                <li class="nav-item">
                  <a class="nav-link active text-white" href="">Ingresar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="#informacion">Informacion</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="#piePagina">Contactanos</a>
                </li>
              </ul>
            </div>
          </nav>
</header>
    <!--imagen con carusel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="..." alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>







    <h3><?php echo $data['title']; ?></h3>

    
  <!-- Carreras -->

  <div class="container text-center py-5">
  <div class="row justify-content-center g-5">
    <!-- IMAGEN 1 -->
    <div class="col-md-4 position-relative image-wrapper">
      <a href="https://getbootstrap.com/docs/5.3/layout/grid/" target="_blank">
        <img src="img/ImagenGrado.jpeg" alt="CarreraGrado" class="img-fluid custom-img">
      </a>
      <div class="overlay-text"> Carreras de Grado </div> 
    </div>
    <!-- IMAGEN 2 -->
    <div class="col-md-4 position-relative image-wrapper">
      <a href="https://getbootstrap.com/docs/5.3/layout/grid/" target="_blank"> 
        <img src="img/ImagenPostGrado.jpg" alt="PostGrado" class="img-fluid custom-img">
      </a>
      <div class="overlay-text"> Carreras de Post-Grado </div>
    </div>
    </div>
  </div>
</div>
<!-- ESTILO IMAGENES Y TEXTO -->
<style>
  .custom-img{ 
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    transition: transform 0.3s ease;
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

  <section class="container my-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <!-- Aquí podés insertar una imagen tecnológica: campus moderno, estudiantes en laboratorio, etc. -->
        </div>
        <div class="col-md-6">
            <h2 class="mb-3">Universidad Tecnologica Nacional: Innovación que transforma</h2>
            <p class="mb-4">Formamos profesionales altamente capacitados en ciencia, ingeniería y tecnología, con un enfoque práctico, multidisciplinario y adaptado al futuro del trabajo.</p>
            <a href="#" class="btn btn-primary btn-lg">Solicitá tu cupo ahora</a>
        </div>
    </div>
</section>

<section class="container my-5">
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
