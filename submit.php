<?php
// Konfigurasi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "databasecuy";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $serial_number = $_POST['serial_number'];

        // Validasi serial number
        $stmt = $pdo->prepare("SELECT * FROM data_baterai WHERE SerialNumber = :serial_number");
        $stmt->execute(['serial_number' => $serial_number]);
        $exists = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($exists) {
            // Simpan Vmax saat ini ke VmaxPrev
            $vmaxCurrent = $exists['Vmax'];
            $stmt = $pdo->prepare("UPDATE data_baterai 
                                   SET BateraiStat = 'charge', 
                                       VmaxPrev = :vmax_prev, 
                                       Cycle = Cycle + 1 
                                   WHERE SerialNumber = :serial_number");
            $stmt->execute([
                'vmax_prev' => $vmaxCurrent,
                'serial_number' => $serial_number,
            ]);

            // Redirect ke home.php
            header("Location: home.php");
            exit;
        } else {
            $errorMessage = "Serial Number tidak ditemukan!";
            header("Location: home.php?error=" . urlencode($errorMessage));
            exit;
        }
    }
} catch (PDOException $e) {
    echo "Koneksi atau query gagal: " . $e->getMessage();
    exit;
}
?>