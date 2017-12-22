<?php 
include "inc.session.php"; 
include "../librari/inc.koneksidb.php";
$kdsakit = $_REQUEST['kdsakit'];
?>
<html>
<head>
<title>Halaman Buat Relasi Gejala Penyakit</title>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
</head>
<body>
<center>
<p>&nbsp;</p>
<form name="form1" method="post" action="?page=RelasiAddSim">
<table width="500" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
<tr bgcolor="#CCCCCC"> 
  <td height="48" colspan="2" align="center" bgcolor="#FF9900"><b> RELASI GEJALA DAN PENYAKIT  </b></td>
</tr>
<tr >
  <td colspan="2" bgcolor="#CCCCCC"><b>Nama Penyakit :</b></td>
</tr>
<tr>
  <td colspan="2" bgcolor="#FFFFFF">
    <select name="CmbPenyakit" onChange="MM_jumpMenu('parent',this,0)">
    <option value="<?= $_SERVER['PHP_SELF'];?>">[ Daftar Penyakit ]</option>
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
		echo "<option value='?page=RelasiAddPilih&kdsakit=$datap[kd_penyakit]' $cek>
			  $datap[nm_penyakit]</option>";
	}
  ?>
  </select>
  <input name="TxtKodeH" type="hidden"  value="<?= $kdsakit; ?>"></td>
</tr>
<tr> 
  <td colspan="2" bgcolor="#CCCCCC"><b>Daftar Gejala : </b></td>
  </tr>
<?php 
$sql = "SELECT * FROM gejala ORDER BY kd_gejala";
$qry = mysql_query($sql, $koneksi) 
	 or die ("SQL Error: ".mysql_error());
while ($data=mysql_fetch_array($qry)) {
  $no++;
   $sqlr  = "SELECT * FROM relasi ";
   $sqlr .= "WHERE kd_penyakit='$kdsakit' ";
   $sqlr .= "AND kd_gejala='$data[kd_gejala]'";
   $qryr = mysql_query($sqlr, $koneksi);
   $cocok= mysql_num_rows($qryr);
	if ($cocok==1) {
		$cek = " checked";
		$bg  = "#CCFF00";
	}
	else {
		$cek = "";
		$bg  = "#FFFFFF";
	}
?>
<tr bgcolor="#FFFFFF"> 
  <td width="20" bgcolor="<?= $bg; ?>">
  	<input name="CekGejala[]" type="checkbox" value="<?= $data['kd_gejala']; ?>" <?= $cek; ?>></td>
  <td width="469">
    <? echo $data['nm_gejala']; ?>  </td>
</tr>
<?php
 }
?>
<tr bgcolor="#DBEAF5"> 
  <td colspan="2" align="center" bgcolor="#CCCCCC">
    <input type="submit" name="Submit" value="Simpan Relasi">
    <input type="reset" name="reset" value="Normalkan"></td>
</tr>
</table>
</form>
</center>
</body>
</html>
