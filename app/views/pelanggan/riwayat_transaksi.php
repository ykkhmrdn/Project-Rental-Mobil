<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://localhost/project-rental-mobil/app/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Riwayat Transaksi - JAVA ELLTRANS Car Rental</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav text-center">
                    <a class="navbar-brand" href="#"> <img src="https://localhost/project-rental-mobil/app/img/assets/logo.png" alt="" height="30px"></a>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../about/about.php">About</a>
                    </li>
                </ul>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="../auth/profile.php" class="btn me-md-2 text-white" type="button" style="background-color: #E57C23;">Profil</a>
                <a href="../home/index.php" class="btn text-white me-md-5" type="button" style="background-color: #E57C23;">Log Out</a>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Riwayat Transaksi -->
    <section class="container riwayat-transaksi">
        <h2 class="text-center pb-3">Riwayat Transaksi</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Nomor Transaksi: TRX001</h5>
                        <p class="card-text">Tanggal Transaksi: 10 Juni 2023</p>
                        <p class="card-text">Total Pembayaran: Rp 500.000</p>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Nomor Transaksi: TRX002</h5>
                        <p class="card-text">Tanggal Transaksi: 12 Juni 2023</p>
                        <p class="card-text">Total Pembayaran: Rp 750.000</p>
                    </div>
                </div>
                <!-- Tambahkan card riwayat transaksi lainnya di sini -->
            </div>
        </div>
    </section>
    <!-- End Riwayat Transaksi -->

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
                            <p>Perum Puri Tamanan Indah , Grojogan Rt.07, Tamanan, Banguntapan, Bantul, Bantul, 55191</p>
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
                    <p>© Java ELLTRANS Car Rental 2023.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
