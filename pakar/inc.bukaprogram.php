<?php
error_reporting(~E_NOTICE);

$page= @$_REQUEST['page'];
if ($page=="tambahpenyakit") {
	if(file_exists ("PenyakitAddfm.php")) {
		include "PenyakitAddfm.php";
	}
	else {
		echo "FILE PROGRAM PENYAKIT TIDAK ADA";
	}
}
elseif ($page=="PenyakitAddSim") {
	if(file_exists ("PenyakitAddSim.php")) {
		include "PenyakitAddSim.php";
	}
	else {
		echo "FILE PROGRAM GEJALA PENYAKIT TIDAK ADA";
	}
}
elseif ($page=="PenyakitTampil") {
	if(file_exists ("PenyakitTampil.php")) {
		include "PenyakitTampil.php";
	}
	else {
		echo "FILE PROGRAM FORM Tampil TIDAK ADA";
	}
}
elseif ($page=="PenyakitEditFm") {
	if(file_exists ("PenyakitEditFm.php")) {
		include "PenyakitEditFm.php";
	}
	else {
		echo "FILE PROGRAM FORM PASIEN SIMPAN TIDAK ADA";
	}
}
elseif ($page=="PenyakitHapus") {
	if(file_exists ("PenyakitHapus.php")) {
		include "PenyakitHapus.php";
	}
	else {
		echo "FILE PROGRAM FORM KONSULTASI TIDAK ADA";
	}
}
elseif ($page=="PenyakitEditSim") {
	if(file_exists ("PenyakitEditSim.php")) {
		include "PenyakitEditSim.php";
	}
	else {
		echo "FILE PROGRAM FORM KONSULTASI TIDAK ADA";
	}
}
elseif ($page=="GejalaAddFm") {
	if(file_exists ("GejalaAddFm.php")) {
		include "GejalaAddFm.php";
	}
	else {
		echo "FILE PROGRAM GEJALA TIDAK ADA";
	}
}
elseif ($page=="GejalaEditFm") {
	if(file_exists ("GejalaEditFm.php")) {
		include "GejalaEditFm.php";
	}
	else {
		echo "FILE PROGRAM GEJALA TIDAK ADA";
	}
}
elseif ($page=="GejalaAddSim") {
	if(file_exists ("GejalaAddSim.php")) {
		include "GejalaAddSim.php";
	}
	else {
		echo "FILE PROGRAM ANALISA HASIL TIDAK ADA";
	}
}
elseif ($page=="GejalaTampil") {
	if(file_exists ("GejalaTampil.php")) {
		include "GejalaTampil.php";
	}
	else {
		echo "FILE PROGRAM PERTOLONGAN TIDAK ADA";
	}
}
elseif ($page=="GejalaHapus") {
	if(file_exists ("GejalaHapus.php")) {
		include "GejalaHapus.php";
	}
	else {
		echo "FILE PROGRAM tentang TIDAK ADA";
	}
}
elseif ($page=="GejalaEditSim") {
	if(file_exists ("GejalaEditSim.php")) {
		include "GejalaEditSim.php";
	}
	else {
		echo "FILE PROGRAM tentang TIDAK ADA";
	}
}
elseif ($page=="RelasiAddPilih") {
	if(file_exists ("RelasiAddPilih.php")) {
		include "RelasiAddPilih.php";
	}
	else {
		echo "FILE HALAMAN UTAMA ADA";
	}
}
elseif ($page=="RelasiAddSim") {
	if(file_exists ("RelasiAddSim.php")) {
		include "RelasiAddSim.php";
	}
	else {
		echo "FILE HALAMAN UTAMA ADA";
	}
}
elseif ($page=="LapPenyakitSemua") {
	if(file_exists ("LapPenyakitSemua.php")) {
		include "LapPenyakitSemua.php";
	}
	else {
		echo "FILE LAP PENYAKIT  ADA";
	}
}
elseif ($page=="LapGejalaPenyakit") {
	if(file_exists ("LapGejalaPenyakit.php")) {
		include "LapGejalaPenyakit.php";
	}
	else {
		echo "FILE LAP PENYAKIT  ADA";
	}
}
elseif ($page=="LapGejalaPenyakit2") {
	if(file_exists ("LapGejalaPenyakit2.php")) {
		include "LapGejalaPenyakit2.php";
	}
	else {
		echo "FILE LAP PENYAKIT  ADA";
	}
}
elseif ($page=="rekapKonsul") {
	if(file_exists ("rekapKonsul.php")) {
		include "rekapKonsul.php";
	}
	else {
		echo "FILE LAP PENYAKIT  ADA";
	}
}
?>