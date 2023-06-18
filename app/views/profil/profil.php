<?php
include("/xampp/htdocs/project-rental-mobil/app/config/database.php");

// Start session (if not already started)
session_start();

// Check if user ID exists in session
if (isset($_SESSION['nik'])) {
    // Get user ID from session
    $nik = $_SESSION['nik'];

    // Fetch user data from the database
    $query = "SELECT * FROM users WHERE NIK = $nik";
    $result = mysqli_query($db, $query);

    // Check if user exists
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        die("User not found.");
    }
} else {
    die("User ID not found in session.");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Riwayat Transaksi | JAVA ELLTRANS Car Rental</title>
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
                        <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'riwayat_transaksi.php') ? 'active' : ''; ?>" href="../pelanggan/riwayat_transaksi.php">Riwayat Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'daftar-mobil.php') ? 'active' : ''; ?>" href="../pelanggan/daftar-mobil.php">Koleksi Mobil</a>
                    </li>


                </ul>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <!-- Tombol Profile -->
                <a href="../profil/profil.php" class="btn me-md-2 text-white" type="button" style="background-color: #E57C23;">Profile</a>
                <!-- Tombol Logout -->
                <a href="../home/index.php" class="btn text-white me-md-5" type="button" style="background-color: #E57C23;">Logout</a>

            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Profile Section -->
    <section class="container profile">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center">Profil Pengguna</h1>
                        <table class="table">
                            <tr>
                                <td>ID</td>
                                <td><?php echo $user['id']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td><?php echo $user['Nama']; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo $user['NamaUser']; ?></td>
                            </tr>
                            <tr>
                                <td>No. Telepon</td>
                                <td><?php echo $user['NoTelp']; ?></td>
                            </tr>
                            <!-- Add more profile fields as needed -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Profile Section -->

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