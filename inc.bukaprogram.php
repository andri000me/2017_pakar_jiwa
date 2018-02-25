<?php

error_reporting(1);
session_start();
$page = @$_REQUEST['page'];
//halaman penyakit tampil
if ($page == "dafsakit") {
    if (file_exists("PenyakitTampil.php")) {
        include "PenyakitTampil.php";
    } else {
        echo "FILE PROGRAM PENYAKIT TIDAK ADA";
    }
}

//halaman gejala
else if ($page == "dafgejala") {
    if (file_exists("GejalaTampil.php")) {
        include "GejalaTampil.php";
    } else {
        echo "FILE PROGRAM GEJALA PENYAKIT TIDAK ADA";
    }
}

//halaman registrasi
else if ($page == "daftar") {
    if (file_exists("PasienAddFm.php")) {
        include "PasienAddFm.php";
    } else {
        echo "FILE PROGRAM FORM PASIEN TIDAK ADA";
    }
}

//halaman daftar sim
else if ($page == "daftarsim") {

    if (file_exists("PasienAddSim.php")) {
        include "PasienAddSim.php";
    } else {
        echo "FILE PROGRAM FORM PASIEN SIMPAN TIDAK ADA";
    }
}
//halaman konsul cek baru
else if ($page == "konsulcek") {
    if (file_exists("konsultasi/KonsultasiPeriksa.php")) {
        include "konsultasi/KonsultasiPeriksa.php";
    } else {
        echo "FILE PROGRAM KONSULTASI PERIKSA TIDAK ADA";
    }
}

//halaman konsul cek baru
else if ($page == "konsulcekpertama") {
    if (file_exists("konsultasi/backend.php")) {
        include "konsultasi/backend.php";
    } else {
        echo "FILE PROGRAM KONSULTASI PERIKSA TIDAK ADA";
    }
}

//halaman hasil
else if ($page == "hasil") {
    if (file_exists("konsultasi/AnalisaHasil.php")) {
        include "konsultasi/AnalisaHasil.php";
    } else {
        echo "FILE PROGRAM ANALISA HASIL TIDAK ADA";
    }
}

//halaman hasil
else if ($page == "nohasil") {
    if (file_exists("konsultasi/AnalisaHasilTidakAda.php")) {
        include "konsultasi/AnalisaHasilTidakAda.php";
    } else {
        echo "FILE PROGRAM ANALISA HASIL TIDAK ADA";
    }
}

//halaman tolong
else if ($page == "tolong") {
    if (file_exists("tolong.php")) {
        include "tolong.php";
    } else {
        echo "FILE PROGRAM PERTOLONGAN TIDAK ADA";
    }
}

//halaman tentang
else if ($page == "tentang") {
    if (file_exists("tentang.php")) {
        include "tentang.php";
    } else {
        echo "FILE PROGRAM tentang TIDAK ADA";
    }
}

//halaman home
else if ($page == "home") {
    if (file_exists("home.php")) {
        include "home.php";
    } else {
        echo "FILE HALAMAN TIDAK ADA";
    }
}

//halaman tanpa embel2
else if ($page == "") {
    if (file_exists("PasienAddSim.php")) {
        include "PasienAddSim.php";
    } else {
        echo "FILE HALAMAN TIDAK ADA";
    }
}

//halaman kenapa
else if ($page == "kenapa") {
    if (file_exists("kenapa.php")) {
        include "kenapa.php";
    } else {
        echo "FILE HALAMAN TIDAK ADA";
    }
}

//halaman autis / konsul baru
else if ($page == "konsul") {
    if (file_exists("konsultasi/autis.php")) {
        include "konsultasi/autis.php";
    } else {
        echo "FILE HALAMAN TIDAK ADA";
    }
} 

//halaman untuk konsultasi level 1
else if ($page == "konsul1") {
    if (file_exists("konsultasi/konsultasi_level1.php")) {
        include "konsultasi/konsultasi_level1.php";
    } else {
        echo "FILE HALAMAN TIDAK ADA";
    }
}

//halaman untuk konsultasi level 2
else if ($page == "konsul2") {
    if (file_exists("konsultasi/konsultasi_level2_0.php")) {
        include "konsultasi/konsultasi_level2_0.php";
    } else {
        echo "FILE HALAMAN TIDAK ADA";
    }
}

//halaman untuk konsultasi level 2
else if ($page == "konsul3") {
    if (file_exists("konsultasi/konsultasi_level3_0.php")) {
        include "konsultasi/konsultasi_level3_0.php";
    } else {
        echo "FILE HALAMAN TIDAK ADA";
    }
}

//halaman untuk konsultasi level 2
else if ($page == "konsul2_") {
    if (file_exists("konsultasi/konsultasi_level2_1.php")) {
        include "konsultasi/konsultasi_level2_1.php";
    } else {
        echo "FILE HALAMAN TIDAK ADA";
    }
}

//halaman untuk konsultasi level 2
else if ($page == "konsul3_") {
    if (file_exists("konsultasi/konsultasi_level3_1.php")) {
        include "konsultasi/konsultasi_level3_1.php";
    } else {
        echo "FILE HALAMAN TIDAK ADA";
    }
}