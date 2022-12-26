<?php
require '../../../koneksi.php';
if (isset($_POST['bhapus'])) {
    $id = $_POST['id_transaksi'];
    $sql = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi= '$id'");

    if ($sql) {
        echo "<script>alert('your data has been deleted successfully');</script>";
        echo "<script>window.location='index.php'</script>";
    } else {
        echo "<script>alert('Gagal');</script>";
        echo "<script>window.location='index.php'</script>";
    }
}

if (isset($_POST['accept'])) {
    $id = $_POST['id_transaksi'];

    $select = "UPDATE transaksi SET status = 'accept' WHERE id_transaksi = '$id'";
    $result = mysqli_query($koneksi, $select);

    echo '<script type = "text/javascript">';
    echo 'alert("Pesanan Telah Di Konfirmasi");';
    echo 'window.location.href = "index.php"';
    echo '</script>';
}

if (isset($_POST['reject'])) {
    $id = $_POST['id_transaksi'];

    $select = "UPDATE transaksi SET status = 'reject' WHERE id_transaksi = '$id'";
    $result = mysqli_query($koneksi, $select);

    echo '<script type = "text/javascript">';
    echo 'alert("Pesanan Di Tolak");';
    echo 'window.location.href = "index.php"';
    echo '</script>';
}

if (isset($_POST['done'])) {
    $id = $_POST['id_transaksi'];

    $select = "UPDATE transaksi SET status = 'done' WHERE id_transaksi = '$id'";
    $result = mysqli_query($koneksi, $select);

    echo '<script type = "text/javascript">';
    echo 'alert("Pesanan Sudah Selesai");';
    echo 'window.location.href = "index.php"';
    echo '</script>';
}
