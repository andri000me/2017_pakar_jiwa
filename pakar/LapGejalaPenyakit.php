<?php 
include "inc.session.php"; 
include "../librari/inc.koneksidb.php";
$kdsakit = $_REQUEST['kdsakit'];
?>
<html>
<head>
<title>Halaman Buat Relasi Gejala Penyakit</title>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>
<body>
<p>&nbsp;</p>
<form name="form1" method="post" action="?page=LapGejalaPenyakit2">
  <div align="center">
    <table width="428" border="0" cellpadding="2" cellspacing="1" bgcolor="#99FFFF">
      <tr>
        <td colspan="2" bgcolor="#FF9900"><b>TAMPILKAN GEJALA PER PENYAKIT</b></td>
      </tr>
      <tr>
        <td width="125" bgcolor="#CCCCCC"><b> Penyakit</b></td>
        <td width="292" bgcolor="#CCCCCC">
        <select name="CmbPenyakit">
          <option value="NULL">[ Daftar Penyakit ]</option>
          <?php 
	$sqlp = "SELECT * FROM penyakit ORDER BY kd_penyakit";
	$qryp = mysql_query($sqlp, $koneksi) 
		    or die ("SQL Error: ".mysql_error());
	while ($datap=mysql_fetch_array($qryp)) {
		if ($datap['kd_penyakit']==$kdsakit) {
			$cek ="selected";
		}
		else {
			$cek ="";
		}
		echo "<option value='$datap[kd_penyakit]' $cek>
			  $datap[nm_penyakit] ($datap[kd_penyakit])</option>";
	}
  ?>
        </select></td>
    </tr>
      <tr bgcolor="#DBEAF5"> 
        <td align="center" bgcolor="#CCCCCC">&nbsp;</td>
      <td bgcolor="#CCCCCC"><input type="submit" name="Submit" value="Tampil"></td>
    </tr>
    </table>
    <p>
      <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','100','height','22','src','button6','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','button6' ); //end AC code
      </script>
      <noscript>
      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="100" height="22">
        <param name="BGCOLOR" value="">
        <param name="movie" value="button6.swf">
        <param name="quality" value="high">
        <embed src="button6.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="100" height="22" ></embed>
      </object>
      </noscript>
    </p>
  </div>
</form>
</body>
</html>
