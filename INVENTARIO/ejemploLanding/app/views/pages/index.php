<?php require RUTA_APP .'/views/layout/header.php';?>

 <!--FUENTE DE GOOGLE FONTS PARA PROBAR, SE IMPORTA IGUAL QUE UNA HOJA DE ESTILO-->

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Special+Gothic+Expanded+One&display=swap">



<header>

<!--barra de navegacion-->

<nav class="navbar-custom "> <!-- FALTARIA AGREGAR LOGO SIN QUE ESTE AFECTA A LAS DIMENSIONES DE LA NAVBAR-->
  
<div     
    class = "container-fluid">
    <h1 class="text-white">Inventario S.A</h1>  
</div>

<!--boton sign in-->
<a input type="submit" href= "login.html" >
<button class="boton-animado">Sign in</button>
</a>
</nav>
    

</header>


<main class="main">

        <!--texto centrado-->

    <div class="container d-flex flex-column justify-content-center align-items-center vh-100">
    <div class="w-40 text-white text-center fs-4 texto-centro">

    <p>
        Ofrecemos un servicio de alta calidad enfocado en tus necesidades.</p> Nuestro objetivo es brindarte la mejor </p>experiencia <p>con profesionalismo y atención personalizada.</p>
    </p>
    
    </div>
   <!--Imagen logo a la derecha del texto -->

    <img src="<?php echo RUTA_URL; ?>/Imagenes/LogoIndex.jpg" alt="Imagen del servicio" class="img-fluid rounded shadow mt-4" style="max-width: 100%; width: 250px; height: auto;">
     </div>

    



    

</main>



<?php require RUTA_APP .'/views/layout/footer.php';?>