<?php
// isi $excel akan bernilai true apabila ditemukan parameter get dengan nama 'excel'
$excel = isset($_GET['excel']);
if($excel):
	// buat nama file unique untuk di download
	$filename = 'export-'.date('YmdHis');
	// dengan perintah di bawah ini akan memunculkan dialog download di browser anda
	header("Content-type: application/x-msdownload");
	// perintah di bawah untuk menentukan nama file yang akan di download
	header("Content-Disposition: attachment; filename=".$filename.".xls");
else:
	// tag header di html disembuyikan apabila sedang convert html to excel
?>
<html>
<head> 
<style type="text/css">
/* setting format tabel */
table {
	font-family: Verdana; 
	font-size: 8pt;
	border-width: 1px;
	border-style: solid;
	border-color: #ccd2d2;
	border-collapse: collapse;
	background-color: #f9f9f9;
}
th {
	color: #000;
	font-size: 8pt;
	text-transform: uppercase;
	text-align: center;
	padding: 0.5em;
	border-width: 1px;
	border-style: solid;
	border-color: #000;
	border-collapse: collapse;
	background-color: #ccc; 
}
td {
	padding: 0.1em;
	color: #272727;
	vertical-align: top;
	border-width: 1px;
	border-style: solid;
	border-color: #000;
	border-collapse: collapse;
	font-size: 8pt;
}
</style>
<title>Laporan Excel</title>
</head>
<body>
<script>
function printpage()
  {
  window.print()
  }
</script>
<?php	endif; ?>
<?php if(!$excel): ?>
<!-- Tombol di bawah dan penutup html hanya akan dipanggil apabila dalam kondisi melihat data, 
	 tapi ketika menampilkan file excel tombol ini disembunyikan -->
<div align="center" style="margin-top:15px">
	<input type="button" onClick="document.location='?excel=1'" value="Export ke Excel" />
	<input type="button" value="Print Halaman" onClick="printpage()"/>
</div>
<br>
<?php endif; ?>
<?php
//setting koneksi anda
$server 	= "localhost";
$username 	= "root";
$password 	= "";
$db 		= "2017_pakar_jiwa";
$tbl 		= "analisa_hasil";

$koneksi = mysql_connect($server,$username,$password); 
mysql_select_db($db, $koneksi) or die("Cannot connect to database..");

// create tabel dengan php
echo "<div align='center'><strong>REKAP SEMUA GEJALA</strong>";
echo "<table border='1'>";
echo "  <tr bgcolor='#CCCCCC'>";
echo "   <th>NO</th>";
echo "   <th>KODE GEJALA</th>";
echo "   <th>NAMA GEJALA</th>";
echo "  </tr>";
		
		$str   = "SELECT gejala.* FROM gejala,relasi WHERE gejala.kd_gejala=relasi.kd_gejala ";
		  		 " ORDER BY gejala.kd_gejala ";
		$query = mysql_query($str);
		if($query && mysql_num_rows($query) > 0){
		  $no = $posisi+1;
		  while($row = mysql_fetch_object($query)){
		  		if($bgcolor=='#f1f1f1'){$bgcolor='#ffffff';}
				else{$bgcolor='#f1f1f1';}
				echo "<tr bgcolor=$bgcolor>";
				echo "	<td align='center' height='18'><strong>$no</strong></td>";
				echo "	<td>{$row->kd_gejala}&nbsp;</td>";
				echo "	<td>{$row->nm_gejala}&nbsp;</td>";
				
			$no++;	
		  }
		}
		//echo $str;
echo "  </tr>";
echo "</table>";
echo "</div>";
?>
</body>
</html>