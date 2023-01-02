<?php
require('../../../apps/koneksi.php');
date_default_timezone_set('Asia/jakarta');
$today = date("Y-m-d H:i:s");

if (isset($_POST['bhapus'])) {

    $delete = mysqli_query($koneksi, "DELETE FROM user WHERE id = '$_POST[id]' ");


    if ($delete) {
        echo "<script>alert('your data has been deleted successfully');</script>";
        echo "<script>window.location='index.php'</script>";
    } else {
        echo "<script>alert('Gagal');</script>";
        echo "<script>window.location='index.php'</script>";
    }
}

if (isset($_POST['bedit'])) {

    $update = mysqli_query($koneksi, "UPDATE user set nama='$_POST[nama]',no_tlp='$_POST[no_tlp]', username='$_POST[username]', password='$_POST[password]', level='$_POST[level]' WHERE id='$_POST[id]'");


    if ($update) {
        echo "<script>alert('your data has been successfully changed');</script>";
        echo "<script>window.location='index.php'</script>";
    } else {
        echo "<script>alert('Gagal');</script>";
        echo "<script>window.location='index.php'</script>";
    }
}



if (isset($_POST['btambah'])) {

    $create = mysqli_query($koneksi, "INSERT INTO user VALUES (NULL, '$_POST[nama]', '$_POST[email]', '$_POST[no_tlp]', '$_POST[username]', '$_POST[password]', 'NULL', '$_POST[level]', '$today')");

    $_SESSION['eksekusi'] = "Data Berhasil Ditambahkan";

    if ($create) {
        echo "<script>alert('Your data has been successfully added');</script>";
        echo "<script>window.location='index.php'</script>";
    } else {
        echo "<script>alert('Gagal');</script>";
        echo "<script>window.location='index.php'</script>";
    }
}
