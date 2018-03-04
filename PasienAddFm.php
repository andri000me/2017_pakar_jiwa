<?php
include "librari/inc.koneksidb.php";
unset($_SESSION['level1']);
unset($_SESSION['level2']);
unset($_SESSION['level3']);
//echo $_SESSION['level1']."-1<br>";
//echo $_SESSION['level2']."-2<br>";
//echo $_SESSION['level3']."-3";
?>
<html>
    <head>
        <title>Form Masukan Data Anda</title>
        <style type="text/css">
            <!--
            .style4 {
                font-size: 14pt;
                color: #990000;
            }
            .style5 {color: #FFFFFF}
            .style6 {color: #0099FF}
            .style7 {color: #0066FF}
            -->
        </style>
    </head>
    <body>
        <p>&nbsp;</p>
        <form action="?page=daftarsim" method="post" name="form1" target="_self">
            <table width="762" border="0"align="center" >
                <tr>
                    <td width="202">&nbsp;</td>
                    <td width="550"><table width="453" border="0"cellpadding="2" cellspacing="1" bgcolor="#FF9900">
                            <tr>
                                <td colspan="2"><b>MASUKAN DATA ANDA </b></td>
                            </tr>
                            <tr bgcolor="#FFFFFF">
                                <td>NAMA</td>
                                <td><input name="TxtNama" type="text" value="<?= $TxtNama; ?>" size="35" maxlength="60"></td>
                            </tr>
                            <tr bgcolor="#FFFFFF">
                                <td>JENIS KELAMIN</td>
                                <td><input type="radio" name="RbKelamin" value="P" checked>
                                    Pria
                                    <input type="radio" name="RbKelamin" value="W">
                                    Wanita</td>
                            </tr>
                            <tr bgcolor="#FFFFFF">
                                <td>ALAMAT</td>
                                <td><input name="TxtAlamat" type="text" value="<?= $TxtAlamat; ?>" size="35" maxlength="60"></td>
                            </tr>
                            <tr bgcolor="#FFFFFF">
                                <td width="126">PEKERJAAN</td>
                                <td width="316"><input name="TxtPekerjaan" type="text" value="<?= $TxtPekerjaan; ?>" size="35" maxlength="60"></td>
                            </tr>
                            <tr bgcolor="#FFFFFF">
                                <td>&nbsp;</td>
                                <td><input type="submit" name="Submit" value="Daftar"></td>
                            </tr>
                        </table>
                        <p>&nbsp;</p>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
