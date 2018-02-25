<?php

include "../librari/inc.koneksidb.php";
session_start();
switch ($_POST['level']) {
    case "0":
        switch ($_POST['RbPilih']) {
            case "YA":
                $kd_gejala = $_POST['kd_gejala'];
                $_SESSION['level1'] = $kd_gejala;
                $sqlCek = "select * from vw_relasi where kd_gejala1 = '$kd_gejala' and kd_gejala2 != ''";
                $queryCek = mysql_query($sqlCek, $koneksi);
                $cek = mysql_num_rows($queryCek);
                if ($cek > 0) {
                    echo "<meta http-equiv='refresh' content='0; url=index.php?page=konsul2'>";
                } else {
                    echo "<meta http-equiv='refresh' content='0; url=index.php?page=hasil'>";
                }
                break;
            case "TIDAK":
                $kd_gejala = $_POST['kd_gejala'];
                //query untuk mendapatkan iterator/urutan gejala
                $posSql = "select * from (SELECT @i:=@i+1 AS iterator, t.* FROM vw_gejala AS t, (SELECT @i:=0) AS foo) x where x.kd_gejala = '$kd_gejala'";
                $posQuery = mysql_query($posSql, $koneksi);
                $pos = mysql_fetch_assoc($posQuery);
                $iterator = $pos['iterator'];
                $gejala = $pos['kd_gejala'];
                $nama = $pos['nm_gejala'];

                //query untuk mendapatkan gejala selanjutnya
                $sqlSelanjutnya = "SELECT * FROM"
                        . "(SELECT @i:=@i+1 AS iterator, t.* FROM vw_gejala AS t, (SELECT @i:=0) AS foo )x "
                        . "WHERE iterator > $iterator "
                        . "LIMIT 1";
                $querySelanjutnya = mysql_query($sqlSelanjutnya, $koneksi);
                if (mysql_num_rows($querySelanjutnya) > 0) {
                    $selanjutnya = mysql_fetch_assoc($querySelanjutnya);
                    $iteratorSelanjutnya = $selanjutnya['iterator'];
                    $gejalaSelanjutnya = $selanjutnya['kd_gejala'];
                    $namaSelanjutnya = $selanjutnya['nm_gejala'];
                    echo "<meta http-equiv='refresh' content='0; url=index.php?page=konsul1&gejala=$gejalaSelanjutnya'>";
                } else {
                    echo "<meta http-equiv='refresh' content='0; url=index.php?page=nohasil'>";
                }
                break;
        }
        break;
    case "1":
        switch ($_POST['RbPilih']) {
            case "YA":
                $kd_gejala = $_POST['kd_gejala'];
                $_SESSION['level1'] = $kd_gejala;
                $sqlCek = "select * from vw_relasi where kd_gejala1 = '$kd_gejala' and kd_gejala2 != ''";
                $queryCek = mysql_query($sqlCek, $koneksi);
                $cek = mysql_num_rows($queryCek);
                if ($cek > 0) {
                    echo "<meta http-equiv='refresh' content='0; url=index.php?page=konsul2'>";
                } else {
                    echo "<meta http-equiv='refresh' content='0; url=index.php?page=hasil'>";
                }
                break;
            case "TIDAK":
                $kd_gejala = $_POST['kd_gejala'];

                //query untuk mendapatkan iterator/urutan gejala
                $posSql = "select * from (SELECT @i:=@i+1 AS iterator, t.* FROM vw_gejala AS t, (SELECT @i:=0) AS foo) x where x.kd_gejala = '$kd_gejala'";
                $posQuery = mysql_query($posSql, $koneksi);
                $pos = mysql_fetch_assoc($posQuery);
                $iterator = $pos['iterator'];
                $gejala = $pos['kd_gejala'];
                $nama = $pos['nm_gejala'];

                //query untuk mendapatkan gejala selanjutnya
                $sqlSelanjutnya = "SELECT * FROM"
                        . "(SELECT @i:=@i+1 AS iterator, t.* FROM vw_gejala AS t, (SELECT @i:=0) AS foo )x "
                        . "WHERE iterator > $iterator "
                        . "LIMIT 1";
                $querySelanjutnya = mysql_query($sqlSelanjutnya, $koneksi);
                if (mysql_num_rows($querySelanjutnya) > 0) {
                    $selanjutnya = mysql_fetch_assoc($querySelanjutnya);
                    $iteratorSelanjutnya = $selanjutnya['iterator'];
                    $gejalaSelanjutnya = $selanjutnya['kd_gejala'];
                    $namaSelanjutnya = $selanjutnya['nm_gejala'];
                    echo "<meta http-equiv='refresh' content='0; url=index.php?page=konsul1&gejala=$gejalaSelanjutnya'>";
                } else {
                    echo "<meta http-equiv='refresh' content='0; url=index.php?page=nohasil'>";
                }
                break;
        }
        break;
    default:
        break;
}
switch ($_POST['level2']) {
    case "0":
        switch ($_POST['RbPilih']) {
            case "YA":
                $kd_gejala = $_POST['kd_gejala'];
                $_SESSION['level2'] = $kd_gejala;
                $sqlCek = "select * from vw_relasi where kd_gejala2 = '$kd_gejala' and kd_gejala3 != ''";
                $queryCek = mysql_query($sqlCek, $koneksi);
                $cek = mysql_num_rows($queryCek);
                if ($cek > 0) {
                    echo "<meta http-equiv='refresh' content='0; url=index.php?page=konsul3'>";
                } else {
                    echo "<meta http-equiv='refresh' content='0; url=index.php?page=hasil'>";
                }
                break;
            case "TIDAK":
                $kd_gejala = $_POST['kd_gejala'];
                $level1 = $_SESSION['level1'];
                //query untuk mendapatkan iterator/urutan gejala
                $posSql = "SELECT *
                            FROM (
                            SELECT @i:=@i+1 AS iterator, t.*
                            FROM (
                            SELECT distinct kd_gejala2 AS kd_gejala, gejala2 AS nm_gejala
                            FROM vw_relasi
                            WHERE kd_gejala1 = '$level1' order by nm_gejala asc) AS t, (
                            SELECT @i:=0) AS foo) x
                            WHERE x.kd_gejala = '$kd_gejala'";
                $posQuery = mysql_query($posSql, $koneksi);
                $pos = mysql_fetch_assoc($posQuery);
                $iterator = $pos['iterator'];
                $gejala = $pos['kd_gejala'];
                $nama = $pos['nm_gejala'];

                //query untuk mendapatkan gejala selanjutnya
                $sqlSelanjutnya = "SELECT * FROM"
                        . "(SELECT @i:=@i+1 AS iterator, t.* 
                            FROM (SELECT distinct kd_gejala2 AS kd_gejala, gejala2 AS nm_gejala
                            FROM vw_relasi 
                            WHERE kd_gejala1 = '$level1' order by nm_gejala asc) AS t, (SELECT @i:=0) AS foo )x "
                        . "WHERE iterator > $iterator "
                        . "LIMIT 1";
                $querySelanjutnya = mysql_query($sqlSelanjutnya, $koneksi);
                if (mysql_num_rows($querySelanjutnya) > 0) {
                    $selanjutnya = mysql_fetch_assoc($querySelanjutnya);
                    $iteratorSelanjutnya = $selanjutnya['iterator'];
                    $gejalaSelanjutnya = $selanjutnya['kd_gejala'];
                    $namaSelanjutnya = $selanjutnya['nm_gejala'];
                    echo "<meta http-equiv='refresh' content='0; url=index.php?page=konsul2_&gejala=$gejalaSelanjutnya'>";
                } else {
                    echo "<meta http-equiv='refresh' content='0; url=index.php?page=nohasil'>";
                }
                break;
        }
        break;
    case "1":
        switch ($_POST['RbPilih']) {
            case "YA":
                $kd_gejala = $_POST['kd_gejala'];
                $_SESSION['level2'] = $kd_gejala;
                $sqlCek = "select * from vw_relasi where kd_gejala2 = '$kd_gejala' and kd_gejala3 != ''";
                $queryCek = mysql_query($sqlCek, $koneksi);
                $cek = mysql_num_rows($queryCek);
                if ($cek > 0) {
                    echo "<meta http-equiv='refresh' content='0; url=index.php?page=konsul3'>";
                } else {
                    echo "<meta http-equiv='refresh' content='0; url=index.php?page=hasil'>";
                }
                break;
            case "TIDAK":
                $kd_gejala = $_POST['kd_gejala'];
                $level1 = $_SESSION['level1'];
                //query untuk mendapatkan iterator/urutan gejala
                $posSql = "SELECT *
                            FROM (
                            SELECT @i:=@i+1 AS iterator, t.*
                            FROM (
                            SELECT distinct kd_gejala2 AS kd_gejala, gejala2 AS nm_gejala
                            FROM vw_relasi
                            WHERE kd_gejala1 = '$level1'  order by nm_gejala asc) AS t, (
                            SELECT @i:=0) AS foo) x
                            WHERE x.kd_gejala = '$kd_gejala'";
                $posQuery = mysql_query($posSql, $koneksi);
                $pos = mysql_fetch_assoc($posQuery);
                $iterator = $pos['iterator'];
                $gejala = $pos['kd_gejala'];
                $nama = $pos['nm_gejala'];
                //query untuk mendapatkan gejala selanjutnya
                $sqlSelanjutnya = "SELECT * FROM"
                        . "(SELECT @i:=@i+1 AS iterator, t.* 
                            FROM (SELECT distinct kd_gejala2 AS kd_gejala, gejala2 AS nm_gejala
                            FROM vw_relasi 
                            WHERE kd_gejala1 = '$level1' order by nm_gejala asc) AS t, (SELECT @i:=0) AS foo )x "
                        . "WHERE iterator > $iterator "
                        . "LIMIT 1";
                $querySelanjutnya = mysql_query($sqlSelanjutnya, $koneksi);
                if (mysql_num_rows($querySelanjutnya) > 0) {
                    $selanjutnya = mysql_fetch_assoc($querySelanjutnya);
                    $iteratorSelanjutnya = $selanjutnya['iterator'];
                    $gejalaSelanjutnya = $selanjutnya['kd_gejala'];
                    $namaSelanjutnya = $selanjutnya['nm_gejala'];
                    echo "<meta http-equiv='refresh' content='0; url=index.php?page=konsul2_&gejala=$gejalaSelanjutnya'>";
                } else {
                    echo "<meta http-equiv='refresh' content='0; url=index.php?page=nohasil'>";
                }
                break;
        }
        break;
    default:
        break;
}
switch ($_POST['level3']) {
    case "0":
        switch ($_POST['RbPilih']) {
            case "YA":
                $kd_gejala = $_POST['kd_gejala'];
                $_SESSION['level3'] = $kd_gejala;
                echo "<meta http-equiv='refresh' content='0; url=index.php?page=hasil'>";
                break;
            case "TIDAK":
                $kd_gejala = $_POST['kd_gejala'];
                $level1 = $_SESSION['level1'];
                $level2 = $_SESSION['level2'];
                //query untuk mendapatkan iterator/urutan gejala
                $posSql = "SELECT *
                            FROM (
                            SELECT @i:=@i+1 AS iterator, t.*
                            FROM (
                            SELECT kd_gejala3 AS kd_gejala, gejala3 AS nm_gejala
                            FROM vw_relasi
                            WHERE kd_gejala1 = '$level1' AND kd_gejala2 = '$level2' order by nm_gejala asc) AS t, (
                            SELECT @i:=0) AS foo) x
                            WHERE x.kd_gejala = '$kd_gejala'";
                $posQuery = mysql_query($posSql, $koneksi);
                $pos = mysql_fetch_assoc($posQuery);
                $iterator = $pos['iterator'];
                $gejala = $pos['kd_gejala'];
                $nama = $pos['nm_gejala'];

                //query untuk mendapatkan gejala selanjutnya
                $sqlSelanjutnya = "SELECT * FROM"
                        . "(SELECT @i:=@i+1 AS iterator, t.* FROM (SELECT kd_gejala3 AS kd_gejala, gejala3 AS nm_gejala
                            FROM vw_relasi
                            WHERE kd_gejala1 = '$level1' AND kd_gejala2 = '$level2'  order by nm_gejala asc) AS t, "
                        . "(SELECT @i:=0) AS foo )x "
                        . "WHERE iterator > $iterator "
                        . "LIMIT 1";
                $querySelanjutnya = mysql_query($sqlSelanjutnya, $koneksi);
                if (mysql_num_rows($querySelanjutnya) > 0) {
                    $selanjutnya = mysql_fetch_assoc($querySelanjutnya);
                    $iteratorSelanjutnya = $selanjutnya['iterator'];
                    $gejalaSelanjutnya = $selanjutnya['kd_gejala'];
                    $namaSelanjutnya = $selanjutnya['nm_gejala'];
                    echo "<meta http-equiv='refresh' content='0; url=index.php?page=konsul3_&gejala=$gejalaSelanjutnya'>";
                } else {
                    echo "<meta http-equiv='refresh' content='0; url=index.php?page=nohasil'>";
                }
                break;
        }
        break;
    case "1":
        switch ($_POST['RbPilih']) {
            case "YA":
                $kd_gejala = $_POST['kd_gejala'];
                $_SESSION['level3'] = $kd_gejala;
                echo "<meta http-equiv='refresh' content='0; url=index.php?page=hasil'>";
                break;
            case "TIDAK":
                $kd_gejala = $_POST['kd_gejala'];
                $level1 = $_SESSION['level1'];
                $level2 = $_SESSION['level2'];
                //query untuk mendapatkan iterator/urutan gejala
                $posSql = "SELECT *
                            FROM (
                            SELECT @i:=@i+1 AS iterator, t.*
                            FROM (
                            SELECT kd_gejala3 AS kd_gejala, gejala3 AS nm_gejala
                            FROM vw_relasi
                            WHERE kd_gejala1 = '$level1' AND kd_gejala2 = '$level2') AS t, (
                            SELECT @i:=0) AS foo) x
                            WHERE x.kd_gejala = '$kd_gejala'";
                $posQuery = mysql_query($posSql, $koneksi);
                $pos = mysql_fetch_assoc($posQuery);
                $iterator = $pos['iterator'];
                $gejala = $pos['kd_gejala'];
                $nama = $pos['nm_gejala'];

                //query untuk mendapatkan gejala selanjutnya
                $sqlSelanjutnya = "SELECT * FROM"
                        . "(SELECT @i:=@i+1 AS iterator, t.* FROM (SELECT kd_gejala3 AS kd_gejala, gejala3 AS nm_gejala
                            FROM vw_relasi
                            WHERE kd_gejala1 = '$level1' AND kd_gejala2 = '$level2') AS t, (SELECT @i:=0) AS foo )x "
                        . "WHERE iterator > $iterator "
                        . "LIMIT 1";
                $querySelanjutnya = mysql_query($sqlSelanjutnya, $koneksi);
                if (mysql_num_rows($querySelanjutnya) > 0) {
                    $selanjutnya = mysql_fetch_assoc($querySelanjutnya);
                    $iteratorSelanjutnya = $selanjutnya['iterator'];
                    $gejalaSelanjutnya = $selanjutnya['kd_gejala'];
                    $namaSelanjutnya = $selanjutnya['nm_gejala'];
                    echo "<meta http-equiv='refresh' content='0; url=index.php?page=konsul3_&gejala=$gejalaSelanjutnya'>";
                } else {
                    echo "<meta http-equiv='refresh' content='0; url=index.php?page=nohasil'>";
                }
                break;
        }
        break;
    default:
        break;
}