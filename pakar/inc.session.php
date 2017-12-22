<?php
@session_start();
if(!isset($_SESSION["SES_USER"]))
{
	echo "<div align=center><b> PERHATIAN! </b><br>";
	echo "AKSES DITOLAK, PAKAR BELUM LOGIN</div>";
	include "Login.php";
	exit;
}
?>