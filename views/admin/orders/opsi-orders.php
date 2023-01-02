<?php
require('../../../apps/koneksi.php');
session_start();
if (isset($_POST['bhapus'])) {
    $id = $_POST['id_transaksi'];
    $sql = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi= '$id'");

    if ($sql) {
        echo "<script>alert('Data anda berhasil di hapus');</script>";
        echo "<script>window.location='index.php'</script>";
    } else {
        echo "<script>alert('Data anda gagal di hapus');</script>";
        echo "<script>window.location='index.php'</script>";
    }
}

if (isset($_POST['accept'])) {
    $id = $_POST['id_transaksi'];

    $select = "UPDATE transaksi SET status = 'accept' WHERE id_transaksi = '$id'";
    $result = mysqli_query($koneksi, $select);

    $_SESSION['info'] = "accept";
    echo "<script>window.location='index.php'</script>";
}

if (isset($_POST['reject'])) {
    $id = $_POST['id_transaksi'];

    $select = "UPDATE transaksi SET status = 'reject' WHERE id_transaksi = '$id'";
    $result = mysqli_query($koneksi, $select);

    $_SESSION['info'] = "reject";
    echo "<script>window.location='index.php'</script>";
}

if (isset($_POST['done'])) {
    $id = $_POST['id_transaksi'];

    $select = "UPDATE transaksi SET status = 'done' WHERE id_transaksi = '$id'";
    $result = mysqli_query($koneksi, $select);

    $_SESSION['info'] = "done";
    echo "<script>window.location='index.php'</script>";
}
