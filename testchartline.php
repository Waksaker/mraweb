<?php
$claim = [
    "label_claim" => ["JANUARY", "FEBRUARY"],
    "jumlah_claim" => [6, 4]
];

$jasonclaim = json_encode($claim);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Test Graf Line</title>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="card">
    <div class="card-body">
        <canvas id="barclaim"></canvas>
    </div>
</div>
<script>
    // Dapatkan data dari PHP
    const claim = <?php echo $jasonclaim; ?>;

    // Konfigurasi graf
    const config = {
        type: 'bar',
        data: {
            labels: claim.label_claim,
            datasets: [{
                label: 'Jumlah Claim',
                data: claim.jumlah_claim,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            legend: { display: false },
            title: {
                display: true,
                text: "Rekod Pengambilan Ujian"
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,  // Pastikan paksi y bermula dari 0
                        min: 0,             // Nilai minimum paksi y
                        max: 5              // Nilai maksimum paksi y
                    }
                }]
            }
        }
    };

    // Render graf pada elemen canvas
    const ctx = document.getElementById('barclaim').getContext('2d');
    new Chart(ctx, config);
</script>
</body>
</html>