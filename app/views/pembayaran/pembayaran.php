<?php
require_once __DIR__ . '/../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form values
    $NoTransaksi = $_POST['NoTransaksi'];
    $Total_Bayar = $_POST['Total_Bayar'];
    $namaPengirim = $_POST['namaPengirim'];
    $bankPengirim = $_POST['bankPengirim'];
    $tanggalPembayaran = $_POST['tanggalPembayaran'];

    // Check if the transaction number exists in the table
    $checkQuery = "SELECT * FROM transaksi WHERE NoTransaksi = '$NoTransaksi'";
    $checkResult = mysqli_query($db, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Update the transaction status and payment details in the database
        $query = "UPDATE transaksi SET StatusTransaksi = 'Lunas', NamaPengirim = '$namaPengirim', BankPengirim = '$bankPengirim', TanggalPembayaran = '$tanggalPembayaran' WHERE NoTransaksi = '$NoTransaksi'";

        // Execute query
        if (mysqli_query($db, $query)) {
            // Redirect to booking success page
            header("Location: ../form/booking_success.php");
            exit();
        } else {
            // Display the actual MySQL error for debugging
            echo '<div class="alert alert-danger" role="alert">' . mysqli_error($db) . '</div>';
        }
    }
}

// Retrieve transaction data from the database
$NoTransaksi = $_GET['NoTransaksi'];
$query = "SELECT * FROM transaksi WHERE NoTransaksi = '$NoTransaksi'";
$result = mysqli_query($db, $query);
$transaksi = mysqli_fetch_assoc($result);

// Retrieve booking data from the database
$bookingId = $transaksi['IdBooking'];
$bookingQuery = "SELECT * FROM booking WHERE IdBooking = '$bookingId'";
$bookingResult = mysqli_query($db, $bookingQuery);
$booking = mysqli_fetch_assoc($bookingResult);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Pembayaran | JAVA ELLTRANS Car Rental</title>
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

    <!-- Pembayaran -->
    <div class="container">
        <h1 class="mt-4 text-center">Pembayaran</h1>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="NoTransaksi" class="form-label">Nomor Transaksi:</label>
                <input type="text" id="NoTransaksi" name="NoTransaksi" class="form-control" value="<?php echo $transaksi['NoTransaksi'] ?>" required readonly>
            </div>
            <div class="mb-3">
                <label for="Total_Bayar" class="form-label">Total Harga:</label>
                <input type="text" id="Total_Bayar" name="Total_Bayar" class="form-control" value="<?php echo $transaksi['Total_Bayar'] ?>" required readonly>
            </div>
            <div class="mb-3">
                <label for="namaPengirim" class="form-label">Nama Pengirim:</label>
                <input type="text" id="namaPengirim" name="namaPengirim" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="bankPengirim" class="form-label">Bank Pengirim:</label>
                <input type="text" id="bankPengirim" name="bankPengirim" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="tanggalPembayaran" class="form-label">Tanggal Pembayaran:</label>
                <input type="date" id="tanggalPembayaran" name="tanggalPembayaran" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary mb-5">Submit</button>
        </form>
    </div>
    <!-- End Pembayaran -->

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
