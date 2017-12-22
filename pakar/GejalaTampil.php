<?php 
include "inc.session.php"; 
include "../librari/inc.koneksidb.php";
?>
<html>
<head>
<title>Tampilan Data Gejala</title>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>
<body>
<p>&nbsp;</p>
<div align="center">
  <table width="528" border="0" cellpadding="2" cellspacing="1" bgcolor="#DBEAF5">
    <tr bgcolor="#33FFFF"> 
      <td colspan="3" bgcolor="#FF9900"><b>DAFTAR SEMUA GEJALA</b></td>
    </tr>
    <tr> 
      <td width="24" bgcolor="#CCCCCC"><b>No</b></td>
      <td width="315" bgcolor="#CCCCCC"><b>Nama Gejala</b></td>
      <td width="95" align="center" bgcolor="#CCCCCC"><b>Pilihan</b></td>
    </tr>
    <?php 
	$sql = "SELECT * FROM gejala ORDER BY kd_gejala";
	$qry = mysql_query($sql, $koneksi) 
		 or die ("SQL Error".mysql_error());
	while ($data=mysql_fetch_array($qry)) {
	$no++;
  ?>
    <tr bgcolor="#FFFFFF"> 
      <td><?php echo $no; ?></td>
      <td><?php echo $data['nm_gejala']; ?></td>
      <td align="center"> 
        <a href="?page=GejalaEditFm&kdubah=<?php echo $data['kd_gejala']; ?>" target="_self">Ubah</a> 
        | <a href="?page=GejalaHapus&kdhapus=<?php echo $data['kd_gejala']; ?>" onClick="return confirm('Apakah Anda Yakin Hapus data?') "target="_self">Hapus</a></td>
    </tr>
    <?php
  }
  ?>
    <tr> 
      <td bgcolor="#CCCCCC">&nbsp;</td>
      <td bgcolor="#CCCCCC">&nbsp;</td>
      <td align="center" bgcolor="#CCCCCC"><a href="GejalaAddFm.php">Tambah</a></td>
    </tr>
  </table>
</div>
</body>
</html>
