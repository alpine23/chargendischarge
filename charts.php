<?php
$koneksi = new mysqli("localhost", "root", "", "databasecuy");

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$start_date = isset($_POST['start_date']) ? $_POST['start_date'] : '';
$start_time = isset($_POST['start_time']) ? $_POST['start_time'] : '00:00:00';
$end_date = isset($_POST['end_date']) ? $_POST['end_date'] : '';
$end_time = isset($_POST['end_time']) ? $_POST['end_time'] : '23:59:59';

$start_datetime = $start_date ? "$start_date $start_time" : '';
$end_datetime = $end_date ? "$end_date $end_time" : '';

$query = "SELECT * FROM log";
$params = [];
$types = '';

if ($start_datetime && $end_datetime) {
    $query .= " WHERE time BETWEEN ? AND ?";
    $params[] = $start_datetime;
    $params[] = $end_datetime;
    $types .= 'ss';
}

$stmt = $koneksi->prepare($query);
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$ambildata = $stmt->get_result();


$temperatures = [];
$humidities = [];
$times = [];

while ($tampil = $ambildata->fetch_assoc()) {
    $temperatures[] = $tampil['temperature'];
    $humidities[] = $tampil['humidity'];
    $times[] = $tampil['time'];
}

$stmt->close();
$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Website Monitoring</title>
    <link href="styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>
    <style>
    body {
        margin: 0;
    }

    .chart-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        /* 2 kolom */
        grid-gap: 20px;
        padding: 20px;
    }

    .chart-grid canvas {
        max-width: 100%;
        height: 100%;
    }
    </style>

    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="home.php">
            <div id="time-date"></div>
            <script src="date.js"></script>
        </a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading"></div>
                        <a class="nav-link" href="home.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <div class="sb-sidenav-menu-heading">History</div>
                        <a class="nav-link" href="charts.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Humidity & Temperature
                        </a>
                        <a class="nav-link" href="tilt.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tilt
                        </a>
                        <a class="nav-link" href="aboutus.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>
                            About Us
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <center>
                        <h1 class="mt-4">Humidity & Temperature</h1>
                    </center>

                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Humidity & Temperature</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            History Logs
                            <form method="POST">
                                <label for="start_date">Start Date:</label>
                                <input type="date" id="start_date" name="start_date" value="<?php echo $start_date; ?>">
                                <label for="start_time">Start Time:</label>
                                <input type="time" id="start_time" name="start_time"
                                    value="<?php echo isset($_POST['start_time']) ? $_POST['start_time'] : ''; ?>">

                                <label for="end_date">End Date:</label>
                                <input type="date" id="end_date" name="end_date" value="<?php echo $end_date; ?>">
                                <label for="end_time">End Time:</label>
                                <input type="time" id="end_time" name="end_time"
                                    value="<?php echo isset($_POST['end_time']) ? $_POST['end_time'] : ''; ?>">

                                <input type="submit" value="Filter">
                            </form>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive" id="dataTableContainer" style="display: none;">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Temperature</th>
                                            <th>Humidity</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($temperatures as $index => $temperature) {
                                            echo "
                                            <tr>
                                                <td>$no</td>
                                                <td>{$temperatures[$index]}</td>
                                                <td>{$humidities[$index]}</td>
                                                <td>{$times[$index]}</td>
                                            </tr>";
                                            $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="chart-grid">
                                <?php for ($i = 1; $i <= 10; $i++): ?>
                                <div>
                                    <canvas id="myChart<?php echo $i; ?>"></canvas>
                                    <p style="text-align: center; font-weight: bold;">B<?php echo $i; ?></p>
                                </div>
                                <?php endfor; ?>
                            </div>

                            <script>
                            // Mengambil data dari PHP ke JavaScript
                            const temperatures = <?php echo json_encode($temperatures); ?>;
                            const humidities = <?php echo json_encode($humidities); ?>;
                            const times = <?php echo json_encode($times); ?>;

                            // Fungsi untuk membuat chart
                            const createChart = (canvasId, temperatureData, humidityData) => {
                                const ctx = document.getElementById(canvasId).getContext('2d');
                                new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: times,
                                        datasets: [{
                                                label: 'Temperature',
                                                data: temperatureData,
                                                borderColor: 'rgba(255, 0, 0, 1)',
                                                borderWidth: 1,
                                                fill: false
                                            },
                                            {
                                                label: 'Humidity',
                                                data: humidityData,
                                                borderColor: 'rgba(90, 255, 0, 1)',
                                                borderWidth: 1,
                                                fill: false
                                            }
                                        ]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true,
                                                ticks: {
                                                    stepSize: 20
                                                }
                                            }
                                        }
                                    }
                                });
                            };

                            // Inisialisasi 10 chart
                            for (let i = 1; i <= 10; i++) {
                                createChart(`myChart${i}`, temperatures, humidities);
                            }
                            </script>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-line-demo.js"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>