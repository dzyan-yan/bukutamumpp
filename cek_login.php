<?php

//aktifkan session
session_start();

//panggil koneksi database
include "koneksi.php";

@$username = mysqli_escape_string($koneksi, $_POST['username']);
@$password = mysqli_escape_string($koneksi, $_POST['password']);

$login = mysqli_query($koneksi, "SELECT * FROM tadmin where username='$username' and password='$password'");

$data = mysqli_fetch_array($login);

//uji jika username dan password benar
if ($data) {
	$_SESSION['id_admin'] = $data['id_admin'];
	$_SESSION['username'] = $data['username'];
	$_SESSION['password'] = $data['password'];
	$_SESSION['nama_user'] = $data['nama_user'];

	//arahkan ke halaman admin.php
	header('location:admin.php');
} else {
	echo "<script> alert('Maaf Login Gagal, Silahkan Masukan Username dan Password Yang Benar..!'); 
	document.location='login.php';</script>";
}
