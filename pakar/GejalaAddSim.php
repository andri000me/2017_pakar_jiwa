<?php 
include "inc.session.php"; 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$TxtKodeH 	= $_REQUEST['TxtKodeH'];
$TxtGejala 	= $_REQUEST['TxtGejala'];

# Validasi Form
if (trim($TxtKodeH)=="") {
	echo "Kode belum terbentuk, ulangi kembali";
	include "GejalaAddFm.php";
}
elseif (trim($TxtGejala)=="") {
	echo "Gejala masih kosong, ulangi kembali";
	include "GejalaAddFm.php";
}
else {
	$sql  = " INSERT INTO gejala (kd_gejala,nm_gejala) ";
	$sql .=	" VALUES ('$TxtKodeH','$TxtGejala')";
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());

	echo "Data berhasil disimpan";
	include "GejalaAddFm.php";
}
?>
