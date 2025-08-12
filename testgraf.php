<?php
// Contoh data yang akan digunakan untuk graf
$data = [
    "labels" => ["Januari", "Februari", "Mac", "April", "Mei"],
    "values" => [12, 19, 3, 5, 2]
];

// Tukarkan data PHP kepada format JSON untuk dihantar ke JavaScript
$jsonData = json_encode($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graf Bar dengan PHP, HTML, dan JavaScript</title>
    <!-- Link kepada pustaka Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h2>Contoh Graf Bar</h2>
    <!-- Elemen canvas untuk memaparkan graf -->
    <canvas id="barChart" width="400" height="200"></canvas>

    <script>
        // Dapatkan data dari PHP
        const dataFromPHP = <?php echo $jsonData; ?>;

        // Konfigurasi graf
        const config = {
            type: 'bar',
            data: {
                labels: dataFromPHP.labels, // Label untuk X-axis
                datasets: [{
                    label: 'Jumlah Jualan',
                    data: dataFromPHP.values, // Data yang diberikan dari PHP
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Warna bar
                    borderColor: 'rgba(75, 192, 192, 1)', // Warna border
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true // Bermula dari 0 pada Y-axis
                    }
                }
            }
        };

        // Render graf pada elemen canvas
        const ctx = document.getElementById('barChart').getContext('2d');
        new Chart(ctx, config);
    </script>
</body>
</html>