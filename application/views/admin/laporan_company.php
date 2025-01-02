<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Perusahaan</title>
    <!-- Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Laporan Perusahaan</h3>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Chart untuk Provinsi -->
    <div class="row">
        <div class="col-md-6">
            <h4>Jumlah Perusahaan per Provinsi</h4>
            <canvas id="provinsiChart"></canvas>
        </div>

        <!-- Chart untuk Kota -->
        <div class="col-md-6">
            <h4>Jumlah Perusahaan per Kota</h4>
            <canvas id="kotaChart"></canvas>
        </div>
    </div>
</div>

<script>
// Data untuk chart Provinsi
var provinsiData = <?php echo json_encode($provinsi_data); ?>;
var provinsiLabels = provinsiData.map(function(item) { return item.provinsi; });
var provinsiCounts = provinsiData.map(function(item) { return item.total; });

// Data untuk chart Kota
var kotaData = <?php echo json_encode($kota_data); ?>;
var kotaLabels = kotaData.map(function(item) { return item.kota; });
var kotaCounts = kotaData.map(function(item) { return item.total; });

// Chart.js untuk Provinsi
var ctxProvinsi = document.getElementById('provinsiChart').getContext('2d');
var provinsiChart = new Chart(ctxProvinsi, {
    type: 'bar',
    data: {
        labels: provinsiLabels,
        datasets: [{
            label: 'Jumlah Perusahaan',
            data: provinsiCounts,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// Chart.js untuk Kota
var ctxKota = document.getElementById('kotaChart').getContext('2d');
var kotaChart = new Chart(ctxKota, {
    type: 'bar',
    data: {
        labels: kotaLabels,
        datasets: [{
            label: 'Jumlah Perusahaan',
            data: kotaCounts,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

</body>
</html>
