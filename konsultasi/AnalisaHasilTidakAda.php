<?php
include "librari/inc.koneksidb.php";
session_start();
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
                <td>Tidak ada penyakit terdeteksi</td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
                <td valign="top">Keterangan</td>
                <td>-</td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
                <td valign="top">Pemeriksaan</td>
                <td>-</td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
                <td valign="top">Solusi</td>
                <td>-</td>
            </tr>
        </table>

        <p>
            <script type="text/javascript">
                AC_FL_RunContent('codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0', 'width', '100', 'height', '22', 'src', 'button1', 'quality', 'high', 'pluginspage', 'http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash', 'bgcolor', '', 'movie', 'button1'); //end AC code
            </script>
            <noscript>
            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="100" height="22">
                <param name="BGCOLOR" value="">
                <param name="movie" value="button1.swf">
                <param name="quality" value="high">
                <embed src="button1.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="100" height="22" ></embed>
            </object>
            </noscript>
        </p>
    <center>
    </center></body>
</html>