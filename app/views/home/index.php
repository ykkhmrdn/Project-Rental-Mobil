<?php include("/xampp/htdocs/project-rental-mobil/app/config/database.php"); ?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://localhost/project-rental-mobil/app/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>JAVA ELLTRANS Car Rental</title>
</head>


<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav text-center"> <!-- Added text-center class -->
                    <a class="navbar-brand" href="#"> <img src="https://localhost/project-rental-mobil/app/img/assets/logo.png" alt="" height="30px"></a>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../about/about.php">About</a>
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

    <!-- Jumbotron -->
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">JAVA ELLTRANS <br> Car Rental</h1>
            <p class="lead">Sewa mobil berkualitas dengan harga terjangkau!</p>
        </div>
    </div>

    <!-- Kenapa Memilih Kami -->
    <section class="container reason">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-6">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h1 class="card-title">Kenapa Memilih Kami?</h1>
                        <div class="row">
                            <div class="col-lg-4 mt-5">
                                <div class="card-text">
                                    <img src="https://localhost/project-rental-mobil/app/img/assets/harga terjangkau.png" alt="">
                                    <h3>Harga Terjangkau</h3>
                                    <p class="card-text">Kami menyediakan berbagai pilihan mobil dengan berbagai jenis dan merk terkemuka.</p>
                                </div>
                            </div>
                            <div class="col-lg-4 mt-5">
                                <div class="card-text">
                                    <img src="https://localhost/project-rental-mobil/app/img/assets/harga terjangkau.png" alt="">
                                    <h3>Pelayanan Prima</h3>
                                    <p class="card-text">Costumer sevice kami siap melayani Anda kapan pun. Dan siap dengan media apapun, mulai dari via SMS, Whatsapp, E-mail, maupun telepon secara langsung.</p>
                                </div>
                            </div>
                            <div class="col-lg-4 mt-5">
                                <div class="card-text">
                                    <img src="https://localhost/project-rental-mobil/app/img/assets/harga terjangkau.png" alt="">
                                    <h3>Kualitas Terbaik</h3>
                                    <p class="card-text">Perusahaan kami didukung dengan tim yang profesional dan dikelola oleh SDM pilihan serta unit mobil yang variatif, mulai dari city car, sampai mobil rombongan dan mobil mewah untuk pengantin.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Koleksi Kami -->

    <section class="container car-collection">
        <h2 class="text-center pb-3">Koleksi Mobil Kami</h2>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <img src="https://localhost/project-rental-mobil/app/img/assets/mobil.jpg" class="card-img-top" alt="Mobil 1">
                    <div class="card-body">
                        <h5 class="card-title">Mobil 1</h5>
                        <p class="card-text">Deskripsi mobil 1.</p>
                        <a href="#" class="btn btn-primary" onclick="checkLogin()">Sewa Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <img src="https://localhost/project-rental-mobil/app/img/assets/mobil.jpg" class="card-img-top" alt="Mobil 2">
                    <div class="card-body">
                        <h5 class="card-title">Mobil 2</h5>
                        <p class="card-text">Deskripsi mobil 2.</p>
                        <a href="#" class="btn btn-primary" onclick="checkLogin()">Sewa Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <img src="https://localhost/project-rental-mobil/app/img/assets/mobil.jpg" class="card-img-top" alt="Mobil 3">
                    <div class="card-body">
                        <h5 class="card-title">Mobil 3</h5>
                        <p class="card-text">Deskripsi mobil 3.</p>
                        <a href="#" class="btn btn-primary" onclick="checkLogin()">Sewa Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <img src="https://localhost/project-rental-mobil/app/img/assets/mobil.jpg" class="card-img-top" alt="Mobil 4">
                    <div class="card-body">
                        <h5 class="card-title">Mobil 4</h5>
                        <p class="card-text">Deskripsi mobil 4.</p>
                        <a href="#" class="btn btn-primary" onclick="checkLogin()">Sewa Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

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








    <!-- Script -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script>
    function checkLogin() {
        // Periksa apakah pengguna sudah login atau belum
        // Ganti 'isLoggedIn' dengan kondisi login yang sesuai dari backend Anda
        var isLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;
        
        if (isLoggedIn) {
            // Jika pengguna sudah login, lanjutkan ke halaman sewa mobil
            window.location.href = "link-halaman-sewa-mobil";
        } else {
            // Jika pengguna belum login, tampilkan peringatan dan arahkan ke halaman login/registrasi
            alert("Anda harus login atau daftar terlebih dahulu untuk menyewa mobil.");
            window.location.href = "/project-rental-mobil/app/views/auth/login.php";
        }
    }
</script>

    
</body>