<?php require_once RUTA_APP . '/views/inc/header.php'; ?>

<h2>Cargar Nueva Orden de Compra</h2>

<?php if (isset($_SESSION['mensaje_error'])) : ?>
    <div class="alert alert-danger">
        <?php 
            echo $_SESSION['mensaje_error']; 
            unset($_SESSION['mensaje_error']);
        ?>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['mensaje_exito'])) : ?>
    <div class="alert alert-success">
        <?php 
            echo $_SESSION['mensaje_exito']; 
            unset($_SESSION['mensaje_exito']);
        ?>
    </div>
<?php endif; ?>

<form action="<?= RUTA_URL ?>/ordencompra/guardar" method="POST">
    <div class="form-group">
        <label for="nro">Nro de Orden:</label>
        <input type="text" class="form-control" name="nro" required>
    </div>

    <div class="form-group">
        <label for="fecha">Fecha:</label>
        <input type="date" class="form-control" name="fecha" value="<?= date('Y-m-d') ?>" required>
    </div>

    <div class="form-group">
        <label for="proveedor">Proveedor:</label>
        <select name="proveedor" class="form-control" required>
            <option value="">Seleccione</option>
            <?php foreach ($datos['proveedores'] as $prov) : ?>
                <option value="<?= $prov['id_proveedor']; ?>"><?= $prov['razon_social_proveedor']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <hr>
    <h4>Detalle de Productos</h4>

    <div id="productos-container">
        <div class="producto-item">
            <div class="form-group">
                <label>Producto:</label>
                <select name="productos[]" class="form-control" required>
                    <option value="">Seleccione</option>
                    <?php foreach ($datos['productos'] as $prod) : ?>
                        <option value="<?= $prod['codigo_producto']; ?>"><?= $prod['nombre_producto']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Cantidad:</label>
                <input type="number" name="cantidades[]" class="form-control" min="1" required>
            </div>
            <hr>
        </div>
    </div>

    <button type="button" class="btn btn-secondary" onclick="agregarProducto()">Agregar otro producto</button>

    <br><br>
    <button type="submit" class="btn btn-primary">Guardar Orden</button>
</form>

<script>
function agregarProducto() {
    const container = document.getElementById('productos-container');
    const item = container.querySelector('.producto-item');
    const clon = item.cloneNode(true);
    container.appendChild(clon);
}
</script>

<?php require_once RUTA_APP . '/views/inc/footer.php'; ?>