<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Inventario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dash.css">
    <link rel="shortcut icon" href="<?php echo RUTA_URL; ?>/Imagenes/InventarioIcono.ico" type="image/x-icon">
</head>
<body>

    <!-- Sidebar fija -->
    <div class="sidebar">

        <hr/><hr/>
        <h4 class="text-center">Navegación principal</h4>
        <hr/><hr/>

        <a href="#">Dashboard</a>
        <a href="#">Proveedores</a>
        <a href="#">Productos</a>
        <a href="#">Usuarios</a>
    </div>

    <!-- Contenido principal -->
    <div class="main-content">
        <hr/>
        <h2><b> Web - LOGISTICA RST</b></h2>
        <hr/><hr/>
        <div class="row">
            <div class="col-md-4">
                <div class="card-dashboard">Proveedores</div>
            </div>
            <div class="col-md-4">
                <div class="card-dashboard">Productos en stock</div>
            </div>
            <div class="col-md-4">
                <div class="card-dashboard">Órdenes de Compra</div>
            </div>
            <hr/><hr/>
            <div class="col-md-4">
                <div class="card-dashboard">Usuarios</div>
            </div>
            <div class="col-md-4">
                <div class="card-dashboard">Movimientos de stock</div>
            </div>
            <div class="col-md-4">
                <div class="card-dashboard">Reportes</div>
            </div>
        </div>
    </div>

</body>
</html>