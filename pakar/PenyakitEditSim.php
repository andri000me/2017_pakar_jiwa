<?php 
include "inc.session.php"; 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$TxtKodeH 	 = $_REQUEST['TxtKodeH'];
$TxtPenyakit = $_REQUEST['TxtPenyakit'];
$TxtPemeriksaan  = $_REQUEST['TxtPemeriksaan'];
$TxtKeterangan = $_REQUEST['TxtKeterangan'];
$TxtSolusi   = $_REQUEST['TxtSolusi'];

#validasi FORM
if (trim($TxtKodeH)=="") {
	echo"Kode Tidak Ada , Silahkan Ulangi Kembali";
	include "PenyakitEditFm.php";
}
elseif (trim($TxtPenyakit)=="")  {
	echo "Nama Penyakit Masih Kosong, Ulangi kembali";
	include "PenyakitEditFm.php";
	}
elseif (trim($TxtPemeriksaan)=="") {
	echo "Nama pemeriksaan masih kosong , Silahkan ulangi kembali";
	include "PenyakitEditFm.php";
	}
elseif (trim($TxtKeterangan)=="") {
	echo "Keterangan penyakit Masih Kosong , Silahkan ulangi Kembali";
	include "PenyakitEditFm.php";
	}
elseif (trim($TxtSolusi)=="") {
	echo "Solusi Masih Kosong , Silahkan Ulangi Kembali";
	include "PenyakitEditFm.php";
	}
else {
//Sql simpan perubahan
$sql = " UPDATE penyakit SET
	nm_penyakit='$TxtPenyakit',
	pemeriksaan='$TxtPemeriksaan',
	keterangan='$TxtKeterangan',
	solusi='$TxtSolusi'
		WHERE kd_penyakit='$TxtKodeH'";
mysql_query($sql, $koneksi)
	or die ("SQL ERROR" .mysql_error());
	
	echo "DATA TELAH BERHASIL DIUBAH";
	include "PenyakitTampil.php";
	}
?>
