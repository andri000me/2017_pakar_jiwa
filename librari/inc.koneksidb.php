<?php

error_reporting(0);
?>
<?php

$my['host'] = "localhost";
$my['user'] = "root";
$my['pass'] = "miko";
$my['dbs'] = "2017_pakar_jiwa";

$koneksi = mysql_connect($my['host'], $my['user'], $my['pass']);
if (!$koneksi) {
    echo "Koneksi gagal";
    mysql_error();
}
mysql_select_db($my['dbs'])
        or die("Database tidak ada" . mysql_error());
?>