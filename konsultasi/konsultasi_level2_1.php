<?php
include "librari/inc.koneksidb.php";
$NOIP = $_SERVER['REMOTE_ADDR'];
$level1 = $_SESSION['level1'];
$gejala = $_GET['gejala'];
$sql = " select distinct kd_gejala2, gejala2  from vw_relasi where kd_gejala1 = '$level1' and kd_gejala2 = '$gejala' order by gejala2 asc limit 1";
$query = mysql_query($sql, $koneksi);
$gejala = mysql_fetch_assoc($query);
$kode_gejala1 = $gejala['kd_gejala2'];
$nama_gejala1 = $gejala['gejala2'];
session_start();
?>
<html>
    <head>
        <title>Form Utama Penelusuran</title>
    </head>
    <body>
        <!--<form action="?page=konsulcek" method="post" name="form1" target="_self">-->
        <form action="?page=konsulcekpertama" method="post" name="form1" target="_self">
            <input type="hidden" name="level2" value="1">
            <p>&nbsp;</p>
            <table width="200" border="0"align="center" >
                <tr>
                    <td height="336">&nbsp;</td>
                    <td>
                        <table width="450" border="0" cellpadding="2" cellspacing="1" bgcolor="#FF9900">
                            <tr>
                                <td>
                                    <b>JAWABLAH PERTANYAAN BERIKUT :</b>
                                </td>
                            </tr>
                            <tr>
                                <td width="312" bgcolor="#FFFFFF">Apakah  anda mengalami <?php echo ucwords($nama_gejala1); ?> ?
                                    <input name="kd_gejala" type="hidden" value="<?php echo $kode_gejala1; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="#FFFFFF">
                                    <input type="radio" name="RbPilih" value="YA" checked>
                                    Benar (YA)
                                    <input type="radio" name="RbPilih" value="TIDAK">
                                    Salah (TIDAK)</td>
                            </tr>
                            <tr>
                                <td bgcolor="#FFFFFF">
                                    <input type="submit" name="Submit" value="Jawab">
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
