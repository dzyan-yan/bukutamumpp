<?php

include "koneksi.php";

//tamilkan data tabel tikm
$tampil = mysqli_query($koneksi, "SELECT * FROM tikm limit 1");
$data = mysqli_fetch_array($tampil);

//tampung data ke variabel
$id_ikm = $data['id_ikm'];
$sangat_puas = $data['sangat_puas'];
$puas = $data['puas'];
$cukup = $data['cukup'];
$tidak_puas = $data['tidak_puas'];

//ambil nilai keterangan
$keterangan = $_GET['ket'];

//uji jika keterangan tidak kosong
if(isset($keterangan)) {

	//uji jika keterangan = sangat_puas
	if ($keterangan == "sangat_puas") {
		//nilai sangat_puas ditambah 1
		$sangat_puas = $sangat_puas + 1;
		//query update nilai kedalam tabel tikm
		$query = "UPDATE tikm SET sangat_puas = '$sangat_puas' where id_ikm = '$id_ikm' ";
	} elseif($keterangan == "puas") {
		//nilai puas di tambah 1
		$puas = $puas + 1;
		//query update nilai puas dalam tabel tikm
		$query = "UPDATE tikm SET puas= '$puas' where id_ikm = '$id_ikm' ";
	} elseif($keterangan == "cukup") {
		//nilai cukup di tambah 1
		$cukup = $cukup + 1;
		//query update nilai cukup dalam tabel tikm
		$query = "UPDATE tikm SET cukup= '$cukup' where id_ikm = '$id_ikm' ";
	} elseif($keterangan == "tidak_puas") {
		//nilai tidak_puas di tambah 1
		$tidak_puas = $tidak_puas + 1;
		//query update nilai tidak_puas dalam tabel tikm
		$query = "UPDATE tikm SET tidak_puas= '$tidak_puas' where id_ikm = '$id_ikm' ";
	}

	//update data sesuai query
	mysqli_query($koneksi, $query);

	echo "<script> alert ('Terima kasih, anda berhasil memberikan penilaian.');document.location='survei.php' </script>";

}
