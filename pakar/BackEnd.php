<?php

include "inc.session.php";
include "../librari/inc.koneksidb.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
    switch ($_POST['action']) {
        case "deleteRelasi":
            $id = $_POST['id'];
            $sql = "delete from relasi where id_relasi = '$id'";
            $query = mysql_query($sql, $koneksi);
            if ($query) {
                echo "1";
            } else {
                echo "0";
            }

            break;
        case "updateRelasi":
            $id = $_POST['id'];
            $penyakit = $_POST['penyakit'];
            $gejala1 = $_POST['gejala1'];
            $gejala2 = $_POST['gejala2'];
            $gejala3 = $_POST['gejala3'];
            $sql = "select * from relasi where kd_penyakit = '$penyakit' and "
                    . "kd_gejala1 = '$gejala1' and "
                    . "kd_gejala2 = '$gejala2' and "
                    . "kd_gejala3 = '$gejala3'";
            $query = mysql_query($sql, $koneksi)
                    or die("SQL Error: " . mysql_error());
            $num_rows = mysql_num_rows($query);
            if ($num_rows == 0) {
                $sql1 = "update relasi set "
                        . "kd_penyakit='$penyakit', "
                        . "kd_gejala1='$gejala1', "
                        . "kd_gejala2='$gejala2', "
                        . "kd_gejala3='$gejala3'"
                        . "where id_relasi = '$id'";
                $query1 = mysql_query($sql1, $koneksi);
                if ($query1) {
                    echo "1";
                } else {
                    echo "0";
                }
            } else {
                echo "99";
            }
            break;
        default:
            break;
    }
} else {
    switch ($_GET['action']) {
        case "getGejala":
            $response = array();
            $sqlp = "select * from gejala order by nm_gejala asc";
            $query = mysql_query($sqlp, $koneksi)
                    or die("SQL Error: " . mysql_error());
            while ($row = mysql_fetch_assoc($query)) {
                array_push($response, $row);
            }
            echo json_encode($response);
            break;
        case "cekDuplikat":
            $penyakit = $_GET['penyakit'];
            $gejala1 = $_GET['gejala1'];
            $gejala2 = $_GET['gejala2'];
            $gejala3 = $_GET['gejala3'];
            $sql = "select * from relasi where kd_penyakit = '$penyakit' and "
                    . "kd_gejala1 = '$gejala1' and "
                    . "kd_gejala2 = '$gejala2' and "
                    . "kd_gejala3 = '$gejala3'";
            $query = mysql_query($sql, $koneksi)
                    or die("SQL Error: " . mysql_error());
            $num_rows = mysql_num_rows($query);
            if ($num_rows == 0) {
                $sql1 = "insert into relasi(kd_penyakit, kd_gejala1, kd_gejala2, kd_gejala3) "
                        . "values('$penyakit', '$gejala1', '$gejala2', '$gejala3')";
                $query1 = mysql_query($sql1, $koneksi);
                if ($query1) {
                    echo "1";
                } else {
                    echo "0";
                }
            } else {
                echo "99";
            }
            break;
        default:
            break;
    }
}