<?php
require_once __DIR__ . '/../../config/database.php';

// Initialize variables
$Total_Bayar = 0;

if (isset($_GET['type'])) {
    $carType = $_GET['type'];
} else {
    // Handle the case when no type parameter is provided
    // For example, redirect the user back to the car listing page
    header("Location: ../../pelanggan/daftar-mobil.php");
    exit();
}

// Example usage of database connection
$query = "SELECT m.HargaSewa FROM mobil m
          JOIN type t ON m.IdType = t.IdType
          WHERE t.NmType = '$carType'";

$result = mysqli_query($db, $query);

// Check if the car type exists
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $hargaSewa = $row['HargaSewa'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form values
        $NoTransaksi = uniqid();
        $nik = $_POST['nik'];
        $tanggalPesan = $_POST['tanggalPesan'];
        $tanggalPinjam = $_POST['tanggalPinjam'];
        $tanggalKembaliRencana = $_POST['tanggalKembaliRencana'];
        $idSopir = $_POST['sopir'];

        // Calculate the total rental price
        $tanggalPinjamObj = new DateTime($tanggalPinjam);
        $tanggalKembaliRencanaObj = new DateTime($tanggalKembaliRencana);
        $lamaPinjam = $tanggalPinjamObj->diff($tanggalKembaliRencanaObj)->days;

        $Total_Bayar = $hargaSewa * $lamaPinjam;

        // Check if the transaction number already exists in the table
        $checkQuery = "SELECT * FROM transaksi WHERE NoTransaksi = '$NoTransaksi'";
        $checkResult = mysqli_query($db, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            // If the transaction number already exists, display an error message or ask the user to enter a different transaction number
            echo '<div class="alert alert-danger" role="alert">
                    Nomor transaksi sudah ada. Silakan masukkan nomor transaksi yang berbeda.
                </div>';
        } else {
            // Save data to the database
            $query = "INSERT INTO transaksi (NoTransaksi, NIK, Tanggal_Pesan, Tanggal_Pinjam, Tanggal_Kembali_Rencana, Id_Sopir, StatusTransaksi, Total_Bayar) 
                      VALUES ('$NoTransaksi', '$nik', '$tanggalPesan', '$tanggalPinjam', '$tanggalKembaliRencana', '$idSopir', 'Proses', '$Total_Bayar')";

            // Execute query
            if (mysqli_query($db, $query)) {
                // Redirect to booking success page
                header("Location: ../pembayaran/pembayaran.php");
                exit();
            } else {
                // Display the actual MySQL error for debugging
                echo '<div class="alert alert-danger" role="alert">' . mysqli_error($db) . '</div>';
            }
        }
    }
} else {
    // Handle the case when the car type doesn't exist
    // For example, redirect the user back to the car listing page
    header("Location: ../../pelanggan/daftar-mobil.php");
    exit();
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
                <ul class="navbar-nav text-center">
                    <li class="nav-item">
                        <a class="navbar-brand" href="#"><img src="https://localhost/project-rental-mobil/app/img/assets/logo.png" alt="" height="30px"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'riwayat_transaksi.php') ? 'active' : ''; ?>" href="../pelanggan/riwayat_transaksi.php">Riwayat Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'daftar-mobil.php') ? 'active' : ''; ?>" href="../pelanggan/daftar-mobil.php">Koleksi Mobil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'booking_form.php') ? 'active' : ''; ?>" href="../form/booking_form.php">Form Booking Mobil</a>
                    </li>

                </ul>


            </div>

            <!-- Tombol Profile -->
            <a href="../profil/profil.php" class="btn me-md-2 text-white" type="button" style="background-color: #E57C23;">Profile</a>
            <!-- Tombol Logout -->
            <a href="../home/index.php" class="btn text-white me-md-5" type="button" style="background-color: #E57C23;">Logout</a>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Form Booking -->
    <div class="container">
        <h1 class="mt-4 text-center">Form Booking Mobil</h1>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="carType" class="form-label">Type Mobil:</label>
                <input type="text" id="carType" name="carType" class="form-control" value="<?php echo isset($_GET['type']) ? $_GET['type'] : ''; ?>" required readonly>
            </div>
            <!-- Add hidden input elements to store other data -->
            <input type="hidden" id="idMobil" name="idMobil" value="<?php echo isset($_GET['idMobil']) ? $_GET['idMobil'] : ''; ?>">
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
                <label for="sopir" class="form-label">Penggunaan Sopir:</label>
                <select id="sopir" name="sopir" class="form-control">
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>

            <!-- Display total payment -->
            <div class="mb-3">
                <label for="Total_Bayar" class="form-label">Total Harga:</label>
                <input type="text" id="Total_Bayar" name="Total_Bayar" class="form-control" value="<?php echo $Total_Bayar; ?>" readonly>
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
            <div class="row text-center">
                <div class="col-lg-12">
                    <p>© 2023 JAVA ELLTRANS Car Rental - All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End Copyright -->

    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- End JS -->
</body>

</html>