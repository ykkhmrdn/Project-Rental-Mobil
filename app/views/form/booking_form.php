<?php

require_once __DIR__ . '/../../config/database.php';


if (isset($_GET['type'])) {
    $type = $_GET['type'];
} else {
    // Handle the case when no NoPlat parameter is provided
    // For example, redirect the user back to the car listing page
    header("Location: ../../pelanggan/daftar-mobil.php");
    exit();
}

// Contoh penggunaan koneksi database
$query = "SELECT * FROM type WHERE NmType = '$type'";
$result = mysqli_query($db, $query);

// Proses form saat tombol "Submit" ditekan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $merk = $_POST['merkInput'];
    $type = $_POST['type'];
    $transmisi = $_POST['transmisi'];
    $NoPlat = $_POST["noPlat"];
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
    $sql = "INSERT INTO transaksi (NoTransaksi, NIK, Id_Mobil, Tanggal_Pesan, Tanggal_Pinjam, Tanggal_Kembali_Rencana, StatusTransaksi) VALUES ('$noTransaksi', '$nik', '$NoPlat', '$tanggalPesan', '$tanggalPinjam', '$tanggalKembaliRencana', 'Proses')";

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
    <meta charset="UTF-8">
    <title>Form Booking Mobil | JAVA ELLTRANS Car Rental</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://localhost/project-rental-mobil/app/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav text-center"> <!-- Added text-center class -->
                    <li class="nav-item">
                        <a class="navbar-brand" href="#"> <img src="https://localhost/project-rental-mobil/app/img/assets/logo.png" alt="" height="30px"></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../about/about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../pelanggan/daftar-mobil.php">Koleksi Mobil</a>
                    </li>
                </ul>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="../auth/login.php" class="btn me-md-2 text-white" type="button" style="background-color: #E57C23;">Login</a>
                <a href="../auth/registration.php" class="btn text-white me-md-5" type="button" style="background-color: #E57C23;">Register</a>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Form Booking -->
    <div class="container">
        <h1 class="mt-4">Form Booking Mobil</h1>
        <form method="POST" action="booking_success.php" class="mt-4">
            <div class="mb-3">
                <label for="type" class="form-label">Type Mobil:</label>
                <input type="text" id="type" name="type" class="form-control" value="<?php echo isset($_GET['type']) ? $_GET['type'] : ''; ?>" required readonly>
            </div>
            <!-- Tambahkan elemen input tersembunyi untuk menyimpan data lainnya -->
            <input type="hidden" id="merkInput" name="merk" value="<?php echo isset($_GET['NmMerk']) ? $_GET['NmMerk'] : ''; ?>">
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
            <button type="submit" class="btn btn-primary mb-5">Submit</button>
        </form>
    </div>
    <!-- End From Booking -->

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <img src="https://localhost/project-rental-mobil/app/img/assets/logo.png" alt="">
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-4">
                            <h3><i class="bi bi-geo-alt"></i> Lokasi</h3>
                            <p>Perum Puri Tamanan Indah, Grojogan Rt.07, Tamanan, Banguntapan, Bantul, Bantul, 55191</p>
                        </div>
                        <div class="col-md-4">
                            <h3><i class="bi bi-envelope"></i> Email</h3>
                            <p>javaelltrans@gmail.com</p>
                        </div>
                        <div class="col-md-4">
                            <h3><i class="bi bi-phone"></i> Kontak</h3>
                            <p>Telepon: 087754153495</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
     <!-- Copyright -->
     <section class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Java ELLTRANS Car Rental 2023.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Include Bootstrap JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
