<?php
require('../../../apps/koneksi.php');
date_default_timezone_set('Asia/jakarta');
$today = date("Y-m-d H:i:s");
if (isset($_POST['simpan'])) {
    $id = $_POST['id_user'];
    $pesan = $_POST['pesan'];

    $cek = mysqli_num_rows($koneksi->query("SELECT * FROM testimoni WHERE id_user = '$id'"));

    if ($cek > 0) {
        echo "<script>alert('Anda sudah mengisi ulasan');</script>";
        echo "<script>window.location='index.php'</script>";
    } else {
        $sql = mysqli_query($koneksi, "INSERT INTO testimoni VALUES ('','$id','$pesan','$today')");
        if ($sql) {
            echo "<script>alert('Ulasan anda berhasil di simpan');</script>";
            echo "<script>window.location='index.php'</script>";
        } else {
            echo "<script>alert('Ulasan anda gagal di simpan');</script>";
            echo "<script>window.location='index.php'</script>";
        }
    }
}
