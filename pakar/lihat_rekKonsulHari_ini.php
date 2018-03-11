<?php 
include "inc.session.php"; 
include "../librari/inc.koneksidb.php";
include"../librari/inc.umum.php";
?>
<html>
<head>
<title>Lihat Rekap Konsultasi Hari ini</title>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>
<body>
<div align="center">
  <p>&nbsp;  </p>
  <p>&nbsp;</p>
  <p>
    <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','100','height','22','src','button3','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','button3' ); //end AC code
</script><noscript>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="100" height="22">
  <param name="BGCOLOR" value="">
  <param name="movie" value="button3.swf">
  <param name="quality" value="high">
  <embed src="button3.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="100" height="22" ></embed>
</object>
</noscript>
  </p>
  <table width="500" border="0" cellpadding="2" cellspacing="1" bgcolor="#FF9900">
    <tr> 
      <td colspan="2"><b>DAFTAR REKAP KONSULTASI HARI INI</b></td>
    </tr>
    <tr bgcolor="#DBEAF5"> 
      <td colspan="2" bgcolor="#CCCCCC">&nbsp;</td>
    </tr>
    <?php 
	$sql = "SELECT * FROM analisa_hasil p inner join penyakit b on p.kd_penyakit=b.kd_penyakit where tanggal>=date(now())";
	$qry = mysql_query($sql, $koneksi) 
		 or die ("SQL Error".mysql_error());
	while ($data=mysql_fetch_array($qry)) {
	$no++;
  ?>
    <tr bgcolor="#FFFFFF">
      <td width="top">No</td>
      <td width="379"><? echo $data['id']; ?></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td valign="top">Nama </td>
      <td><? echo $data['nama']; ?></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td valign="top">kelamin </td>
      <td><? echo $data['kelamin']; ?></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td valign="top">Tgl Lahir </td>
      <td><? echo date('d-m-Y',strtotime($data['kelamin'])); ?></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td valign="top">alamat</td>
      <td><? echo $data['alamat']; ?></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td valign="top">pekerjaan</td>
      <td><? echo $data['pekerjaan']; ?></td>
    </tr>
<tr bgcolor="#FFFFFF"> 
      <td valign="top">kode penyakit</td>
      <td><? echo $data['kd_penyakit']; ?>(<? echo $data['nm_penyakit']; ?>)</td>
    </tr>
<tr bgcolor="#FFFFFF"> 
      <td valign="top">noip</td>
      <td><? echo $data['noip']; ?></td>
    </tr>
<tr bgcolor="#FFFFFF"> 
      <td valign="top">tanggal</td>
      <td><? echo $data['tanggal']; ?></td>
    </tr>
    <tr bgcolor="#DBEAF5"> 
      <td colspan="2" bgcolor="#CCCCCC">&nbsp;</td>
    </tr>
    <?php
  }
  ?>
  </table>
</div>
</body>
</html>