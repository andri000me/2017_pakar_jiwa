<?php 
include "inc.session.php"; 
include "../librari/inc.koneksidb.php";
?>
<html>
<head>
<title>Tampilan Data Penyakit</title></head>
<body>
<div align="center">
  <p>&nbsp;</p>
  <table width="500" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
    <tr> 
      <td colspan="4" bgcolor="#FF9900"><b>DAFTAR SEMUA PENYAKIT</b></td>
    </tr>
    <tr> 
      <td width="23"><b>No</b></td>
      <td width="164"><b>Nama Penyakit </b></td>
      <td width="200"><strong>Pemeriksaan</strong></td>
      <td width="92" align="center"><b>Pilihan</b></td>
    </tr>
    <?php 
	$sql = "SELECT * FROM penyakit ORDER BY kd_penyakit";
	$qry = mysql_query($sql, $koneksi) 
		 or die ("SQL Error".mysql_error());
	while ($data=mysql_fetch_array($qry)) {
	$no++;
  ?>
    <tr bgcolor="#FFFFFF"> 
      <td><?php echo $no; ?></td>
      <td><?php echo $data['nm_penyakit']; ?></td>
      <td><?php echo $data['pemeriksaan']; ?></td>
      <td align="center"> 
        <a href="?page=PenyakitEditFm&kdubah=<?php echo $data['kd_penyakit']; ?>" target="_self">Ubah</a> 
        | <a href="?page=PenyakitHapus&kdhapus=<?php echo $data['kd_penyakit']; ?>"onClick="return confirm('Apakah Anda Yakin Hapus data?') "target="_self">Hapus</a></td>
    </tr>
    <?php
  }
  ?>
    <tr bgcolor="#FFFFFF"> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="center"><a href="PenyakitAddFm.php">Tambah</a></td>
    </tr>
  </table>
</div>
</body>
</html>
