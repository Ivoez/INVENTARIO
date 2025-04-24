<?php 
// Incluimos el archivo header.php que contiene la estructura del encabezado HTML y enlaces a estilos
require RUTA_APP .'/views/layout/header.php'; 
?>

<header>
    <!-- Barra de navegación con fondo blanco y sombra -->
    <nav class="navbar navbar-light bg-white shadow-sm px-3">
        <div class="container-fluid d-flex justify-content-between align-items-center">
                <!-- Imagen del logo -->
                <img src="<?php echo RUTA_URL; ?>/img/img_UNLZ.jpg" alt="Logo" width="40" height="40" class="me-2">
            </a>

            <!-- Botón para ir a la vista de login (FALTA COMPLETAR LA RUTA!!!!) -->
            <a class="btn btn-success" href="<?php echo RUTA_URL; ?>/Completar_Ruta">Iniciar Sesión</a>
        </div>
    </nav>
</header>

<main class="container my-3">
    <!-- Titulo principal centrado -->
    <div class="row">
        <div class="col text-center">
            <h1 class="text-success mb-4">Sistema de Gestion de Inventario</h1>
        </div>
    </div>

    <div class="row">
        <!-- Columna izquierda: texto -->
        <div class="col-md-4 d-flex flex-column justify-content-start">
            <h2 class="text-dark mb-3">Gestión de Inventario</h2>
            <p class="text-muted">
                Simplificá el control de tus productos, optimizá el stock y mantené tu negocio siempre organizado desde un solo lugar.
            </p>
        </div>

        <!-- Columna derecha: imagen ilustrativa -->
        <div class="col-md-8">
            <img src="<?php echo RUTA_URL; ?>/img/img_inventario.jpg" class="img-fluid rounded shadow" alt="Imagen de inventario">
        </div>
    </div>
</main>

<?php 
// Incluimos el archivo footer.php que contiene el pie de pagina y scripts necesarios
require RUTA_APP .'/views/layout/footer.php'; 
?>
