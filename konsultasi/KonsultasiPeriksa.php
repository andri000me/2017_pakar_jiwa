<?php

include "../librari/inc.koneksidb.php";
session_start();


# Baca variabel Form 
$RbPilih = $_REQUEST['RbPilih'];
$TxtKdGejala = $_REQUEST['TxtKdGejala'];
# Mendapatkan No IP
$NOIP = $_SERVER['REMOTE_ADDR'];
$nama = $_SESSION['nama'];
$kelamin = $_SESSION['kelamin'];
$alamat = $_SESSION['alamat'];
$pekerjaan = $_SESSION['pekerjaan'];
$_SESSION['id_user'] = "";
$kd_penyakit = "";
$nm_penyakit = "";
$tgl = "now()";
if ($RbPilih == "YA") {
    switch (strtolower($TxtKdGejala)) {
        case "autis":
            $_SESSION['gejala1'] = "-1";
            $_SESSION['gejala2'] = "-1";
            $_SESSION['gejala3'] = "-1";
            $_SESSION['gejala1'] = "autis";
            $delete = deleteDB($nama, $alamat, $kelamin, $pekerjaan);
            kesimpulan($nama, $kelamin, $alamat, $pekerjaan, $NOIP, $tgl, $koneksi, 'tumbuh kembang');
            break;
        case "delusi":
            $_SESSION['gejala1'] = "-1";
            $_SESSION['gejala2'] = "-1";
            $_SESSION['gejala3'] = "-1";
            if ($_SESSION['gejala1'] == "-1") {
                $_SESSION['gejala1'] = "delusi";
            } else if ($_SESSION['gejala2'] == "-1") {
                $_SESSION['gejala2'] = "delusi";
            } else {
                $_SESSION['gejala3'] = "delusi";
            }
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=depresi'>";
            break;
        case "depresi":
            if ($_SESSION['gejala1'] == "-1") {
                $_SESSION['gejala1'] = "depresi";
            } else if ($_SESSION['gejala2'] == "-1") {
                $_SESSION['gejala2'] = "depresi";
            } else {
                $_SESSION['gejala3'] = "depresi";
            }
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=fobia'>";
            break;
        case "fobia":
            if ($_SESSION['gejala1'] == "-1") {
                $_SESSION['gejala1'] = "fobia";
            } else if ($_SESSION['gejala2'] == "-1") {
                $_SESSION['gejala2'] = "fobia";
            } else {
                $_SESSION['gejala3'] = "fobia";
            }
            //kesimpulan pada fobia
            if ($_SESSION['gejala1'] == "delusi" && $_SESSION['gejala2'] == "depresi" && $_SESSION['gejala3'] == "fobia") {
                $delete = deleteDB($nama, $alamat, $kelamin, $pekerjaan);
                kesimpulan($nama, $kelamin, $alamat, $pekerjaan, $NOIP, $tgl, $koneksi, 'psikosis');
            } else if ($_SESSION['gejala1'] == "delusi" && $_SESSION['gejala2'] == "stress" && $_SESSION['gejala3'] == "fobia") {
                $delete = deleteDB($nama, $alamat, $kelamin, $pekerjaan);
                kesimpulan($nama, $kelamin, $alamat, $pekerjaan, $NOIP, $tgl, $koneksi, 'neurosis');
            }
            break;
        case "damensia":
            if ($_SESSION['gejala1'] == "-1") {
                $_SESSION['gejala1'] = "damensia";
            } else if ($_SESSION['gejala2'] == "-1") {
                $_SESSION['gejala2'] = "damensia";
            } else {
                $_SESSION['gejala3'] = "damensia";
            }
            //kesimpulan pada fobia
            if ($_SESSION['gejala1'] == "delusi" && $_SESSION['gejala2'] == "depresi" && $_SESSION['gejala3'] == "damensia") {
                $delete = deleteDB($nama, $alamat, $kelamin, $pekerjaan);
                kesimpulan($nama, $kelamin, $alamat, $pekerjaan, $NOIP, $tgl, $koneksi, 'psikosis');
            } else if ($_SESSION['gejala1'] == "delusi" && $_SESSION['gejala2'] == "stress" && $_SESSION['gejala3'] == "damensia") {
                $delete = deleteDB($nama, $alamat, $kelamin, $pekerjaan);
                kesimpulan($nama, $kelamin, $alamat, $pekerjaan, $NOIP, $tgl, $koneksi, 'neurosis');
            }
            break;
        case "halusinasi":
            if ($_SESSION['gejala1'] == "-1") {
                $_SESSION['gejala1'] = "halusinasi";
            } else if ($_SESSION['gejala2'] == "-1") {
                $_SESSION['gejala2'] = "halusinasi";
            } else {
                $_SESSION['gejala3'] = "halusinasi";
            }
            //kesimpulan pada fobia
            if ($_SESSION['gejala1'] == "delusi" && $_SESSION['gejala2'] == "halusinasi") {
                $delete = deleteDB($nama, $alamat, $kelamin, $pekerjaan);
                kesimpulan($nama, $kelamin, $alamat, $pekerjaan, $NOIP, $tgl, $koneksi, 'psikosis');
            }
        case "kecemasan":
            if ($_SESSION['gejala1'] == "-1") {
                $_SESSION['gejala1'] = "kecemasan";
            } else if ($_SESSION['gejala2'] == "-1") {
                $_SESSION['gejala2'] = "kecemasan";
            } else {
                $_SESSION['gejala3'] = "kecemasan";
            }
            //kesimpulan pada fobia
            if ($_SESSION['gejala1'] == "delusi" && $_SESSION['gejala2'] == "kecemasan") {
                $delete = deleteDB($nama, $alamat, $kelamin, $pekerjaan);
                kesimpulan($nama, $kelamin, $alamat, $pekerjaan, $NOIP, $tgl, $koneksi, 'neurosis');
            }
        case "stress":
            if ($_SESSION['gejala1'] == "-1") {
                $_SESSION['gejala1'] = "stress";
            } else if ($_SESSION['gejala2'] == "-1") {
                $_SESSION['gejala2'] = "stress";
            } else {
                $_SESSION['gejala3'] = "stress";
            }
            //kesimpulan pada fobia
            if ($_SESSION['gejala1'] == "delusi") {
                echo "<meta http-equiv='refresh' content='0; url=index.php?page=damensia'>";
            }
            break;
        case "gangguan mentorik":
            $_SESSION['gejala1'] = "-1";
            $_SESSION['gejala2'] = "-1";
            $_SESSION['gejala3'] = "-1";
            $_SESSION['gejala1'] = "gangguan mentorik";
            $delete = deleteDB($nama, $alamat, $kelamin, $pekerjaan);
            kesimpulan($nama, $kelamin, $alamat, $pekerjaan, $NOIP, $tgl, $koneksi, 'tumbuh kembang');
            break;
        case "kurang perhatian orang tua":
            $_SESSION['gejala1'] = "-1";
            $_SESSION['gejala2'] = "-1";
            $_SESSION['gejala3'] = "-1";
            $_SESSION['gejala1'] = "kurang perhatian orang tua";
            $delete = deleteDB($nama, $alamat, $kelamin, $pekerjaan);
            kesimpulan($nama, $kelamin, $alamat, $pekerjaan, $NOIP, $tgl, $koneksi, 'psikosis');
            break;
        case "melawan orang tua":
            $_SESSION['gejala1'] = "-1";
            $_SESSION['gejala2'] = "-1";
            $_SESSION['gejala3'] = "-1";
            $_SESSION['gejala1'] = "melawan orang tua";
            $delete = deleteDB($nama, $alamat, $kelamin, $pekerjaan);
            kesimpulan($nama, $kelamin, $alamat, $pekerjaan, $NOIP, $tgl, $koneksi, 'kenakalan remaja');
            break;
        case "penyalahgunaan zat":
            $_SESSION['gejala1'] = "-1";
            $_SESSION['gejala2'] = "-1";
            $_SESSION['gejala3'] = "-1";
            $_SESSION['gejala1'] = "penyalahgunaan zat";
            $delete = deleteDB($nama, $alamat, $kelamin, $pekerjaan);
            kesimpulan($nama, $kelamin, $alamat, $pekerjaan, $NOIP, $tgl, $koneksi, 'kenakalan remaja');
            break;
        default:
            break;
    }
} else {
    switch (strtolower($TxtKdGejala)) {
        //menuju ke delusi
        case "autis":
            $_SESSION['gejala1'] = "-1";
            $_SESSION['gejala2'] = "-1";
            $_SESSION['gejala3'] = "-1";
            if ($_SESSION['gejala1'] == "autis") {
                $_SESSION['gejala1'] = "-1";
            } else if ($_SESSION['gejala2'] == "autis") {
                $_SESSION['gejala2'] = "-1";
            } else {
                $_SESSION['gejala3'] = "-1";
            }
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=delusi'>";
            break;
        case "delusi":
            $_SESSION['gejala1'] = "-1";
            $_SESSION['gejala2'] = "-1";
            $_SESSION['gejala3'] = "-1";
            if ($_SESSION['gejala1'] == "delusi") {
                $_SESSION['gejala1'] = "-1";
            } else if ($_SESSION['gejala2'] == "delusi") {
                $_SESSION['gejala2'] = "-1";
            } else {
                $_SESSION['gejala3'] = "-1";
            }
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=gangguan_konsentrasi'>";
            break;
        case "gangguan konsentrasi":
            $_SESSION['gejala1'] = "-1";
            $_SESSION['gejala2'] = "-1";
            $_SESSION['gejala3'] = "-1";
            if ($_SESSION['gejala1'] == "gangguan konsentrasi") {
                $_SESSION['gejala1'] = "-1";
            } else if ($_SESSION['gejala2'] == "gangguan konsentrasi") {
                $_SESSION['gejala2'] = "-1";
            } else {
                $_SESSION['gejala3'] = "-1";
            }
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=gangguan_mentorik'>";
            break;
        case "gangguan mentorik":
            $_SESSION['gejala1'] = "-1";
            $_SESSION['gejala2'] = "-1";
            $_SESSION['gejala3'] = "-1";
            if ($_SESSION['gejala1'] == "gangguan mentorik") {
                $_SESSION['gejala1'] = "-1";
            } else if ($_SESSION['gejala2'] == "gangguan mentorik") {
                $_SESSION['gejala2'] = "-1";
            } else {
                $_SESSION['gejala3'] = "-1";
            }
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=gangguan_mood'>";
            break;
        case "gangguan mood":
            $_SESSION['gejala1'] = "-1";
            $_SESSION['gejala2'] = "-1";
            $_SESSION['gejala3'] = "-1";
            if ($_SESSION['gejala1'] == "gangguan mood") {
                $_SESSION['gejala1'] = "-1";
            } else if ($_SESSION['gejala2'] == "gangguan mood") {
                $_SESSION['gejala2'] = "-1";
            } else {
                $_SESSION['gejala3'] = "-1";
            }
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=histeria'>";
            break;
        case "histeria":
            $_SESSION['gejala1'] = "-1";
            $_SESSION['gejala2'] = "-1";
            $_SESSION['gejala3'] = "-1";
            if ($_SESSION['gejala1'] == "histeria") {
                $_SESSION['gejala1'] = "-1";
            } else if ($_SESSION['gejala2'] == "histeria") {
                $_SESSION['gejala2'] = "-1";
            } else {
                $_SESSION['gejala3'] = "-1";
            }
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=kurang_perhatian_orang_tua'>";
            break;
        case "kurang perhatian orang tua":
            $_SESSION['gejala1'] = "-1";
            $_SESSION['gejala2'] = "-1";
            $_SESSION['gejala3'] = "-1";
            if ($_SESSION['gejala1'] == "kurang perhatian orang tua") {
                $_SESSION['gejala1'] = "-1";
            } else if ($_SESSION['gejala2'] == "kurang perhatian orang tua") {
                $_SESSION['gejala2'] = "-1";
            } else {
                $_SESSION['gejala3'] = "-1";
            }
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=melawan_orang_tua'>";
            break;
        case "penyalahgunaan zat":
            $_SESSION['gejala1'] = "-1";
            $_SESSION['gejala2'] = "-1";
            $_SESSION['gejala3'] = "-1";
            if ($_SESSION['gejala1'] == "penyalahgunaan zat") {
                $_SESSION['gejala1'] = "-1";
            } else if ($_SESSION['gejala2'] == "penyalahgunaan zat") {
                $_SESSION['gejala2'] = "-1";
            } else {
                $_SESSION['gejala3'] = "-1";
            }
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=hasil'>";
            break;
        case "melawan orang tua":
            $_SESSION['gejala1'] = "-1";
            $_SESSION['gejala2'] = "-1";
            $_SESSION['gejala3'] = "-1";
            if ($_SESSION['gejala1'] == "melawan orang tua") {
                $_SESSION['gejala1'] = "-1";
            } else if ($_SESSION['gejala2'] == "melawan orang tua") {
                $_SESSION['gejala2'] = "-1";
            } else {
                $_SESSION['gejala3'] = "-1";
            }
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=penyalahgunaan_zat'>";
            break;
        case "depresi":
            if ($_SESSION['gejala1'] == "depresi") {
                $_SESSION['gejala1'] = "-1";
            } else if ($_SESSION['gejala2'] == "depresi") {
                $_SESSION['gejala2'] = "-1";
            } else {
                $_SESSION['gejala3'] = "-1";
            }
            if ($_SESSION['gejala1'] == "delusi") {
                echo "<meta http-equiv='refresh' content='0; url=index.php?page=halusinasi'>";
            }
            break;
        case "halusinasi":
            if ($_SESSION['gejala1'] == "halusinasi") {
                $_SESSION['gejala1'] = "-1";
            } else if ($_SESSION['gejala2'] == "halusinasi") {
                $_SESSION['gejala2'] = "-1";
            } else {
                $_SESSION['gejala3'] = "-1";
            }
            if ($_SESSION['gejala1'] == "delusi") {
                echo "<meta http-equiv='refresh' content='0; url=index.php?page=kecemasan'>";
            }
            break;
        case "kecemasan":
            if ($_SESSION['gejala1'] == "kecemasan") {
                $_SESSION['gejala1'] = "-1";
            } else if ($_SESSION['gejala2'] == "kecemasan") {
                $_SESSION['gejala2'] = "-1";
            } else {
                $_SESSION['gejala3'] = "-1";
            }
            if ($_SESSION['gejala1'] == "delusi") {
                echo "<meta http-equiv='refresh' content='0; url=index.php?page=stress'>";
            }
            break;
        case "stress":
            if ($_SESSION['gejala1'] == "stress") {
                $_SESSION['gejala1'] = "-1";
            } else if ($_SESSION['gejala2'] == "stress") {
                $_SESSION['gejala2'] = "-1";
            } else {
                $_SESSION['gejala3'] = "-1";
            }
            if ($_SESSION['gejala1'] == "delusi") {
                echo "<meta http-equiv='refresh' content='0; url=index.php?page=hasil'>";
            }
            break;
        case "fobia":
            if ($_SESSION['gejala1'] == "fobia") {
                $_SESSION['gejala1'] = "-1";
            } else if ($_SESSION['gejala2'] == "fobia") {
                $_SESSION['gejala2'] = "-1";
            } else {
                $_SESSION['gejala3'] = "-1";
            }
            if ($_SESSION['gejala1'] == "delusi" && $_SESSION['gejala2'] == "depresi" && $_SESSION['gejala3'] == "-1") {
                echo "<meta http-equiv='refresh' content='0; url=index.php?page=damensia'>";
            } else if ($_SESSION['gejala1'] == "delusi" && $_SESSION['gejala2'] == "stress" && $_SESSION['gejala3'] == "-1") {
                $delete = deleteDB($nama, $alamat, $kelamin, $pekerjaan);
                kesimpulan($nama, $kelamin, $alamat, $pekerjaan, $NOIP, $tgl, $koneksi, 'neurosis');
            }
            break;
        case "damensia":
            if ($_SESSION['gejala1'] == "damensia") {
                $_SESSION['gejala1'] = "-1";
            } else if ($_SESSION['gejala2'] == "damensia") {
                $_SESSION['gejala2'] = "-1";
            } else {
                $_SESSION['gejala3'] = "-1";
            }
            if ($_SESSION['gejala1'] == "delusi" && $_SESSION['gejala2'] == "depresi" && $_SESSION['gejala3'] == "-1") {
                $delete = deleteDB($nama, $alamat, $kelamin, $pekerjaan);
                kesimpulan($nama, $kelamin, $alamat, $pekerjaan, $NOIP, $tgl, $koneksi, 'psikosis');
            } else if ($_SESSION['gejala1'] == "delusi" && $_SESSION['gejala2'] == "stress" && $_SESSION['gejala3'] == "-1") {
                echo "<meta http-equiv='refresh' content='0; url=index.php?page=fobia'>";
            }
            break;
    }
}

function kesimpulan($nama, $kelamin, $alamat, $pekerjaan, $NOIP, $tgl, $koneksi, $nama_penyakit) {
    $kd_penyakit = "";
    $sql = "SELECT * FROM PENYAKIT WHERE LOWER(NM_PENYAKIT) = '$nama_penyakit'";
    $query = mysql_query($sql, $koneksi);
    while ($row = mysql_fetch_assoc($query)) {
        $kd_penyakit = $row['kd_penyakit'];
    }
    $insert = insertDB($nama, $kelamin, $alamat, $pekerjaan, $kd_penyakit, $NOIP, $tgl);
    if ($insert != 0) {
        $_SESSION['id_user'] = "$insert";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=hasil'>";
    }
}

function insertDB($nama, $kelamin, $alamat, $pekerjaan, $kd_penyakit, $ip, $tanggal) {
    $sql_in = "INSERT INTO analisa_hasil(nama, kelamin, alamat, pekerjaan, kd_penyakit, noip, tanggal) 
        VALUES ('$nama', '$kelamin','$alamat','$pekerjaan','$kd_penyakit','$ip',now())";
    $query = mysql_query($sql_in);
    if ($query) {
        return mysql_insert_id();
    } else {
        return 0;
    }
}

function deleteDB($nama, $alamat, $kelamin, $pekerjaan) {
    $sql = "DELETE FROM ANALISA_HASIL WHERE NAMA = '$nama' ALAMAT='$alamat' AND KELAMIN = '$kelamin' AND PEKERJAAN = '$pekerjaan'";
    $query = mysql_query($sql);
    return $sql;
}
