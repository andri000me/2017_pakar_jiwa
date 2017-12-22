<?php
error_reporting(0);

$page= @$_REQUEST['page'];
if ($page=="dafsakit") {
	if(file_exists ("PenyakitTampil.php")) {
		include "PenyakitTampil.php";
	}
	else {
		echo "FILE PROGRAM PENYAKIT TIDAK ADA";
	}
}
elseif ($page=="dafgejala") {
	if(file_exists ("GejalaTampil.php")) {
		include "GejalaTampil.php";
	}
	else {
		echo "FILE PROGRAM GEJALA PENYAKIT TIDAK ADA";
	}
}
elseif ($page=="daftar") {
	if(file_exists ("PasienAddFm.php")) {
		include "PasienAddFm.php";
	}
	else {
		echo "FILE PROGRAM FORM PASIEN TIDAK ADA";
	}
}
elseif ($page=="daftarsim") {
	if(file_exists ("PasienAddSim.php")) {
		include "PasienAddSim.php";
	}
	else {
		echo "FILE PROGRAM FORM PASIEN SIMPAN TIDAK ADA";
	}
}
elseif ($page=="konsul") {
	if(file_exists ("KonsultasiFm.php")) {
		include "KonsultasiFm.php";
	}
	else {
		echo "FILE PROGRAM FORM KONSULTASI TIDAK ADA";
	}
}
elseif ($page=="konsulcek") {
	if(file_exists ("KonsultasiPeriksa.php")) {
		include "KonsultasiPeriksa.php";
	}
	else {
		echo "FILE PROGRAM KONSULTASI PERIKSA TIDAK ADA";
	}
}
elseif ($page=="hasil") {
	if(file_exists ("AnalisaHasil.php")) {
		include "AnalisaHasil.php";
	}
	else {
		echo "FILE PROGRAM ANALISA HASIL TIDAK ADA";
	}
}
elseif ($page=="tolong") {
	if(file_exists ("tolong.php")) {
		include "tolong.php";
	}
	else {
		echo "FILE PROGRAM PERTOLONGAN TIDAK ADA";
	}
}
elseif ($page=="tentang") {
	if(file_exists ("tentang.php")) {
		include "tentang.php";
	}
	else {
		echo "FILE PROGRAM tentang TIDAK ADA";
	}
}
elseif ($page=="home") {
	if(file_exists ("home.php")) {
		include "home.php";
	}
	else {
		echo "FILE HALAMAN UTAMA ADA";
	}
}
elseif ($page=="") {
	if(file_exists ("PasienAddSim.php")) {
		include "PasienAddSim.php";
	}
	else {
		echo "FILE HALAMAN UTAMA ADA";
	}
}
elseif ($page=="kenapa") {
	if(file_exists ("kenapa.php")) {
		include "kenapa.php";
	}
	else {
		echo "FILE HALAMAN UTAMA ADA";
	}
}
?>