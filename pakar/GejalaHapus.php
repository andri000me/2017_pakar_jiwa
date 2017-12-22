<?php 
include "inc.session.php"; 
include "../librari/inc.koneksidb.php";

# Baca variabel URL (If Register Global ON)
$kdhapus = $_REQUEST['kdhapus'];

if ($kdhapus !="") {	
	$sql = "DELETE FROM gejala	WHERE kd_gejala='$kdhapus'";
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());
		  
	$sql2 = "DELETE FROM relasi WHERE kd_gejala='$kdhapus'";
	mysql_query($sql2, $koneksi);
		
	echo "DATA GEJALA BERHASIL DIHAPUS";
	include "GejalaTampil.php";
}
else {
	echo "DATA GEJALA PEBLUM DIPILIH";
}
?>
