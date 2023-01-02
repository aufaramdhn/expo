<?php
//function start lagi
session_start();

//cek apakah session terdaftar
if ($_SESSION['username']) {
	//session terdaftar, saatnya logout
	session_unset();
	session_destroy();
	header("Location: ../../index.php");
} else {
	header("Location: ../../index.php");
}
