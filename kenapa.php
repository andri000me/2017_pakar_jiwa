<?php 
include "librari/inc.koneksidb.php";

$NOIP = $_SERVER['REMOTE_ADDR'];
$sql = "SELECT analisa_hasil.*, penyakit.* 
		FROM analisa_hasil,penyakit 
		WHERE penyakit.kd_penyakit=analisa_hasil.kd_penyakit
		AND analisa_hasil.noip='$NOIP'
		ORDER BY analisa_hasil.id DESC LIMIT 1";
$qry = mysql_query($sql, $koneksi) 
	   or die ("Query Hasil salam".mysql_error());
$data= mysql_fetch_array($qry);
if ($data['kelamin']=="P") {
	$kelamin = "Pria";
}
else {
	$kelamin = "Wanita";
}
?>
<html>
<head>
<title>Hasil Analisa Pasien</title>
<style type="text/css">
<!--
.style4 {font-weight: bold; color: #0033CC;}
.style5 {
	color: #FFFFFF;
	font-weight: bold;
	font-size: 20px;
}
.style6 {color: #333333}
-->
</style>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>
<body>
<center>
<p>
<?php
$NOIP = $_SERVER['REMOTE_ADDR'];
$sql = "SELECT * FROM tmp_gejala,gejala 
				  WHERE tmp_gejala.kd_gejala=gejala.kd_gejala 
				  AND noip='$NOIP' ORDER BY tmp_gejala.kd_gejala,relasi.kd_gejala";

$result = mysql_query($sql);
?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="80%" cellpadding="5" cellspacing="0" border="2" bgcolor="#CCCCCC" bordercolor="#FF6600">
<tr> 
    <td colspan="3"><p align="center" class="style4 style6">PENYAKIT
      <?= strtoupper($data['nm_penyakit']); ?>
      <br>
      DITAMPILKAN KARENA ANDA MENGALAMI :</p>  </td>
  </tr>
	<tr bgcolor="#FFFFFF">
		<td height="30" colspan="2">
		<? 
$NOIP = $_SERVER['REMOTE_ADDR'];
$sql1 = "SELECT * FROM tmp_gejala,gejala 
				  WHERE tmp_gejala.kd_gejala=gejala.kd_gejala 
				  AND noip='$NOIP' ORDER BY tmp_gejala.kd_gejala,gejala.kd_gejala";
$qry_kenapa = mysql_query($sql1, $koneksi);
		while ($hsl_kenapa=mysql_fetch_array($qry_kenapa)) {
		$i++;
			echo "$i . $hsl_kenapa[nm_gejala] <br>";
		}
		?>
     </td>
    </tr>
  </table>
  	</p>
	</p>
    <p>&nbsp;</p>
  <table width="75%" border="0" cellpadding="1" cellspacing="2" bgcolor="#999999">
  <tr align="center">
    <td colspan="2" bgcolor="#FF6600"><p class="style5">SEMUA GEJALA DARI JENIS PENYAKIT
        <?= strtoupper($data['nm_penyakit']); ?>
    </p></td>
  </tr>
</table>
<table width="75%" border="0" cellpadding="1" cellspacing="2" bgcolor="#999999">
  <tr bgcolor="#FFFFFF">
    <td width="760" align="left"><? 
		$sql_gejala = "SELECT gejala.* FROM gejala,relasi
						WHERE gejala.kd_gejala=relasi.kd_gejala
						AND relasi.kd_penyakit='$data[kd_penyakit]'";
		$qry_gejala = mysql_query($sql_gejala, $koneksi);
		while ($hsl_gejala=mysql_fetch_array($qry_gejala)) {
		$u++;
			echo "$u . $hsl_gejala[nm_gejala] <br>";
		}
		?></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><strong>Keterangan</strong> : <br>
  <em>Pengambilan keputusan diagnosa berdasarkan relasi dengan<br>
  </em><em>membandingkan gejala dari semua jenis penyakit</em> dengan Metode Decision Tree</p>
</center>
</body>
</html>
