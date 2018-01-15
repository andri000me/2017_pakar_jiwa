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
elseif ($page == "dafgejala") {
    if (file_exists("GejalaTampil.php")) {
        include "GejalaTampil.php";
    } else {
        echo "FILE PROGRAM GEJALA PENYAKIT TIDAK ADA";
    }
}

//halaman registrasi
elseif ($page == "daftar") {
    if (file_exists("PasienAddFm.php")) {
        include "PasienAddFm.php";
    } else {
        echo "FILE PROGRAM FORM PASIEN TIDAK ADA";
    }
}

//halaman daftar sim
elseif ($page == "daftarsim") {
    
    if (file_exists("PasienAddSim.php")) {
        include "PasienAddSim.php";
    } else {
        echo "FILE PROGRAM FORM PASIEN SIMPAN TIDAK ADA";
    }
}

////halaman konsul lama
//elseif ($page == "konsul") {
//    if (file_exists("KonsultasiFm.php")) {
//        include "KonsultasiFm.php";
//    } else {
//        echo "FILE PROGRAM FORM KONSULTASI TIDAK ADA";
//    }
//}
//
////halaman konsul cek lama
//elseif ($page == "konsulcek") {
//    echo "adsadsad";
//    exit();
//    if (file_exists("KonsultasiPeriksa.php")) {
//        include "KonsultasiPeriksa.php";
//    } else {
//        echo "FILE PROGRAM KONSULTASI PERIKSA TIDAK ADA";
//    }
//} 
//halaman konsul cek baru
elseif ($page == "konsulcek") {
    if (file_exists("konsultasi/KonsultasiPeriksa.php")) {
        include "konsultasi/KonsultasiPeriksa.php";
    } else {
        echo "FILE PROGRAM KONSULTASI PERIKSA TIDAK ADA";
    }
}

//halaman hasil
elseif ($page == "hasil") {
    if (file_exists("konsultasi/AnalisaHasil.php")) {
        include "konsultasi/AnalisaHasil.php";
    } else {
        echo "FILE PROGRAM ANALISA HASIL TIDAK ADA";
    }
}

//halaman tolong
elseif ($page == "tolong") {
    if (file_exists("tolong.php")) {
        include "tolong.php";
    } else {
        echo "FILE PROGRAM PERTOLONGAN TIDAK ADA";
    }
}

//halaman tentang
elseif ($page == "tentang") {
    if (file_exists("tentang.php")) {
        include "tentang.php";
    } else {
        echo "FILE PROGRAM tentang TIDAK ADA";
    }
}

//halaman home
elseif ($page == "home") {
    if (file_exists("home.php")) {
        include "home.php";
    } else {
        echo "FILE HALAMAN TIDAK ADA";
    }
}

//halaman tanpa embel2
elseif ($page == "") {
    if (file_exists("PasienAddSim.php")) {
        include "PasienAddSim.php";
    } else {
        echo "FILE HALAMAN TIDAK ADA";
    }
}

//halaman kenapa
elseif ($page == "kenapa") {
    if (file_exists("kenapa.php")) {
        include "kenapa.php";
    } else {
        echo "FILE HALAMAN TIDAK ADA";
    }
}

//halaman autis / konsul baru
elseif ($page == "konsul") {
    if (file_exists("konsultasi/autis.php")) {
        include "konsultasi/autis.php";
    } else {
        echo "FILE HALAMAN TIDAK ADA";
    }
}

//halaman delusi
elseif ($page == "delusi") {
    if (file_exists("konsultasi/delusi.php")) {
        include "konsultasi/delusi.php";
    } else {
        echo "FILE HALAMAN TIDAK ADA";
    }
}

//halaman gangguan konsentrasi
elseif ($page == "gangguan_konsentrasi") {
    if (file_exists("konsultasi/gangguan_konsentrasi.php")) {
        include "konsultasi/gangguan_konsentrasi.php";
    } else {
        echo "FILE HALAMAN TIDAK ADA";
    }
}

//halaman gangguan mentorik
elseif ($page == "gangguan_mentorik") {
    if (file_exists("konsultasi/gangguan_mentorik.php")) {
        include "konsultasi/gangguan_mentorik.php";
    } else {
        echo "FILE HALAMAN TIDAK ADA";
    }
}

//halaman gangguan mood
elseif ($page == "gangguan_mood") {
    if (file_exists("konsultasi/gangguan_mood.php")) {
        include "konsultasi/gangguan_mood.php";
    } else {
        echo "FILE HALAMAN TIDAK ADA";
    }
}

//halaman histeria
elseif ($page == "histeria") {
    if (file_exists("konsultasi/histeria.php")) {
        include "konsultasi/histeria.php";
    } else {
        echo "FILE HALAMAN TIDAK ADA";
    }
}

//halaman kurang perhatian orang tua
elseif ($page == "kurang_perhatian_orang_tua") {
    if (file_exists("konsultasi/kurang_perhatian_orang_tua.php")) {
        include "konsultasi/kurang_perhatian_orang_tua.php";
    } else {
        echo "FILE HALAMAN TIDAK ADA";
    }
}

//halaman Melawann orang tua
elseif ($page == "melawan_orang_tua") {
    if (file_exists("konsultasi/melawan_orang_tua.php")) {
        include "konsultasi/melawan_orang_tua.php";
    } else {
        echo "FILE HALAMAN TIDAK ADA";
    }
}

//halaman Penyalahgunaan zat dan obat-obatan terlarang
elseif ($page == "penyalahgunaan_zat") {
    if (file_exists("konsultasi/penyalahgunaan_zat.php")) {
        include "konsultasi/penyalahgunaan_zat.php";
    } else {
        echo "FILE HALAMAN TIDAK ADA";
    }
}

//halaman Depresi
elseif ($page == "depresi") {
    if (file_exists("konsultasi/depresi.php")) {
        include "konsultasi/depresi.php";
    } else {
        echo "FILE HALAMAN TIDAK ADA";
    }
}

//halaman Halusinasi
elseif ($page == "halusinasi") {
    if (file_exists("konsultasi/halusinasi.php")) {
        include "konsultasi/halusinasi.php";
    } else {
        echo "FILE HALAMAN TIDAK ADA";
    }
}

//halaman Kecemasan
elseif ($page == "kecemasan") {
    if (file_exists("konsultasi/kecemasan.php")) {
        include "konsultasi/kecemasan.php";
    } else {
        echo "FILE HALAMAN TIDAK ADA";
    }
}

//halaman Stress
elseif ($page == "stress") {
    if (file_exists("konsultasi/stress.php")) {
        include "konsultasi/stress.php";
    } else {
        echo "FILE HALAMAN TIDAK ADA";
    }
}

//halaman Damesia
elseif ($page == "damensia") {
    if (file_exists("konsultasi/damensia.php")) {
        include "konsultasi/damensia.php";
    } else {
        echo "FILE HALAMAN TIDAK ADA";
    }
}

//halaman Kesulitan Mengeja
elseif ($page == "kesulitan_mengeja") {
    if (file_exists("konsultasi/kesulitan_mengeja.php")) {
        include "konsultasi/kesulitan_mengeja.php";
    } else {
        echo "FILE HALAMAN TIDAK ADA";
    }
}

//halaman Obsesif Kopulsif
elseif ($page == "obsesif_kopulsif") {
    if (file_exists("konsultasi/obsesif_kopulsif.php")) {
        include "konsultasi/obsesif_kopulsif.php";
    } else {
        echo "FILE HALAMAN TIDAK ADA";
    }
}

//halaman Fobia
elseif ($page == "fobia") {
    if (file_exists("konsultasi/fobia.php")) {
        include "konsultasi/fobia.php";
    } else {
        echo "FILE HALAMAN TIDAK ADA";
    }
}
?>