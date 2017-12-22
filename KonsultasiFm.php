<?php 
include "librari/inc.koneksidb.php";

$NOIP = $_SERVER['REMOTE_ADDR'];

# Periksa apabila sudah ditemukan, periksa data penyakit didalam tmp
$sql_cekh = "SELECT * FROM tmp_penyakit 
			 WHERE noip='$NOIP' 
			 GROUP BY kd_penyakit";
$qry_cekh = mysql_query($sql_cekh, $koneksi);
$hsl_cekh = mysql_num_rows($qry_cekh);
if ($hsl_cekh == 1) {
//apabila data tmp penyakit isinya 1
	$hsl_data = mysql_fetch_array($qry_cekh);
//memindahkan data tmp ke tabel hasil_analisa	
	$sql_pasien = "SELECT * FROM tmp_pasien WHERE noip='$NOIP'";
	$qry_pasien = mysql_query($sql_pasien, $koneksi);
	$hsl_pasien = mysql_fetch_array($qry_pasien);
//perintah untuk memindahkan data
		$sql_in = "INSERT INTO analisa_hasil SET
				  nama='$hsl_pasien[nama]',
				  kelamin='$hsl_pasien[kelamin]',
				  alamat='$hsl_pasien[alamat]',
				  pekerjaan='$hsl_pasien[pekerjaan]',
				  kd_penyakit='$hsl_data[kd_penyakit]',
				  noip='$hsl_pasien[noip]',
				  tanggal='$hsl_pasien[tanggal]'";
		mysql_query($sql_in, $koneksi);
					   
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=hasil'>";
	exit;
}
#apabila belum menemukan penyakit
$sqlcek = "SELECT * FROM tmp_analisa WHERE noip='$NOIP'";
$qrycek = mysql_query($sqlcek, $koneksi);
$datacek= mysql_num_rows($qrycek);
if ($datacek >= 1) {
	// Seandainya tmp_analisa tidak kosong,sql ambil data gejala yang tidak ada didalam tabel tmp gejala
	$sqlg = "SELECT gejala.* FROM gejala,tmp_analisa 
			 WHERE gejala.kd_gejala=tmp_analisa.kd_gejala 
			 AND tmp_analisa.noip='$NOIP' 
			 AND NOT tmp_analisa.kd_gejala 
			 	 IN(SELECT kd_gejala 
				 FROM tmp_gejala WHERE noip='$NOIP')
			 ORDER BY gejala.kd_gejala LIMIT 1";
	$qryg = mysql_query($sqlg, $koneksi);
	$datag = mysql_fetch_array($qryg);
	
	$kdgejala = $datag['kd_gejala'];
	$gejala   = $datag['nm_gejala'];
	
}
else {
	// Seandainya tmp kosong, ambil data gejala dari tabel gejala
	$sqlg = "SELECT * FROM gejala ORDER BY kd_gejala LIMIT 1";
	$qryg = mysql_query($sqlg, $koneksi);
	$datag = mysql_fetch_array($qryg);
	
	$kdgejala = $datag['kd_gejala'];
	$gejala   = $datag['nm_gejala'];
}
?>
<html>
<head>
<title>Form Utama Penelusuran</title>
</head>
<body>
<form action="?page=konsulcek" method="post" name="form1" target="_self">
  <p>&nbsp;</p>
  <table width="200" border="0"align="center" >
    <tr>
      <td height="336">&nbsp;</td>
      <td><table width="450" border="0" cellpadding="2" cellspacing="1" bgcolor="#FF9900">
        <tr>
          <td><b>JAWABLAH PERTANYAAN BERIKUT :</b></td>
        </tr>
        <tr>
          <td width="312" bgcolor="#FFFFFF">Apakah  anda mengalami
            <?= $gejala; ?>
            ?
            <input name="TxtKdGejala" type="hidden" value="<?= $kdgejala; ?>"></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"><input type="radio" name="RbPilih" value="YA" checked>
            Benar (YA)
            <input type="radio" name="RbPilih" value="TIDAK">
            Salah (TIDAK)</td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"><input type="submit" name="Submit" value="Jawab"></td>
        </tr>
      </table>
      </td>
    </tr>
  </table>
</form>
</body>
</html>