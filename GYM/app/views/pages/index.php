<?php require RUTA_APP . '/views/layout/landing/header.php'; ?>

<div class="text-center mb-5">
  <h1>BIENVENIDO A GYM-UNLZ!</h1>
  <p>Tu espacio ideal para entrenar y superarte!</p>
</div>

<div class="text-center mb-5">
  <h2 class="text-valores">NUESTROS VALORES:</h2>
</div>

<div class="container my-2">
  <div class="row row-cols-1 row-cols-md-4 text-center">
    <div class="col mb-4">
      <div class="card h-100 overflow-hidden">
        <div class="card-img-container">
          <img src="public/img/imagenlanding3.jpg" class="card-img-top" alt="Disciplina">
          <div class="card-overlay">
            <h5 class="overlay-title">Superación</h5>
            <p class="overlay-text">Cada día es una oportunidad para ser mejor que ayer.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="col mb-4">
      <div class="card h-100 overflow-hidden">
        <div class="card-img-container">
          <img src="public/img/imagenlanding2.jpg" class="card-img-top" alt="Disciplina">
          <div class="card-overlay">
            <h5 class="overlay-title">Comunidad</h5>
            <p class="overlay-text">Entrená en un ambiente motivador y acompañado.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="col mb-4">
      <div class="card h-100 overflow-hidden">
        <div class="card-img-container">
          <img src="public/img/imagenlanding4.jpg" class="card-img-top" alt="Disciplina">
          <div class="card-overlay">
            <h5 class="overlay-title">Fuerza</h5>
            <p class="overlay-text">No solo física, también mental para no rendirse.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="col mb-4">
      <div class="card h-100 overflow-hidden">
        <div class="card-img-container">
          <img src="public/img/imagenlanding1.jpg" class="card-img-top" alt="Disciplina">
          <div class="card-overlay">
            <h5 class="overlay-title">Disciplina</h5>
            <p class="overlay-text">La constancia es la clave para alcanzar tus metas.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<div class="call-to-action my-5">
  <div class="overlay-text">
    <h2>NO SOS PARTE? <a href="#">UNITE A NUESTRA FAMILIA!</a></h2>
  </div>
</div>

<div class="text-center mb-5">
  <h2 class="text-ubi">NUESTRA UBICACION:</h2>
</div>

<div class="container my-5">
  <div class="row row-cols-1 row-cols-md-2 g-4 text-center">

    <div class="col">
      <div class="card h-100">
        <div class="embed-map-fixed">
          <div class="embed-map-container">
            <iframe class="embed-map-frame" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
              src="https://maps.google.com/maps?width=600&height=400&hl=en&q=fiter%20flores&t=&z=15&ie=UTF8&iwloc=B&output=embed">
            </iframe>
          </div>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card h-100">
        <img src="public/img/afichegym.png" class="card-img-top img-fluid h-100">
      </div>
    </div>

  </div>
</div>


<?php require RUTA_APP . '/views/layout/landing/footer.php'; ?>