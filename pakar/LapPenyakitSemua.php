<?php 
include "inc.session.php";  
include "../librari/inc.koneksidb.php";
?>
<html>
<head>
<title>Tampilan Data Penyakit</title>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>
<body>
<script>
function printpage()
  {
  window.print()
  }
</script>
<div align="center">
  <p>&nbsp;  </p>
  <p>
    <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','100','height','22','src','button5','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','button5' ); //end AC code
  </script>
    <noscript>
    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="100" height="22">
      <param name="BGCOLOR" value="">
      <param name="movie" value="button5.swf">
      <param name="quality" value="high">
      <embed src="button5.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="100" height="22" ></embed>
    </object>
    </noscript>
  </p>
  <p>&nbsp;</p>
  <table width="800" border="0" cellpadding="2" cellspacing="1" bgcolor="#FF9900">
    <tr> 
      <td colspan="2"><div align="center"><b>DAFTAR SEMUA PENYAKIT </b></div></td>
    </tr>
    <tr bgcolor="#DBEAF5"> 
      <td colspan="2" bgcolor="#CCCCCC">&nbsp;</td>
    </tr>
    <?php 
	$sql = "SELECT * FROM penyakit ORDER BY kd_penyakit";
	$qry = mysql_query($sql, $koneksi) 
		 or die ("SQL Error".mysql_error());
	while ($data=mysql_fetch_array($qry)) {
	$no++;
  ?>
    <tr bgcolor="#FFFFFF">
      <td width="110">Kode</td>
      <td width="379"><? echo $data['kd_penyakit']; ?></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td valign="top">Nama Penyakit </td>
      <td><? echo $data['nm_penyakit']; ?></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td valign="top">Keterangan</td>
      <td><? echo $data['keterangan']; ?></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td valign="top">Pemeriksaan </td>
      <td><? echo $data['pemeriksaan']; ?></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td valign="top">Solusi</td>
      <td><? echo $data['solusi']; ?></td>
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
