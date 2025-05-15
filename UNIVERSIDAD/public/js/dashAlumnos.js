const ctx = document.getElementById('rendimientoChart').getContext('2d');
const rendimientoChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Prog. 3', 'Sist. Operativos', 'Inglés', 'Estadística'],
        datasets: [{
            label: 'Nota final',
            data: [8, 6, 9, 7],
            backgroundColor: ['#0d6efd', '#198754', '#ffc107', '#dc3545']
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: { beginAtZero: true, max: 10 }
        }
    }
});
