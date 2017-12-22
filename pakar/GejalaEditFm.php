<?php
include "inc.session.php";
include "../librari/inc.koneksidb.php";

$kdubah = $_REQUEST['kdubah'];
if ($kdubah !="") {	
	# Menampilkan data
	$sql = "SELECT * FROM gejala WHERE kd_gejala='$kdubah'";
	$qry = mysql_query($sql, $koneksi) 
		   or die ("SQL Error".mysql_error());
	$data=mysql_fetch_array($qry); 
	
	# Samakan dgn Variabel Form
	$TxtGejala = $data['nm_gejala'];
	$TxtKodeH  = $data['kd_gejala'];
}
?>
<html>
<head>
<title>Merubah Data Gejala</title>
</head>
<body>
<center>
<p>&nbsp;</p>
<form name="form1" method="post" action="?page=GejalaEditSim">
  <table width="400" border="0" cellpadding="2" cellspacing="1" bgcolor="#DBEAF5">
    <tr> 
      <td colspan="2" bgcolor="#FF9900"><b>MERUBAH GEJALA PENYAKIT</b></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td>Kode</td>
      <td><input name="TxtKode" type="text"  maxlength="4" size="6" value="<? echo $TxtKodeH; ?>" disabled="disabled">
	      <input name="TxtKodeH" type="hidden" value="<? echo $TxtKodeH; ?>"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td width="77">Gejala</td>
      <td width="361"><textarea name="TxtGejala" cols="35" rows="3"><? echo $TxtGejala; ?></textarea></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Simpan"></td>
    </tr>
  </table>
</form>
</center>
</body>
</html>
