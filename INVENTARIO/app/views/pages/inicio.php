
<link rel="stylesheet" href="<?php echo RUTA_URL?>public/css/style.css">
<?php require RUTA_APP .'/views/layout/header.php';?>



<section class="main">
            <!--Posicion Texto-->
            <section class="texto-aislado">
        <div class="container texto-contenedor">
        <div class="texto-interno">


<!--AGREGAR BOTON DE LOGIN!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->

    <p >
        Dashboard
    </p>
    
    <div class="row text-center">
        <!-- Tarjeta 1 (con efecto completo) -->
        <div class="col-md-4 mb-4 tarjeta-destacada"> <!-- ¡Clase nueva aquí! -->
            <h4 class="mb-2">Proveedores</h4>
            <img src="<?php echo RUTA_URL; ?>/Imagenes/Proveedores.png" alt="Icono" class="icono me-0" width="80" height="80">
            <p>0
            </p>
        </div>
        
        <!-- Tarjeta 2 (con efecto completo) -->
        <div class="col-md-4 mb-4 tarjeta-destacada"> <!-- ¡Clase nueva aquí! -->
            <h4 class="mb-2">Productos</h4>
            <img src="<?php echo RUTA_URL; ?>/Imagenes/Productos.png" alt="Icono" class="icono me-0" width="80" height="80">
            <p>0
            </p>
        </div>
        
        <!-- Tarjeta 3 (con efecto completo) -->
        <div class="col-md-4 mb-4 tarjeta-destacada"> <!-- ¡Clase nueva aquí! -->
            <h4 class="mb-2">Movimiento de Stock</h4>
            <img src="<?php echo RUTA_URL; ?>/Imagenes/Stock.png" alt="Icono" class="icono me-0" width="80" height="80">
            <p>0
            </p>
        </div>
    </div>
</section>



<?php require RUTA_APP .'/views/layout/footer.php';?>