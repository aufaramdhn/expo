<?php
require('../../apps/koneksi.php');
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
		$_SESSION['info'] = "berhasil_login";
		//berfungsi mengalihkan ke halaman admin
		header("location: ../../views/admin/dashboard/index.php");
		// berfungsi mengecek jika user login sebagai moderator
	} else if ($data['level'] == "user") {
		// berfungsi membuat session
		$_SESSION['id'] = $data['id'];
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['notelp'] =  $data['no_tlp'];
		$_SESSION['level'] = "user";
		$_SESSION['info'] = "berhasil_login";
		// berfungsi mengalihkan ke halaman moderator
		header("location:../../views/users/home/index.php");
	}
} else {
	$_SESSION['info'] = "kosong";
	echo "<script>window.location='../../index.php'</script>";
}
