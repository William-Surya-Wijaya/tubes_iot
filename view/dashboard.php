<!DOCTYPE html>
<html>
<head>
    <title>EMG Data Visualization</title>
    <!-- Menambahkan Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Canvas untuk Grafik -->
    <canvas id="myChart" width="400" height="100"></canvas>
    <script>
        // Data dari PHP
        const values = <?php echo json_encode(array_column($result, 'value')); ?>;

        // Membuat label (Misalnya 1, 2, 3, ..., n)
        const labels = values.map((_, index) => index + 1);

        // Data untuk Chart.js
        const data = {
            labels: values,
            datasets: [{
                label: 'EMG Values',
                data: values,
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        };

        // Konfigurasi Grafik
        const config = {
            type: 'line',
            data: data,
        };

        // Menginisialisasi Grafik
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</body>
</html>
