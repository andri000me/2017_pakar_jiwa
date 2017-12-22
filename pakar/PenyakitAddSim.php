<?php 
include "inc.session.php"; 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$TxtKodeH 	 = $_REQUEST['TxtKodeH'];
$TxtPenyakit = $_REQUEST['TxtPenyakit'];
$TxtPemeriksaan  = $_REQUEST['TxtPemeriksaan'];
$TxtKeterangan = $_REQUEST['TxtKeterangan'];
$TxtSolusi   = $_REQUEST['TxtSolusi'];

# Validasi Form
if (trim($TxtKodeH)=="") {
	echo "Kode belum terbentuk, ulangi kembali";
	include "?page=tambahpenyakit";
}
elseif (trim($TxtPenyakit)=="") {
	echo "Nama Penyakit masih kosong, ulangi kembali";
	include "PenyakitAddFm.php";
}
elseif (trim($TxtPemeriksaan)=="") {
	echo "Pemeriksaan masih kosong, ulangi kembali";
	include "PenyakitAddFm.php";
}
elseif (trim($TxtKeterangan)=="") {
	echo "Keterangan penyakit masih kosong, ulangi kembali";
	include "PenyakitAddFm.php";
}
elseif (trim($TxtSolusi)=="") {
	echo "Solusi masih kosong, ulangi kembali";
	include "PenyakitAddFm.php";
}
else {
	$sql  = " INSERT INTO penyakit (kd_penyakit,nm_penyakit,pemeriksaan,keterangan,solusi) ";
	$sql .=	" VALUES ('$TxtKodeH','$TxtPenyakit','$TxtPemeriksaan','$TxtKeterangan','$TxtSolusi')";
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());

	echo "DATA TELAH BERHASIL DISIMPAN";
	 include "PenyakitAddFm.php";
}
?>
