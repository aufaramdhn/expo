<?php
require('../../apps/koneksi.php');

session_start();

date_default_timezone_set('Asia/jakarta');
$today = date("Y-m-d H:i:s");

if (isset($_POST['register'])) {
    $name = $_POST['nama'];
    $email = $_POST['email'];
    $no_tlp = $_POST['no_tlp'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = mysqli_num_rows($koneksi->query("SELECT * FROM user WHERE username = '$username'"));

    if ($cek > 0) {
        $_SESSION['info'] = "gagal_register";
        header("Location: register.php");
    } else {
        $_SESSION['info'] = "berhasil_register";
        $result = mysqli_query($koneksi, "INSERT INTO user VALUES('','$name', '$email','62$no_tlp','$username','$password', 'NULL','user','$today')");
        echo "<script>window.location='../../index.php'</script>";
    }
}
