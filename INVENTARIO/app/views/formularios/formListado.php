

<h2>Listado de Productos</h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Código</th>
            <th>Stock</th>
            <th>Precio</th>
            <th>Categoría</th> 
            <th>Proveedor</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($productos)): ?>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?php echo $producto->id_producto; ?></td>
                    <td><?php echo $producto->nombre_producto; ?></td>
                    <td><?php echo $producto->codigo_producto; ?></td>
                    <td><?php echo $producto->cantidad_stock_producto; ?></td>
                    <<td>$<?php echo number_format($producto->precio_costo_producto, 2, '.', ''); ?></td>
                    <td><?php echo $producto->nombre_categoria; ?></td>  <!--para poder mostrar categoria y nombre en el listado de productos como se pide-->
                    <td><?php echo $producto->nombre_proveedor; ?></td> 
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No hay productos cargados.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>