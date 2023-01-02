<?php
require('../../../apps/koneksi.php');
date_default_timezone_set('Asia/jakarta');
$today = date("Y-m-d H:i:s");
if (isset($_POST['simpan'])) {
    $id = $_POST['id_user'];
    $pesan = $_POST['pesan'];

    $cek = mysqli_num_rows($koneksi->query("SELECT * FROM testimoni WHERE id_user = '$id'"));

    if ($cek > 0) {
        $_SESSION['info'] = "ulasan_ada";
        echo "<script>window.location='index.php'</script>";
    } else {
        $sql = mysqli_query($koneksi, "INSERT INTO testimoni VALUES ('','$id','$pesan','$today')");
        if ($sql) {
            $_SESSION['info'] = "ulasan_simpan";
            echo "<script>window.location='index.php'</script>";
        } else {
            $_SESSION['info'] = "ulasan_gagal";
            echo "<script>window.location='index.php'</script>";
        }
    }
}
