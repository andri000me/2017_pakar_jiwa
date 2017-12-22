<?php 
include "librari/inc.koneksidb.php";

$kdsakit = $_REQUEST['kdsakit'];
$sqlp = "SELECT * FROM penyakit WHERE kd_penyakit='$kdsakit' ";
$qryp = mysql_query($sqlp);
$datap= mysql_fetch_array($qryp);
$sakit = $datap['nm_penyakit'];
?>
<html>
<head>
<title>Tampilan Data Gejala</title>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>
<body>
<p>&nbsp;</p>
<table width="400" border="0" cellpadding="2" cellspacing="1" bgcolor="#FF9900">
  <tr> 
    <td colspan="3"><b>GEJALA PENYAKIT</span> : <?= strtoupper($sakit); ?></b></td>
  </tr>
  <tr bgcolor="#999999"> 
    <td width="21" align="center" bgcolor="#CCCCCC"><b>No</b></td>
    <td width="47" bgcolor="#CCCCCC"><b>Kode</b></td>
    <td width="316" bgcolor="#CCCCCC"><b>Nama Gejala</b></td>
  </tr>
  <?php 
	$sqlg  = "SELECT gejala.* FROM gejala,relasi ";
	$sqlg .= "WHERE gejala.kd_gejala=relasi.kd_gejala ";
	$sqlg .= "AND  relasi.kd_penyakit='$kdsakit' ";
	$sqlg .= "ORDER BY gejala.kd_gejala";
	$qryg = mysql_query($sqlg, $koneksi) 
		 or die ("SQL Error".mysql_error());
	while ($datag=mysql_fetch_array($qryg)) {
	$no++;
  ?>
  <tr bgcolor="#FFFFFF"> 
    <td align="center"><?php echo $no; ?></td>
    <td><?php echo $datag['kd_gejala']; ?></td>
    <td><?php echo $datag['nm_gejala']; ?></td>
  </tr>
  <?php
  }
  ?>
  <tr> 
    <td colspan="3" bgcolor="#CCCCCC">&nbsp;</td>
  </tr>
</table>
<table width="626" border="1">
  <tr>
    <th width="616" scope="col" " cellspacing="1" bgcolor="#FF9900">SOLUSI</th>
  </tr>
  
  <tr>
    <td bgcolor="#CCCCCC"><?php echo $datap['solusi']; ?></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>