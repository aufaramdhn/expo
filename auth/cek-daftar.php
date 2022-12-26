<?php
include '../koneksi.php';

$name = $_POST['nama'];
$no_tlp = $_POST['no_tlp'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

$result = mysqli_query($koneksi, "INSERT INTO user (nama,no_tlp,username,password,level) VALUES( '$name','62$no_tlp','$username','$password','$level')");
if ($result == true) {
    echo "<script>alert('Akun Anda Berhasil Di Buat');</script>";
    echo "<script>window.location='../index.php'</script>";
} else {
    echo "Username Anda Telah Digunakan";
}
