
<link rel="stylesheet" href="<?php echo RUTA_URL?>/css/style.css">
<?php require RUTA_APP .'/views/layout/header.php';?>



<section class="main">
            <!--Posicion Texto-->
            <section class="texto-aislado">
        <div class="container texto-contenedor">
        <div class="texto-interno">

    <p >
        Deshboard
    </p>
    
    <div class="row text-center">
        <!-- Tarjeta 1 (con efecto completo) -->
        <div class="col-md-4 mb-4 tarjeta-destacada"> <!-- ¡Clase nueva aquí! -->
            <h4 class="mb-2">Proveedores</h4>
            <p>0
            </p>
        </div>
        
        <!-- Tarjeta 2 (con efecto completo) -->
        <div class="col-md-4 mb-4 tarjeta-destacada"> <!-- ¡Clase nueva aquí! -->
            <h4 class="mb-2">Productos</h4>
            <p>0
            </p>
        </div>
        
        <!-- Tarjeta 3 (con efecto completo) -->
        <div class="col-md-4 mb-4 tarjeta-destacada"> <!-- ¡Clase nueva aquí! -->
            <h4 class="mb-2">Movimiento de Stock</h4>
            <p>0
            </p>
        </div>
    </div>
</section>



<?php require RUTA_APP .'/views/layout/footer.php';?>