<?php
require('../../../apps/koneksi.php');
date_default_timezone_set('Asia/jakarta');
$today = date("Y-m-d H:i:s");

if (isset($_POST['bkirim'])) {

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $notelp = $_POST['no_tlp'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $ekstensi_diperbolehkan = array('png', 'jpg');
    $new_img = $_FILES['img_new']['name'];
    $old_img = $_POST['img_old'];

    $x = explode('.', $new_img);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['img_new']['size'];
    $file_tmp = $_FILES['img_new']['tmp_name'];

    $folder = '../../../assets/profile/';

    if ($new_img != '') {
        $update_filename = $_FILES['img_new']['name'];
    } else {
        $update_filename = $old_img;
    }

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        //boleh upload file
        //uji jika ukuran file dibawah 1mb
        if ($ukuran < 1044070) {
            //jika ukuran sesuai
            //PINDAHKAN FILE YANG DI UPLOAD KE FOLDER FILE aplikasi
            move_uploaded_file($file_tmp, $folder . $new_img);

            //simpan data ke dalam database
            $update = mysqli_query($koneksi, "UPDATE `user` SET `nama`='$nama',`email`='$email',`no_tlp`='$notelp',`username`='$username',`password`='$password',`img`='$update_filename',`tgl_daftar`='$today' WHERE id = '$id'");
            if ($update) {
                echo "<script>alert('Profile anda berhasil di upload'); document.location='index.php'</script>";
            } else {
                echo "<script>alert('Profile anda gagal di upload); document.location='index.php'</script>";
            }
        } else {
            //ukuran tidak sesuai
            echo "<script>alert('Ukuran file terlalu besar, max 1mb'); document.location='index.php'</script>";
        }
    } else {
        //ektensi file yang di upload tidak sesuai
        echo "<script>alert('Format tidak di perbolehkan'); document.location='index.php'</script>";
    }
}

if (isset($_POST['bbatal'])) {
    header("Location: index.php");
}
