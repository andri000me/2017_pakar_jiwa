<?php
include "librari/inc.koneksidb.php";
session_start();
$level1 = "";
$level2 = "";
$level3 = "";
if (isset($_SESSION['level1'])) {
    $level1 = $_SESSION['level1'];
}
if (isset($_SESSION['level2'])) {
    $level2 = $_SESSION['level2'];
}
if (isset($_SESSION['level3'])) {
    $level3 = $_SESSION['level3'];
}

$sql = "select vr.*, p.pemeriksaan, p.keterangan, p.solusi "
        . "from "
        . "vw_relasi vr "
        . "inner join penyakit p "
        . "on p.kd_penyakit = vr.kd_penyakit "
        . "where "
        . "kd_gejala1 = '$level1' "
        . "and kd_gejala2 = '$level2' "
        . "and kd_gejala3 = '$level3'";
$query = mysql_query($sql, $koneksi);
$hasil = mysql_fetch_assoc($query);
$kd_penyakit = $hasil['kd_penyakit'];
$nm_penyakit = $hasil['nm_penyakit'];
$keterangan = $hasil['keterangan'];
$pemeriksaan = $hasil['pemeriksaan'];
$solusi = $hasil['solusi'];
?>
<html>
    <head>
        <title>Hasil Analisa Pasien</title>
        <style type="text/css">
            <!--
            .style4 {font-weight: bold; color: #0033CC;}
            .style5 {
                color: #FFFFFF;
                font-weight: bold;
                font-size: 20px;
            }
            -->
        </style>
        <script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
    </head>
    <body>
        <table width="100%" border="0" cellpadding="1" cellspacing="2" bgcolor="#CCCCCC">
            <tr align="center" bgcolor="#FF6600"> 
                <td colspan="2"><span class="style5">HASIL ANALISA GANGGUAN MENTAL</span></td>
            </tr>
            <tr> 
                <td colspan="2" class="style4">DATA PASIEN :</td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
                <td width="152">Nama</td>
                <td width="893"><?php echo $_SESSION['nama']; ?></td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
                <td>Kelamin</td>
                <td><?php echo $_SESSION['nama']; ?></td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
                <td>Alamat</td>
                <td><?php echo $_SESSION['alamat']; ?></td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
                <td>Pekerjaan</td>
                <td><?php echo $_SESSION['pekerjaan']; ?></td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr> 
                <td colspan="2" class="style4">HASIL ANALISA TERAKHIR :</td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
                <td>Penyakit</td>
                <td><?php echo $nm_penyakit; ?></td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
                <td valign="top">Keterangan</td>
                <td><?php echo $keterangan; ?></td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
                <td valign="top">Pemeriksaan</td>
                <td><?php echo $pemeriksaan; ?></td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
                <td valign="top">Solusi</td>
                <td><?php echo $solusi; ?></td>
            </tr>
        </table>
    </body>
</html>

<?php
$lahir = $_SESSION['lahir'];
$NOIP 		= $_SERVER['REMOTE_ADDR'];
$sql_in = "INSERT INTO analisa_hasil SET
				  nama='$_SESSION[nama]',
				  kelamin='$_SESSION[kelamin]',
				  alamat='$_SESSION[alamat]',
				  pekerjaan='$_SESSION[pekerjaan]',
                  lahir=STR_TO_DATE('$lahir', '%d-%m-%Y'),
				  kd_penyakit='$kd_penyakit',
				  noip='$NOIP',
				  tanggal=now()";
                  // echo($sql_in);
$query = mysql_query($sql_in, $koneksi);
?>