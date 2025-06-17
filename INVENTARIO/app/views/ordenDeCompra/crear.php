<?php require_once 'views/partials/header.php'; ?>

<h2>Emitir Orden de Compra</h2>

<?php if (isset($_SESSION['mensaje_error'])): ?>
    <div class="alert alert-danger">
        <?= $_SESSION['mensaje_error']; unset($_SESSION['mensaje_error']); ?>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['mensaje_exito'])): ?>
    <div class="alert alert-success">
        <?= $_SESSION['mensaje_exito']; unset($_SESSION['mensaje_exito']); ?>
    </div>
<?php endif; ?>

<form action="<?= RUTA_URL ?>/ordencompra/guardar" method="POST">
    <div class="form-group">
        <label for="nro">N° de Orden:</label>
        <input type="text" name="nro" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="proveedor">Proveedor:</label>
        <select name="proveedor" class="form-control" required>
            <option value="">Seleccione un proveedor</option>
            <?php foreach ($proveedores as $proveedor): ?>
                <option value="<?= $proveedor['id_proveedor'] ?>">
                    <?= $proveedor['nombre_proveedor'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <hr>
    <h4>Productos a agregar</h4>

    <div id="productos-container">
        <div class="producto-item">
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label>Producto:</label>
                    <select name="productos[]" class="form-control" required>
                        <option value="">Seleccione un producto</option>
                        <?php foreach ($productos as $producto): ?>
                            <option value="<?= $producto['id_producto'] ?>">
                                <?= $producto['nombre_producto'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>Cantidad:</label>
                    <input type="number" name="cantidades[]" class="form-control" min="1" required>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-secondary mt-2" onclick="agregarProducto()">Agregar otro producto</button>
    <br><br>
    <button type="submit" class="btn btn-primary">Guardar Orden</button>
</form>

<script>
    function agregarProducto() {
        const container = document.getElementById('productos-container');
        const nuevo = container.children[0].cloneNode(true);
        // Limpiar valores
        nuevo.querySelectorAll('select, input').forEach(el => el.value = '');
        container.appendChild(nuevo);
    }
</script>

<?php require_once 'views/partials/footer.php'; ?>