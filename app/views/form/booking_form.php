<?php
// Include file konfigurasi database
require_once __DIR__ . '/../../config/database.php';



// Contoh penggunaan koneksi database
$query = "SELECT * FROM mobil";
$result = mysqli_query($db, $query);

// Contoh penggunaan hasil query
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['column_name'];
}
?>

    
<?php
// Proses form saat tombol "Submit" ditekan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $noPlat = $_POST["noPlat"];
    $nik = $_POST["nik"];
    $tanggalPesan = $_POST["tanggalPesan"];
    $tanggalPinjam = $_POST["tanggalPinjam"];
    $tanggalKembaliRencana = $_POST["tanggalKembaliRencana"];
    $idSopir = $_POST["idSopir"];

    // Simpan data ke dalam database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "rental_mobil";

    // Membuat koneksi ke database
    $conn = new mysqli($servername, $username, $password, $database);

    // Memeriksa koneksi
    if ($conn->connect_error) {
        die("Koneksi ke database gagal: " . $conn->connect_error);
    }

    // Mengatur timezone sesuai kebutuhan
    date_default_timezone_set('Asia/Jakarta');

    // Mengambil tanggal dan waktu saat ini
    $currentDateTime = date('Y-m-d H:i:s');

    // Membuat nomor transaksi yang unik
    $noTransaksi = uniqid();

    // Membuat query untuk menyimpan data booking mobil
    $sql = "INSERT INTO transaksi (NoTransaksi, NIK, Id_Mobil, Tanggal_Pesan, Tanggal_Pinjam, Tanggal_Kembali_Rencana, StatusTransaksi) VALUES ('$noTransaksi', '$nik', '$noPlat', '$tanggalPesan', '$tanggalPinjam', '$tanggalKembaliRencana', 'Proses')";

    if ($conn->query($sql) === TRUE) {
        // Redirect ke halaman booking_success.php
        header("Location: booking_success.php");
        exit();
    } else {
        echo "Terjadi kesalahan: " . $conn->error;
    }

    // Menutup koneksi ke database
    $conn->close();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Form Booking Mobil</title>
    <!-- Memasukkan link CSS Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Form Booking Mobil</h1>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="mt-4">
            <div class="mb-3">
                <label for="noPlat" class="form-label">Nomor Plat Mobil:</label>
                <input type="text" id="noPlat" name="noPlat" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="nik" class="form-label">NIK Pelanggan:</label>
                <input type="text" id="nik" name="nik" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tanggalPesan" class="form-label">Tanggal Pesan:</label>
                <input type="date" id="tanggalPesan" name="tanggalPesan" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tanggalPinjam" class="form-label">Tanggal Pinjam:</label>
                <input type="date" id="tanggalPinjam" name="tanggalPinjam" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tanggalKembaliRencana" class="form-label">Tanggal Kembali Rencana:</label>
                <input type="date" id="tanggalKembaliRencana" name="tanggalKembaliRencana" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="idSopir" class="form-label">ID Sopir (opsional):</label>
                <input type="text" id="idSopir" name="idSopir" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Memasukkan script JavaScript Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
