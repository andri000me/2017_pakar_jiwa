<?php 
include "inc.session.php";  
include "../librari/inc.koneksidb.php";
?>
<html>
<head>
<title>Tampilan Rekap Konsultasi</title>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
<!--
.style1 {
	font-size: 18px;
	font-weight: bold;
}
-->
</style>
</head>
<body>
	<div align="center">
  	<p>&nbsp;  	  </p>
  	<p align="left">&nbsp;</p>
  	<p>
  	  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0','width','100','height','22','src','button2','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','','movie','button2' ); //end AC code
      </script>
      <noscript>
      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="100" height="22">
        <param name="BGCOLOR" value="">
        <param name="movie" value="button2.swf">
        <param name="quality" value="high">
        <embed src="button2.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="100" height="22" ></embed>
      </object>
      </noscript>
  	</p>
  	<p class="style1">DAFTAR SEMUA HASIL KONSULTASI</p>
  	<p>
<?
  // jumlah data yang akan ditampilkan per halaman

$dataPerPage = 5;

// apabila $_GET['page'] sudah didefinisikan, gunakan nomor halaman tersebut, 
// sedangkan apabila belum, nomor halamannya 1.

if(isset($_GET['page']))
{
    $noPage = $_GET['page'];
} 
else $noPage = 1;

// perhitungan offset

$offset = ($noPage - 1) * $dataPerPage;

// query SQL untuk menampilkan data perhalaman sesuai offset

$query = "SELECT * FROM analisa_hasil p inner join penyakit b on p.kd_penyakit=b.kd_penyakit LIMIT $offset, $dataPerPage";

$result = mysql_query($query) or die('Error');

// menampilkan data 
$warnaHeading = "#FF9900"; // warna merah untuk heading tabel
echo "<table border='2'>";
echo "<tr bgcolor='".$warnaHeading."'>
		<td> NO </td>
		<td> NAMA </td>
    <td> KELAMIN </td>
		<td> TGL LAHIR </td>
		<td> ALAMAT </td>
		<td> PEKERJAAN </td>
		<td> KODE PENYAKIT </td>
		<td> NAMA PENYAKIT </td>
		<td> NOIP </td>
		<td> TANGGAL </td></tr>";
		$counter = 1;
while($data = mysql_fetch_array($result))
{
   echo "<tr><td>".$data['id'].
   		"</td><td>".$data['nama'].
    "</td><td>".$data['kelamin'].
		"</td><td>".date('d-m-Y',strtotime($data['lahir'])).
		"</td><td>".$data['alamat'].
		"</td><td>".$data['pekerjaan'].
		"</td><td>".$data['kd_penyakit'].
		"</td><td>".$data['nm_penyakit'].
		"</td><td>".$data['noip'].
		"</td><td>".$data['tanggal']."</td></tr>";
}

echo "</table>";

$query   = "SELECT COUNT(*) AS jumData FROM analisa_hasil ";
$hasil  = mysql_query($query);
$data     = mysql_fetch_array($hasil);

$jumData = $data['jumData'];
$counter++; // menambah counter

// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data

$jumPage = ceil($jumData/$dataPerPage);

// menampilkan link previous

if ($noPage > 1) echo  "<a href='".$_SERVER['PHP_SELF']."?page=".($noPage-1)."'>&lt;&lt; Prev</a>";

// memunculkan nomor halaman dan linknya

for($page = 1; $page <= $jumPage; $page++)
{
         if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
         {   
            if (($showPage == 1) && ($page != 2))  echo "..."; 
            if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "...";
            if ($page == $noPage) echo " <b>".$page."</b> ";
            else echo " <a href='".$_SERVER['PHP_SELF']."?page=".$page."'>".$page."</a> ";
            $showPage = $page;          
         }
}

// menampilkan link next

if ($noPage < $jumPage) echo "<a href='".$_SERVER['PHP_SELF']."?page=".($noPage+1)."'>Next &gt;&gt;</a>";

?>
    <p>
      <script type="text/javascript">
	AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','153','height','49','src','button10','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','bgcolor','','movie','button10' ); //end AC code
      </script>
      <noscript>
      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="153" height="49">
        <param name="BGCOLOR" value="">
        <param name="movie" value="button10.swf">
        <param name="quality" value="high">
        <embed src="button10.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="153" height="49"></embed>
      </object>
      </noscript>
    
</div>
</body>
</html>