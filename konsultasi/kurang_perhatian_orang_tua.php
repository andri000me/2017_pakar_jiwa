<?php 
include "librari/inc.koneksidb.php";
session_start();
?>
<html>
<head>
<title>Form Utama Penelusuran</title>
</head>
<body>
<form action="?page=konsulcek" method="post" name="form1" target="_self">
  <p>&nbsp;</p>
  <table width="200" border="0"align="center" >
    <tr>
      <td height="336">&nbsp;</td>
      <td><table width="450" border="0" cellpadding="2" cellspacing="1" bgcolor="#FF9900">
        <tr>
          <td><b>JAWABLAH PERTANYAAN BERIKUT :</b></td>
        </tr>
        <tr>
          <td width="312" bgcolor="#FFFFFF">Apakah  anda mengalami Kurang Perhatian Orang Tua
            ?
            <input name="TxtKdGejala" type="hidden" value="kurang perhatian orang tua"></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"><input type="radio" name="RbPilih" value="YA" checked>
            Benar (YA)
            <input type="radio" name="RbPilih" value="TIDAK">
            Salah (TIDAK)</td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"><input type="submit" name="Submit" value="Jawab"></td>
        </tr>
      </table>
      </td>
    </tr>
  </table>
</form>
</body>
</html>