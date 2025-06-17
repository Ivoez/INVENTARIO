<?php require_once RUTA_APP . '/views/inc/header.php'; ?>

<h2>Órdenes de Compra Emitidas</h2>

<?php if (isset($_SESSION['mensaje_exito'])) : ?>
    <div class="alert alert-success">
        <?php 
            echo $_SESSION['mensaje_exito']; 
            unset($_SESSION['mensaje_exito']);
        ?>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['mensaje_error'])) : ?>
    <div class="alert alert-danger">
        <?php 
            echo $_SESSION['mensaje_error']; 
            unset($_SESSION['mensaje_error']);
        ?>
    </div>
<?php endif; ?>

<?php if (empty($datos['ordenes'])) : ?>
    <p>No hay órdenes de compra registradas.</p>
<?php else : ?>
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Nro Orden</th>
                <th>Fecha</th>
                <th>Proveedor</th>
                <th>Producto</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos['ordenes'] as $orden) : ?>
                <tr>
                    <td><?= $orden['nro']; ?></td>
                    <td><?= $orden['fecha']; ?></td>
                    <td><?= $orden['razon_social_proveedor']; ?></td>
                    <td><?= $orden['nombre_producto']; ?></td>
                    <td><?= $orden['cantidad']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php require_once RUTA_APP . '/views/inc/footer.php'; ?>