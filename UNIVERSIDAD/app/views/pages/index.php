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




  <!--universidad info -->





  <!--boton para volver al top de la pagina -->
  <a href="#navegadorPaginaPrincipal" class="btn btn-primary position-fixed bottom-0 end-0 m-4 rounded-circle" title="Volver arriba">
    <i class="bi bi-arrow-up-circle-fill fs-3" ></i>
  </a>
  <!--footer -->
<?php require RUTA_APP .'/views/layout/footer.php';?>
