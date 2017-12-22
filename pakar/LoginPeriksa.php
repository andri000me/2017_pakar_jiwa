<?php
session_start();
include_once "../librari/inc.koneksidb.php";

$TxtUser   = $_REQUEST['TxtUser'];
$TxtPasswd = $_REQUEST['TxtPasswd'];

if (trim($TxtUser)=="") {
	echo "DATA USER BELUM DIISI";
	include "Login.php"; exit;
}
elseif (trim($TxtPasswd)=="") {
	echo "DATA PASSWORD BELUM DIISI";
	include "Login.php"; exit;
}

$sql_cek = "SELECT * FROM pakar WHERE userID='$TxtUser' 
		    AND passID=PASSWORD('$TxtPasswd')";
$qry_cek = mysql_query($sql_cek, $koneksi) 
		   or die ("Gagal Cek".mysql_error());
$ada_cek = mysql_num_rows($qry_cek);
//echo $sql_cek;
//echo $ada_cek;exit;
if ($ada_cek >=1) {
	//$SES_USER=$TxtUser;
	//@session_register("SES_USER");
	$_SESSION["SES_USER"]=$TxtUser;
	//echo "loginya";
	
	header ("location: index.php");
	exit;
}
else {
	echo "USER DAN PASSWORD TIDAK SESUAI";
	include "Login.php"; 
	exit;
}
?>