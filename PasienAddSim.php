<?php
include "librari/inc.koneksidb.php";
session_start();

# Baca variabel Form (If Register Global ON)
$TxtNama = $_REQUEST['TxtNama'];
$RbKelamin = $_REQUEST['RbKelamin'];
$TxtAlamat = $_REQUEST['TxtAlamat'];
$TxtPekerjaan = $_REQUEST['TxtPekerjaan'];
$TxtTglLahir = $_REQUEST['TxtTglLahir'];
#inisialisasi session
$_SESSION['nama'] = $TxtNama;
$_SESSION['kelamin'] = $RbKelamin;
$_SESSION['alamat'] = $TxtAlamat;
$_SESSION['pekerjaan'] = $TxtPekerjaan;
$_SESSION['lahir'] = $TxtTglLahir;

$_SESSION['autis'] = "-1";
$_SESSION['damesia'] = "-1";
$_SESSION['delusi'] = "-1";
$_SESSION['depresi'] = "-1";
$_SESSION['fobia'] = "-1";
$_SESSION['gangguan mentorik'] = "-1";
$_SESSION['gangguan_konsentrasi'] = "-1";
$_SESSION['gangguan_mood'] = "-1";
$_SESSION['halusinasi'] = "-1";
$_SESSION['histeria'] = "-1";
$_SESSION['kecemasan'] = "-1";
$_SESSION['kesulitan_mengeja'] = "-1";
$_SESSION['kurang_perhatian_orang_tua'] = "-1";
$_SESSION['melawan_orang_tua'] = "-1";
$_SESSION['obsesif_kopulsif'] = "-1";
$_SESSION['penyalahgunaan_zat'] = "-1";
$_SESSION['stress'] = "-1";

$_SESSION['gejala1'] = "-1";
$_SESSION['gejala2'] = "-1";
$_SESSION['gejala3'] = "-1";

$_SESSION['id_user'] = "-1";

# Validasi Form
if (trim($TxtNama) == "") {
    include "PasienAddFm.php";
    echo "Nama belum diisi, ulangi kembali";
} elseif (trim($TxtAlamat) == "") {
    include "PasienAddFm.php";
    echo "Alamat masih kosong, ulangi kembali";
} elseif (trim($TxtPekerjaan) == "") {
    include "PasienAddFm.php";
    echo "Pekerjaan masih kosong, ulangi kembali";
} else {
    $NOIP = $_SERVER['REMOTE_ADDR'];
    $sqldel = "DELETE FROM tmp_pasien WHERE noip='$NOIP'";
    mysql_query($sqldel, $koneksi);

    $sql = " INSERT INTO tmp_pasien (nama,kelamin,alamat,pekerjaan,noip,tanggal) 
		 	  VALUES ('$TxtNama','$RbKelamin','$TxtAlamat','$TxtPekerjaan','$NOIP',NOW())";
    mysql_query($sql, $koneksi)
            or die("SQL Error 2" . mysql_error());

    $sqlhapus = "DELETE FROM tmp_penyakit WHERE noip='$NOIP'";
    mysql_query($sqlhapus, $koneksi)
            or die("SQL Error 1" . mysql_error());

    $sqlhapus2 = "DELETE FROM tmp_analisa WHERE noip='$NOIP'";
    mysql_query($sqlhapus2, $koneksi)
            or die("SQL Error 2" . mysql_error());

    $sqlhapus3 = "DELETE FROM tmp_gejala WHERE noip='$NOIP'";
    mysql_query($sqlhapus3, $koneksi)
            or die("SQL Error 3" . mysql_error());

    echo "<meta http-equiv='refresh' content='0; url=index.php?page=konsul'>";
//    header('Location: http://www.example.com/');
}
?>
<script>
    document.getElementById("namax").innerHTML = "Paragraph changed!";

</script>