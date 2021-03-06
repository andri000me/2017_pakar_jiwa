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
<title>Rekap</title>
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
echo "<div align='center'><strong>REKAP KONSULTASI</strong>";
echo "<table border='1'>";
echo "  <tr bgcolor='#CCCCCC'>";
echo "   <th>NO</th>";
echo "   <th>NAMA</th>";
echo "   <th>KELAMIN</th>";
echo "   <th>TGL LAHIR</th>";
echo "   <th>ALAMAT</th>";
echo "   <th>PEKERJAAN</th>";
echo "   <th>KODE PENYAKIT</th>";
echo "   <th>NOIP</th>";
echo "   <th>TANGGAL</th>";
echo "  </tr>";
		
		$str   = " SELECT * FROM ".$db.".".$tbl.
		  		 " order by id desc ";
		$query = mysql_query($str);
		if($query && mysql_num_rows($query) > 0){
		  $no = $posisi+1;
		  while($row = mysql_fetch_object($query)){
		  		if($bgcolor=='#f1f1f1'){
		  			$bgcolor='#ffffff';
		  		}
				else{$bgcolor='#f1f1f1';
			}
			$tgl = date('d-m-Y',strtotime($row->lahir));
				echo "<tr bgcolor=$bgcolor>";
				echo "	<td align='center' height='18'><strong>$no</strong></td>";
				echo "	<td>{$row->nama}&nbsp;</td>";
				echo "	<td>{$row->kelamin}&nbsp;</td>";
				echo "	<td>$tgl&nbsp;</td>";
				echo "	<td>{$row->alamat}&nbsp;</td>";
				echo "	<td>{$row->pekerjaan}&nbsp;</td>";
				echo "	<td>{$row->kd_penyakit}&nbsp;</td>";
				echo "	<td>{$row->noip}&nbsp;</td>";
				echo "	<td>{$row->tanggal}&nbsp;</td>";
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