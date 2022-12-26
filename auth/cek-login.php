<?php
include '../koneksi.php';
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$data = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' and password='$password'");
$cek = mysqli_num_rows($data);
if ($cek > 0) {
	$data = mysqli_fetch_assoc($data);
	// berfungsi mengecek jika user login sebagai admin
	if ($data['level'] == "admin") {
		// berfungsi membuat session
		$_SESSION['id'] = $data['id'];
		$_SESSION['nama'] =  $data['nama'];
		$_SESSION['notelp'] =  $data['no_tlp'];
		$_SESSION['level'] = "admin";
		//berfungsi mengalihkan ke halaman admin
		header("location:../admin/dashboard/index.php");
		// berfungsi mengecek jika user login sebagai moderator
	} else if ($data['level'] == "user") {
		// berfungsi membuat session
		$_SESSION['id'] = $data['id'];
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['notelp'] =  $data['no_tlp'];
		$_SESSION['level'] = "user";
		// berfungsi mengalihkan ke halaman moderator
		header("location:../home/index.php");
	}
} else {

	echo "<script>alert('Maaf Username Atau Password Anda Salah');</script>";
	echo "<script>window.location='../index.php'</script>";
}
