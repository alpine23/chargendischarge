<!DOCTYPE html>
<html lang="en">

<head>
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

    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <!--load otomatis/ realtime-->
    <script type="text/javascript">
    $(document).ready(function() {

        setInterval(function() {
            $("#ceksuhu").load("ceksuhu.php");
        }, 1000);
        setInterval(function() {
            $("#ceksuhu_lt2").load("ceksuhu_lt2.php");
        }, 1000);
        setInterval(function() {
            $("#cekkelembaban").load("cekkelembaban.php");
        }, 1000);
        setInterval(function() {
            $("#cekkelembaban_lt2").load("cekkelembaban_lt2.php");
        }, 1000);
        setInterval(function() {
            $("#cekakselerox").load("cekakselerox.php");
        }, 1000);
        setInterval(function() {
            $("#cekakseleroy").load("cekakseleroy.php");
        }, 1000);
        setInterval(function() {
            $("#cekakseleroz").load("cekakseleroz.php");
        }, 1000);

    });
    </script>
    <style>
    .background-image {
        background-image: url('gedung.jpg');
        background-size: cover;
        /* Menyesuaikan ukuran gambar agar sesuai dengan div */
        background-position: center;
        /* Memposisikan gambar di tengah div */
        border: 1px solid #ccc;
        height: 980px;
        padding: 315px;
        /* Atur tinggi agar gambar dapat terlihat */
        color: white;
        /* Atur warna teks agar terlihat */
        z-index: 0;
    }

    .nav-container {
        display: flex;
        justify-content: center;
        /* Atur untuk menjajarkan ke kanan */
    }

    .nav-link {
        margin-left: 10px;
        /* Jarak antar button */
        text-decoration: none;
        color: black;
        /* Warna teks, sesuaikan dengan kebutuhan */
    }

    *::after,
    *::before {
        padding: inherit;
        margin: inherit;
        box-sizing: inherit;
    }

    html {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        --color: #fff;
        --hover-b: #000;
        --hover-w: #fff;
        display: grid;
        place-content: flex;
        background-color: rgb(255, 255, 255);
        width: 100vw;
        height: 100vh
    }

    .btn1 {
        background: none;
        border: 4px solid var(--color);
        padding: 0.8em 1em;
        margin: 6.5em;
        user-select: none;
        text-transform: uppercase;
        color: var(--color);
        letter-spacing: 2.2px;
        cursor: pointer;
        border-radius: 30px;
        transform: translateY(0);
        transition: all 0.5s linear;
    }

    /* the inset brings the box-shadow from the inside */
    .window_slide:hover {
        box-shadow: inset 8rem 0 0 0 var(--color), inset -8rem 0 0 0 var(--color);
        color: var(--hover-b);
        transform: translateY(-0.5rem);

    }

    .popup:hover {
        box-shadow: 0rem 0.99rem 0.43rem -0.33rem var(--color);
        transform: translateY(-0.5rem);
    }

    .slidein:hover {
        box-shadow: inset 0 0 0.5rem 4em var(--color);
        transform: translateY(-0.5rem);
        color: var(--hover-b);
    }

    .burst:hover {
        box-shadow: 0 0 1.1rem 8px var(--color);
        transform: translateY(-0.5rem);
    }

    @media only screen and (max-width: 1080px) {
        div {
            display: grid;
            grid-template-columns: repeat(2, auto);
        }

    }

    @media only screen and (max-width: 600px) {
        div {
            display: grid;
            grid-template-columns: repeat(1, auto);
        }

    }
    </style>


</head>

<body class="sb-nav-fixed">

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">
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
                        <h1 class="mt-4">CHARGE AND DISCHARGE MONITORING SYSTEM</h1>
                    </center>

                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <!-- Tombol 1 -->
                    <div>
                        <div class="nav-container">

                        </div>
                    </div>

                    </script>

                    <div class="row">
                        <div class="col-l-8">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area mr-1"></i>
                                    Chart
                                </div>
                                <div class="background-image">
                                    <div class="nav-container">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area mr-1"></i>
                                    Realtime Monitoring
                                </div>
                                <div class="card-body">
                                    <div style="display: flex; flex-wrap: wrap;">
                                        <!-- Baris B1 dan B2 -->
                                        <div class="card text-center" style="width: 20%">
                                            <div class="card-header">
                                                <h5>
                                                    <a href="charts.php" style="text-decoration: none; color: inherit; border: 2px solid transparent; padding: 5px; border-radius: 5px; transition: all 0.3s ease;" 
                                                    onmouseover="this.style.borderColor='#007bff'; this.style.color='#007bff';"
                                                    onmouseout="this.style.borderColor='transparent'; this.style.color='inherit';">
                                                    B1
                                                    </a>
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <i class="fas fa-thermometer-half mr-1"></i> Temperature
                                                    </div>
                                                    <div class="card-body">
                                                        <h3><span id="ceksuhu_b1">0</span></h3>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <i class="fas fa-solid fa-bolt mr-1"></i> Voltage
                                                    </div>
                                                    <div class="card-body">
                                                        <h3><span id="cekvoltage_b1">0</span></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card text-center" style="width: 20%">
                                        <div class="card-header">
                                                <h5>
                                                    <a href="charts.php" style="text-decoration: none; color: inherit; border: 2px solid transparent; padding: 5px; border-radius: 5px; transition: all 0.3s ease;" 
                                                    onmouseover="this.style.borderColor='#007bff'; this.style.color='#007bff';"
                                                    onmouseout="this.style.borderColor='transparent'; this.style.color='inherit';">
                                                    B2
                                                    </a>
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <i class="fas fa-thermometer-half mr-1"></i> Temperature
                                                    </div>
                                                    <div class="card-body">
                                                        <h3><span id="ceksuhu_b2">0</span></h3>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <i class="fas fa-solid fa-bolt mr-1"></i> Voltage
                                                    </div>
                                                    <div class="card-body">
                                                        <h3><span id="cekvoltage_b2">0</span></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Baris B3 dan B4 -->
                                        <div class="card text-center" style="width: 20%">
                                        <div class="card-header">
                                                <h5>
                                                    <a href="charts.php" style="text-decoration: none; color: inherit; border: 2px solid transparent; padding: 5px; border-radius: 5px; transition: all 0.3s ease;" 
                                                    onmouseover="this.style.borderColor='#007bff'; this.style.color='#007bff';"
                                                    onmouseout="this.style.borderColor='transparent'; this.style.color='inherit';">
                                                    B3
                                                    </a>
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <i class="fas fa-thermometer-half mr-1"></i> Temperature
                                                    </div>
                                                    <div class="card-body">
                                                        <h3><span id="ceksuhu_b3">0</span></h3>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <i class="fas fa-solid fa-bolt mr-1"></i> Voltage
                                                    </div>
                                                    <div class="card-body">
                                                        <h3><span id="cekvoltage_b3">0</span></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card text-center" style="width: 20%">
                                        <div class="card-header">
                                                <h5>
                                                    <a href="charts.php" style="text-decoration: none; color: inherit; border: 2px solid transparent; padding: 5px; border-radius: 5px; transition: all 0.3s ease;" 
                                                    onmouseover="this.style.borderColor='#007bff'; this.style.color='#007bff';"
                                                    onmouseout="this.style.borderColor='transparent'; this.style.color='inherit';">
                                                    B4
                                                    </a>
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <i class="fas fa-thermometer-half mr-1"></i> Temperature
                                                    </div>
                                                    <div class="card-body">
                                                        <h3><span id="ceksuhu_b4">0</span></h3>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <i class="fas fa-solid fa-bolt mr-1"></i> Voltage
                                                    </div>
                                                    <div class="card-body">
                                                        <h3><span id="cekvoltage_b4">0</span></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card text-center" style="width: 20%">
                                        <div class="card-header">
                                                <h5>
                                                    <a href="charts.php" style="text-decoration: none; color: inherit; border: 2px solid transparent; padding: 5px; border-radius: 5px; transition: all 0.3s ease;" 
                                                    onmouseover="this.style.borderColor='#007bff'; this.style.color='#007bff';"
                                                    onmouseout="this.style.borderColor='transparent'; this.style.color='inherit';">
                                                    B5
                                                    </a>
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <i class="fas fa-thermometer-half mr-1"></i> Temperature
                                                    </div>
                                                    <div class="card-body">
                                                        <h3><span id="ceksuhu_b5">0</span></h3>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <i class="fas fa-solid fa-bolt mr-1"></i> Voltage
                                                    </div>
                                                    <div class="card-body">
                                                        <h3><span id="cekvoltage_b5">0</span></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <!-- Ulangi pola untuk B5-B10 -->

                                    </div>
                                </div>
                                <div class="card-body">
                                    <div style="display: flex; flex-wrap: wrap;">
                                        <!-- Baris B1 dan B2 -->
                                        <div class="card text-center" style="width: 20%">
                                        <div class="card-header">
                                                <h5>
                                                    <a href="charts.php" style="text-decoration: none; color: inherit; border: 2px solid transparent; padding: 5px; border-radius: 5px; transition: all 0.3s ease;" 
                                                    onmouseover="this.style.borderColor='#007bff'; this.style.color='#007bff';"
                                                    onmouseout="this.style.borderColor='transparent'; this.style.color='inherit';">
                                                    B6
                                                    </a>
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <i class="fas fa-thermometer-half mr-1"></i> Temperature
                                                    </div>
                                                    <div class="card-body">
                                                        <h3><span id="ceksuhu_b6">0</span></h3>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <i class="fas fa-solid fa-bolt mr-1"></i> Voltage
                                                    </div>
                                                    <div class="card-body">
                                                        <h3><span id="cekvoltage_b6">0</span></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card text-center" style="width: 20%">
                                        <div class="card-header">
                                                <h5>
                                                    <a href="charts.php" style="text-decoration: none; color: inherit; border: 2px solid transparent; padding: 5px; border-radius: 5px; transition: all 0.3s ease;" 
                                                    onmouseover="this.style.borderColor='#007bff'; this.style.color='#007bff';"
                                                    onmouseout="this.style.borderColor='transparent'; this.style.color='inherit';">
                                                    B7
                                                    </a>
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <i class="fas fa-thermometer-half mr-1"></i> Temperature
                                                    </div>
                                                    <div class="card-body">
                                                        <h3><span id="ceksuhu_b7">0</span></h3>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <i class="fas fa-solid fa-bolt mr-1"></i> Voltage
                                                    </div>
                                                    <div class="card-body">
                                                        <h3><span id="cekvoltage_b7">0</span></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Baris B3 dan B4 -->
                                        <div class="card text-center" style="width: 20%">
                                        <div class="card-header">
                                                <h5>
                                                    <a href="charts.php" style="text-decoration: none; color: inherit; border: 2px solid transparent; padding: 5px; border-radius: 5px; transition: all 0.3s ease;" 
                                                    onmouseover="this.style.borderColor='#007bff'; this.style.color='#007bff';"
                                                    onmouseout="this.style.borderColor='transparent'; this.style.color='inherit';">
                                                    B8
                                                    </a>
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <i class="fas fa-thermometer-half mr-1"></i> Temperature
                                                    </div>
                                                    <div class="card-body">
                                                        <h3><span id="ceksuhu_b8">0</span></h3>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <i class="fas fa-solid fa-bolt mr-1"></i> Voltage
                                                    </div>
                                                    <div class="card-body">
                                                        <h3><span id="cekvoltage_b8">0</span></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card text-center" style="width: 20%">
                                        <div class="card-header">
                                                <h5>
                                                    <a href="charts.php" style="text-decoration: none; color: inherit; border: 2px solid transparent; padding: 5px; border-radius: 5px; transition: all 0.3s ease;" 
                                                    onmouseover="this.style.borderColor='#007bff'; this.style.color='#007bff';"
                                                    onmouseout="this.style.borderColor='transparent'; this.style.color='inherit';">
                                                    B9
                                                    </a>
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <i class="fas fa-thermometer-half mr-1"></i> Temperature
                                                    </div>
                                                    <div class="card-body">
                                                        <h3><span id="ceksuhu_b9">0</span></h3>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <i class="fas fa-solid fa-bolt mr-1"></i> Voltage
                                                    </div>
                                                    <div class="card-body">
                                                        <h3><span id="cekvoltage_b9">0</span></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card text-center" style="width: 20%">
                                        <div class="card-header">
                                                <h5>
                                                    <a href="charts.php" style="text-decoration: none; color: inherit; border: 2px solid transparent; padding: 5px; border-radius: 5px; transition: all 0.3s ease;" 
                                                    onmouseover="this.style.borderColor='#007bff'; this.style.color='#007bff';"
                                                    onmouseout="this.style.borderColor='transparent'; this.style.color='inherit';">
                                                    B10
                                                    </a>
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <i class="fas fa-thermometer-half mr-1"></i> Temperature
                                                    </div>
                                                    <div class="card-body">
                                                        <h3><span id="ceksuhu_b10">0</span></h3>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <i class="fas fa-solid fa-bolt mr-1"></i> Voltage
                                                    </div>
                                                    <div class="card-body">
                                                        <h3><span id="cekvoltage_b10">0</span></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <!-- Ulangi pola untuk B5-B10 -->

                                    </div>
                                </div>
                                <div class="card-body">
                                    <div style="display: flex;">
                                        <!-- Tabel Menampilkan nilai Arus -->
                                        <div class="card text-center" style="width: 50%">
                                            <div class="card-header">
                                                <i class="fas fa-water mr-1"></i>
                                                Current
                                            </div>
                                            <div class="card-body">
                                                <h3> <span id="cekarus"> 0 </span> </h3>
                                            </div>

                                        </div>
                                        <!-- Tabel Akhir Menampilkan nilai Temperature -->

                                        <!-- Tabel Menampilkan nilai Temperature -->
                                        <div class="card text-center" style="width: 50%">
                                            <div class="card-header">
                                                <i class="fas fa-solid fa-bolt mr-1"></i>
                                                Total Voltage
                                            </div>
                                            <div class="card-body">
                                                <h3> <span id="cektotalvoltage"> 0 </span> </h3>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Tabel Akhir Menampilkan nilai Suhu -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>



        </div>
    </div>
    </div>

    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-doughnut-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>