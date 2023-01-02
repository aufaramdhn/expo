<?php
require('../../apps/koneksi.php');

date_default_timezone_set('Asia/jakarta');
$today = date("Y-m-d H:i:s");

$name = $_POST['nama'];
$email = $_POST['email'];
$no_tlp = $_POST['no_tlp'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

$result = mysqli_query($koneksi, "INSERT INTO user VALUES('','$name', '$email','62$no_tlp','$username','$password', 'NULL','$level','$today')");
if ($result == true) {
    echo "<script>alert('Akun Anda Berhasil Di Buat');</script>";
    echo "<script>window.location='../../index.php'</script>";
} else {
    echo "Username Anda Telah Digunakan";
}
