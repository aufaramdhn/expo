<?php
require('../../../apps/koneksi.php');
session_start();
date_default_timezone_set('Asia/jakarta');
$today = date("Y-m-d H:i:s");

if (isset($_POST['bhapus'])) {

    $delete = mysqli_query($koneksi, "DELETE FROM user WHERE id = '$_POST[id]' ");

    if ($delete) {
        $_SESSION['info'] = "berhasil_hapus";
        echo "<script>window.location='index.php'</script>";
    } else {
        $_SESSION['info'] = "gagal_hapus";
        echo "<script>window.location='index.php'</script>";
    }
}

if (isset($_POST['bedit'])) {

    $update = mysqli_query($koneksi, "UPDATE user set nama='$_POST[nama]',no_tlp='$_POST[no_tlp]', username='$_POST[username]', password='$_POST[password]', level='$_POST[level]' WHERE id='$_POST[id]'");


    if ($update) {
        $_SESSION['info'] = "berhasil_ubah";
        echo "<script>window.location='index.php'</script>";
    } else {
        $_SESSION['info'] = "gagal_ubah";
        echo "<script>window.location='index.php'</script>";
    }
}

if (isset($_POST['btambah'])) {

    $create = mysqli_query($koneksi, "INSERT INTO user VALUES (NULL, '$_POST[nama]', '$_POST[email]', '$_POST[no_tlp]', '$_POST[username]', '$_POST[password]', 'NULL', '$_POST[level]', '$today')");

    if ($create) {
        $_SESSION['info'] = "berhasil_simpan";
        echo "<script>window.location='index.php'</script>";
    } else {
        $_SESSION['info'] = "gagal_simpan";
        echo "<script>window.location='index.php'</script>";
    }
}
