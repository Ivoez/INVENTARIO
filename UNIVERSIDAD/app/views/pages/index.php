<?php require RUTA_APP .'/views/layout/header.php';?>

  
<!--Header -->
<header>
    <!--Navegador -->
        <nav id="navegadorPaginaPrincipal" class="navbar navbar-expand-lg px-3">
            <div class="dropdown me-5">
              <a class="user-icon" href="#" role="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false" style="color:rgb(200, 230, 252);">
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

  <div class="container text-center py-5">
  <div class="row justify-content-center g-5">
    <!-- IMAGEN 1 -->
    <div class="col-md-4 position-relative image-wrapper">
      <img src="img/ImagenGrado.jpeg" alt="CarreraGrado" class="img-fluid custom-img">
      <div class="overlay-text"> Carreras de Grado </div> 
    </div>
    <!-- IMAGEN 2 -->
    <div class="col-md-4 position-relative image-wrapper">
      <img src="img/ImagenPostGrado.jpg" alt="PostGrado" class="img-fluid custom-img">
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





  <!--boton para volver al top de la pagina -->
  <a href="#navegadorPaginaPrincipal" class="btn btn-primary position-fixed bottom-0 end-0 m-4 rounded-circle" title="Volver arriba">
    <i class="bi bi-arrow-up-circle-fill fs-3" ></i>
  </a>
  <!--footer -->
<?php require RUTA_APP .'/views/layout/footer.php';?>
