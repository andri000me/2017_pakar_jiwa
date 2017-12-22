<?php 
include "librari/inc.koneksidb.php";
?>
<html>
<head>
<title>Tampilan Data Penyakit</title>
<style type="text/css">
<!--
.style8 {color: #0000FF; font-weight: bold; }
.style10 {
	color: #FFFFFF;
	font-weight: bold;
}
.style11 {
	color: #333333;
	font-weight: bold;
}
.style12 {color: #000000}
-->
</style>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>
<body>
<table width="789" border="0">
  <tr>
    <td width="247" height="218">&nbsp;</td>
    <td width="532">&nbsp;</td>
  </tr>
</table>
<table width="765" border="1" align="center" cellpadding="2" cellspacing="1" bgcolor="#00CC00">
  <tr bgcolor="#0099FF"> 
    <td colspan="5" bgcolor="#000000"><center spry:hover="style10" class="style10">DAFTAR  JENIS PENYAKIT
    </center>
    </div></td>
  </tr>
  <tr bgcolor="#999999"> 
    <td width="22"><div align="center" class="style10">No</div></td>
    <td width="138"><div align="center" class="style10">Nama Penyakit</div></td>
    <td width="304"><div align="center" class="style10">Keterangan</div></td>
    <td width="155"><div align="center" class="style10">Pemeriksaan</div></td>
    <td width="108" align="center"><div align="center" class="style10">Silahkan Pilih</div></td>
  </tr>
  <?php 
	$sql = "SELECT * FROM penyakit ORDER BY kd_penyakit";
	$qry = mysql_query($sql, $koneksi) 
		 or die ("SQL Error".mysql_error());
	while ($data=mysql_fetch_array($qry)) {
	$no++;
  ?>
  <tr bgcolor="#FFFFFF"> 
    <td valign="top" bgcolor="#FFFFFF"><?php echo $no; ?></td>
    <td valign="top" bgcolor="#FFFFFF""><?php echo $data['nm_penyakit']; ?></td>
    <td valign="top" bgcolor="#FFFFFF"><?php echo $data['keterangan']; ?></td>
    <td valign="top" bgcolor="#FFFFFF"><?php echo $data['pemeriksaan']; ?></td>
    <td align="center" bgcolor="#FFFFFF"><a href="?page=dafgejala&kdsakit=<?= $data['kd_penyakit'];?>">Lihat</a></td></tr>
  <?php
  }
  ?>
</table>
</body>
</html>
