
   <h2>Listado de Proveedores</h2>       <!--form agregado 18:11 20/6-->

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Razón Social</th>
            <th>CUIT</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($proveedores)): ?>
            <?php foreach ($proveedores as $prov): ?>
                <tr>
                    <td><?php echo htmlspecialchars($prov->id_proveedor); ?></td>
                    <td><?php echo htmlspecialchars($prov->razon_social_proveedor); ?></td>
                    <td><?php echo htmlspecialchars($prov->CUIT_proveedor ?? '-'); ?></td>
                    <td><?php echo htmlspecialchars($prov->direccion_proveedor ?? '-'); ?></td>
                    <td><?php echo htmlspecialchars($prov->telefono_proveedor ?? '-'); ?></td>
                    <td><?php echo htmlspecialchars($prov->email_personal_proveedor ?? '-'); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">No hay proveedores cargados.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>