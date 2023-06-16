<!DOCTYPE html>
<html>
<head>
    <title>Form Booking Mobil - Sukses</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        p {
            color: #666;
            margin-bottom: 20px;
        }

        a {
            color: #fff;
            background-color: #337ab7;
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 3px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #23527c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Booking Mobil Berhasil</h1>

        <?php
        // Menampilkan pesan sukses jika booking berhasil dilakukan
        if (isset($_POST["noPlat"])) {
            echo "<p>Booking mobil berhasil dilakukan!</p>";
        }
        ?>

        <p>Terima kasih telah melakukan booking mobil. Silahkan datang ke tempat JavaEllTrans saat akan mengambil mobilnya, dan pembayaran dilakukan di lokasi saat akan mengambil mobilnya.</p>

        <a href="booking_form.php">Kembali ke Form Booking</a>
    </div>
</body>
</html>
