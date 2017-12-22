<?php 
include "inc.session.php"; 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$TxtKodeH    = $_REQUEST['TxtKodeH'];
$CekGejala 	 = $_REQUEST['CekGejala'];

# Validasi Form
if (trim($TxtKodeH)=="") {
	echo "Nama Penyakit belum dipilih, ulangi kembali";
	include "RelasiAddPilih.php";
}
else {
	$jum  = count($CekGejala);
	if ($jum==0) {
		echo "BELUM ADA GEJALA YANG DIPILIH";
	}
	else {
		# UNTUK MENGHAPUS YANG TIDAK DIPILIH LAGI
		$sqlpil = "SELECT * FROM relasi WHERE kd_penyakit='$TxtKodeH'";
		$qrypil = mysql_query($sqlpil);
		while ($datapil=mysql_fetch_array($qrypil)){
			for ($i = 0; $i < $jum; ++$i) {	
				if ($datapil['kd_gejala'] != $CekGejala[$i]) {
					$sqldel  = "DELETE FROM relasi ";
					$sqldel .= "WHERE kd_penyakit='$TxtKodeH' ";
					$sqldel .= "AND NOT kd_gejala IN ('$CekGejala[$i]')";
					mysql_query($sqldel);
				}
			}
		}
		
		# UNTUK DATA GEJALA TAMBAHAN
		for ($i = 0; $i < $jum; ++$i) {			
		   $sqlr  = "SELECT * FROM relasi ";
		   $sqlr .= "WHERE kd_penyakit='$TxtKodeH' ";
		   $sqlr .= "AND kd_gejala='$CekGejala[$i]'";
		   $qryr = mysql_query($sqlr, $koneksi);
		   $cocok  = mysql_num_rows($qryr);
			if (! $cocok==1) {
				$sql  = "INSERT INTO relasi (kd_penyakit,kd_gejala) ";
				$sql .= "VALUES ('$TxtKodeH','$CekGejala[$i]')";
				mysql_query($sql, $koneksi)
					 or die ("SQL Input Relasi Gagal".mysql_error());
			}
		}					
		echo "SUKSES DISIMPAN";
		include"RelasiAddPilih.php" ;
	}
}
?>
