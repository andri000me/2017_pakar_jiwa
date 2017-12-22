<?php
session_start();
include_once "inc.session.php";

unset($_SESSION["SES_USER"]);
echo "<meta http-equiv='refresh' content='0; url=Login.php'>";
exit;
?>