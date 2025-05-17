
<?php
if (!isset($_SESSION['tipoUsuario']) == 'Alumno') {
    // Si no está activo, redirige al login
    $this->view('pages/auth/login');
    exit;
}
?>

<?php require RUTA_APP . '/views/layout/users/header.php'; ?>

    <!-- Contenido principal -->
    <div class="container-fluid px-3 mt-4">

        <h3 class="mb-4">Bienvenido, <?php echo htmlspecialchars($_SESSION['Nombre']); ?> (<?php echo htmlspecialchars($_SESSION['tipoUsuario']); ?>)</h3>

        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-journal-text fs-2 text-primary me-3"></i>
                        <div>
                            <h6 class="mb-0">Materias</h6>
                            <small>6 activas</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-calendar-event fs-2 text-success me-3"></i>
                        <div>
                            <h6 class="mb-0">Próxima clase</h6>
                            <small>Lunes 8:00hs</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-mortarboard fs-2 text-warning me-3"></i>
                        <div>
                            <h6 class="mb-0">Promedio</h6>
                            <small>7.8 general</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-check2-circle fs-2 text-info me-3"></i>
                        <div>
                            <h6 class="mb-0">Asistencia</h6>
                            <small>92% presente</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gráfico de rendimiento -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-light">
                <h6 class="mb-0">Rendimiento Académico</h6>
            </div>
            <div class="card-body">
                <canvas id="rendimientoChart" height="100"></canvas>
            </div>
        </div>

        <!-- Tareas pendientes -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-light">
                <h6 class="mb-0">Tareas Pendientes</h6>
            </div>
            <div class="card-body">
                <ul>
                    <li>📌 Informe biología - entrega 25/05/2025</li>
                    <li>📌 Proyecto matemáticas - entrega 30/05/2025</li>
                    <li>📌 Leer capítulo 5 literatura</li>
                </ul>
            </div>
        </div>

        <!-- Noticias -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-light">
                <h6 class="mb-0">Novedades institucionales</h6>
            </div>
            <div class="card-body">
                <ul>
                    <li>📢 Se habilitó la inscripción a finales.</li>
                    <li>📅 El viernes 20 no habrá clases por mantenimiento.</li>
                    <li>📝 Se publicó el cronograma de exámenes 2025.</li>
                </ul>
            </div>
        </div>

        <div class="mt-4">
            <a class="btn btn-primary" href="#">Descargar Reporte</a>

        </div>

    </div>

    <!-- Footer -->
    <?php require RUTA_APP . '/views/layout/footer.php'; ?>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('rendimientoChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['1° Trim.', '2° Trim.', '3° Trim.'],
                datasets: [{
                    label: 'Notas',
                    data: [7.2, 7.9, 8.1],
                    borderColor: '#007bff',
                    backgroundColor: 'rgba(0,123,255,0.1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        suggestedMin: 6,
                        suggestedMax: 10
                    }
                }
            }
        });
    </script>

    <!-- Bootstrap JS (Popper + Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
