<?php 
include "librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$TxtNama 	= $_REQUEST['TxtNama'];
$RbKelamin 	= $_REQUEST['RbKelamin'];
$TxtAlamat 	= $_REQUEST['TxtAlamat'];
$TxtPekerjaan= $_REQUEST['TxtPekerjaan'];

# Validasi Form
if (trim($TxtNama)=="") {
	include "PasienAddFm.php";
	echo "Nama belum diisi, ulangi kembali";
}
elseif (trim($TxtAlamat)=="") {
	include "PasienAddFm.php";
	echo "Alamat masih kosong, ulangi kembali";
}
elseif (trim($TxtPekerjaan)=="") {
	include "PasienAddFm.php";
	echo "Pekerjaan masih kosong, ulangi kembali";
}
else {
    $NOIP = $_SERVER['REMOTE_ADDR'];
	$sqldel = "DELETE FROM tmp_pasien WHERE noip='$NOIP'";
	mysql_query($sqldel, $koneksi);
	
	$sql  = " INSERT INTO tmp_pasien (nama,kelamin,alamat,pekerjaan,noip,tanggal) 
		 	  VALUES ('$TxtNama','$RbKelamin','$TxtAlamat','$TxtPekerjaan','$NOIP',NOW())";
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error 2".mysql_error());
	
	$sqlhapus = "DELETE FROM tmp_penyakit WHERE noip='$NOIP'";
	mysql_query($sqlhapus, $koneksi) 
			or die ("SQL Error 1".mysql_error());
	
	$sqlhapus2 = "DELETE FROM tmp_analisa WHERE noip='$NOIP'";
	mysql_query($sqlhapus2, $koneksi) 
			or die ("SQL Error 2".mysql_error());
			
	$sqlhapus3 = "DELETE FROM tmp_gejala WHERE noip='$NOIP'";
	mysql_query($sqlhapus3, $koneksi) 
			or die ("SQL Error 3".mysql_error());
	
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=konsul'>";
}
?>
