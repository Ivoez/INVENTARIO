<?php require RUTA_APP .'/views/layout/header.php';?>

<div class="text-center mb-5">
    <h1>Bienvenido al GYM</h1>
    <p>Un espacio ideal para entrenar y superarse.</p>
</div>

<div class="container my-5">
  <div class="row text-center">
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="public/img/stockimg-landing-1.jpg" class="card-img-top" alt="Disciplina">
        <div class="card-body">
          <h5 class="card-title">Disciplina</h5>
          <p class="card-text">La constancia es la clave para alcanzar tus metas.</p>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="public/img/stockimg-landing-3.jpg" class="card-img-top" alt="Superación">
        <div class="card-body">
          <h5 class="card-title">Superación</h5>
          <p class="card-text">Cada día es una oportunidad para ser mejor que ayer.</p>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="public/img/stockimg-landing-2.jpg" class="card-img-top" alt="Comunidad">
        <div class="card-body">
          <h5 class="card-title">Comunidad</h5>
          <p class="card-text">Entrená en un ambiente motivador y acompañado.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="text-center mb-5">
    <h2>Unite a nuestra familia!</h2>
</div>

<div class="row justify-content-center mb-5">
    <div class="col-md-4 text-center mb-3">
        <a href="#" class="btn btn-primary btn-lg w-100">Registrarse como Socio</a>
    </div>
    <div class="col-md-4 text-center mb-3">
        <div>
        <a href="#" class="btn btn-secondary btn-lg w-100">Acceder como Administrador</a>
        </div>
    </div>
</div>

<?php require RUTA_APP .'/views/layout/footer.php';?>