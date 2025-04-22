<!-- Contenedor principal para centrar el contenido del footer -->
<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <!-- Texto del footer con la fecha actual -->
            <span class="mb-3 mb-md-0 text-body-secondary">
                <span>UNLZ Sistema de Gestión de Inventario | </span>
                <?php echo date('d-m-Y');?> <!-- Imprime la fecha del día actual (Esta adelantado Hay que arreglarlo) -->
            </span>
        </div>
    </footer>
</div>

<!-- Script de Bootstrap para que funcionen los componentes interactivos (como el navbar responsive) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
