<?php 

include("/xampp/htdocs/project-rental-mobil/app/config/database.php");

if(isset($_POST['simpan'])){
    $NIK = $_POST['NIK'];
    $NamaUser = $_POST['NamaUser'];
    $Password = $_POST['Password'];
    $JenisKelamin = $_POST['JenisKelamin'];
    $Alamat = $_POST['Alamat'];
    $NoTelp = $_POST['NoTelp'];

    $sql = "INSERT INTO users (NIK, NamaUser, Password, JenisKelamin, Alamat, NoTelp) VALUES ('$NIK', '$NamaUser', '$Password', '$JenisKelamin', '$Alamat', '$NoTelp')";  
    $query = mysqli_query($db, $sql);

    if ($query) {
        echo "Registrasi berhasil!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }

    // Menutup koneksi database
    mysqli_close($db);

    // Setelah proses registrasi selesai, arahkan pengguna ke halaman login
    header('Location: /project-rental-mobil/app/views/auth/login.php');
    exit();
}

?>
