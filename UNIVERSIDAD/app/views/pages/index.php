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








    <h3><?php echo $data['title']; ?></h3>

    
  <!-- Carreras -->




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
