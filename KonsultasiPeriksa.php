<?php 
include "librari/inc.koneksidb.php";
	
# Baca variabel Form 
$RbPilih 	= $_REQUEST['RbPilih'];
$TxtKdGejala= $_REQUEST['TxtKdGejala'];

# Mendapatkan No IP
$NOIP 		= $_SERVER['REMOTE_ADDR'];

# Fungsi untuk menambah data ke tmp_analisa
function AddTmpAnalisa($kdgejala, $NOIP) {
	// sql untuk ambil data relasi dgn ketentuan kd_penyakit=kd_penyakit yg ada didalam tmp_penyakit
	$sql_sakit = "SELECT relasi.* FROM relasi,tmp_penyakit 
				  WHERE relasi.kd_penyakit=tmp_penyakit.kd_penyakit 
				  AND noip='$NOIP' ORDER BY relasi.kd_penyakit,relasi.kd_gejala";
	$qry_sakit = mysql_query($sql_sakit);
	while ($data_sakit = mysql_fetch_array($qry_sakit)) {
	//data yang didapatkan dari query diatas dimaksudkan ke dalam tmp_analisa
		$sqltmp = "INSERT INTO tmp_analisa (noip, kd_penyakit,kd_gejala)
					VALUES ('$NOIP','$data_sakit[kd_penyakit]','$data_sakit[kd_gejala]')";
		mysql_query($sqltmp);
	}
}

# Fungsi untuk menambah tabel tmp_gejala
function AddTmpGejala($kdgejala, $NOIP) {
	$sql_gejala = "INSERT INTO tmp_gejala (noip,kd_gejala) VALUES ('$NOIP','$kdgejala')";
	mysql_query($sql_gejala);
}

# Fungsi untuk mengosongkan tabel tmp penyakit
function DelTmpSakit($NOIP) {
	$sql_del = "DELETE FROM tmp_penyakit WHERE noip='$NOIP'";
	mysql_query($sql_del);
}

# Fungsi untuk mengosongkan tmp_analisa
function DelTmpAnlisa($NOIP) {
	$sql_del = "DELETE FROM tmp_analisa WHERE noip='$NOIP'";
	mysql_query($sql_del);
}

# PEMERIKSAAN jawaban, jika pilih jawaban YA
if ($RbPilih == "YA") {
	// periksa apa ada data di tmp analisa
	$sql_analisa = "SELECT * FROM tmp_analisa where noip='$NOIP' ";
	$qry_analisa = mysql_query($sql_analisa, $koneksi);
	$data_cek = mysql_num_rows($qry_analisa);
	if ($data_cek >= 1) {
		# Kode saat tmp_analisa tidak kosong, kosongkan dulu daftar penyakit
		DelTmpSakit($NOIP);
		// sql untuk mengambil data tmp_analisa. yang kode gejalanya dipilih oleh pasien
		$sql_tmp = "SELECT * FROM tmp_analisa 
					WHERE kd_gejala='$TxtKdGejala' 
					AND noip='$NOIP'";
		$qry_tmp = mysql_query($sql_tmp, $koneksi);
		while ($data_tmp = mysql_fetch_array($qry_tmp)) {
		// sql untuk ambil data relasi yg kd penyakit ada didalam tbl tmp_aanalisa
			$sql_rsakit = "SELECT * FROM relasi 
							WHERE kd_penyakit='$data_tmp[kd_penyakit]' 
							GROUP BY kd_penyakit";
			$qry_rsakit = mysql_query($sql_rsakit, $koneksi);
			while ($data_rsakit = mysql_fetch_array($qry_rsakit)) {
				// hasil query diatas yg mana Data penyakit yang mungkin dimasukkan ke tmp, jadi hanya penyakit yang mungkin.
				$sql_input = "INSERT INTO tmp_penyakit (noip,kd_penyakit)
							 VALUES ('$NOIP','$data_rsakit[kd_penyakit]')";
				mysql_query($sql_input, $koneksi);
			}
		} 
		// Gunakan Fungsi
		DelTmpAnlisa($NOIP);
		// fungsi mengisi data tmp analisa
		AddTmpAnalisa($TxtKdGejala, $NOIP);
		AddTmpGejala($TxtKdGejala, $NOIP);
	}	
	else {
		# Kode saat tmp_analisa kosong
		// sql untuk untuk mengambil daata relasi yg kd gejala dipilih oleh pasien 
		$sql_rgejala = "SELECT * FROM relasi WHERE kd_gejala='$TxtKdGejala'";
		$qry_rgejala = mysql_query($sql_rgejala, $koneksi);
		while ($data_rgejala = mysql_fetch_array($qry_rgejala)) {
		// ambil data relasi yg kd penyakit sesuai dengan query sebelumnya(relasi)
			$sql_rsakit = "SELECT * FROM relasi 
						   WHERE kd_penyakit='$data_rgejala[kd_penyakit]' 
						   GROUP BY kd_penyakit";
			$qry_rsakit = mysql_query($sql_rsakit, $koneksi);
			while ($data_rsakit = mysql_fetch_array($qry_rsakit)) {
				// hasil dari query disimpan dalam tabel tmp penyakit
				$sql_input = "INSERT INTO tmp_penyakit (noip,kd_penyakit)
							 VALUES ('$NOIP','$data_rsakit[kd_penyakit]')";
				mysql_query($sql_input, $koneksi);
			}
		} 
		// Menggunakan Fungsi menambah data ke tmp analisa dan gejala
		AddTmpAnalisa($TxtKdGejala, $NOIP);
		AddTmpGejala($TxtKdGejala, $NOIP);
	}
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=konsul'>";
}
## Pemeriksaan jawaban penelusuran 2, apabila memilih tidak
//  ambil semua data dari tmp analisa 
if ($RbPilih == "TIDAK") {
	$sql_analisa = "SELECT * FROM tmp_analisa where noip='$NOIP' ";
	$qry_analisa = mysql_query($sql_analisa, $koneksi);
	$data_cek = mysql_num_rows($qry_analisa);
	if ($data_cek >= 1) {
		# Kode saat tmp_analisa tidak kosong
		# hapus tmp_analisa yg tidak sesuai
		// ambil data kd_penyakit yg dipilih dr tbl tmp analisa , syarat gejalanya telah dipilih 
		$sql_relasi = "SELECT * FROM tmp_analisa WHERE kd_gejala='$TxtKdGejala'";
		$qry_relasi = mysql_query($sql_relasi, $koneksi);
		while($hsl_relasi = mysql_fetch_array($qry_relasi)){
			// Hapus daftar relasi yang sudah tidak mungkin dari tabel tmp
			$sql_deltmp = "DELETE FROM tmp_analisa 
							WHERE kd_penyakit='$hsl_relasi[kd_penyakit]' 
							AND noip='$NOIP'";
			mysql_query($sql_deltmp, $koneksi);
			
			// Hapus daftar penyakit yang sudah tidak ada kemungkinan, syarat ikuti sql diatas 
			$sql_deltmp2 = "DELETE FROM tmp_penyakit 
						    WHERE kd_penyakit='$hsl_relasi[kd_penyakit]' 
						    AND noip='$NOIP'";
			mysql_query($sql_deltmp2, $koneksi);
		}		
	}
	else {
		# Apabila data tmp analisa kosong , Pindahkan data relsi ke tmp_analisa
		// ambil daftar dulu dari relasi
		$sql_relasi= "SELECT * FROM relasi ORDER BY kd_penyakit,kd_gejala";
		$qry_relasi= mysql_query($sql_relasi, $koneksi);
		while($hsl_relasi=mysql_fetch_array($qry_relasi)){
		// perintah sql untuk memindah data ke tmp analisa
			$sql_intmp = "INSERT INTO tmp_analisa (noip, kd_penyakit,kd_gejala)
						  VALUES ('$NOIP','$hsl_relasi[kd_penyakit]',
						  '$hsl_relasi[kd_gejala]')";
			mysql_query($sql_intmp,$koneksi);
			
			// Masukkan data penyakit yang mungkin terjangkit
			$sql_intmp2 = "INSERT INTO tmp_penyakit(noip,kd_penyakit)
						   VALUES ('$NOIP','$hsl_relasi[kd_penyakit]')";
			mysql_query($sql_intmp2,$koneksi);				
		}
		
		# Hapus tmp_analisa yang tidak sesuai
		$sql_relasi2 = "SELECT * FROM relasi WHERE kd_gejala='$TxtKdGejala'";
		$qry_relasi2 = mysql_query($sql_relasi2, $koneksi);
		while($hsl_relasi2 = mysql_fetch_array($qry_relasi2)){
			$sql_deltmp = "DELETE FROM tmp_analisa 
						   WHERE kd_penyakit='$hsl_relasi2[kd_penyakit]' 
						   AND noip='$NOIP'";
			mysql_query($sql_deltmp, $koneksi);
			
			// Hapus penyakit yang sudah tidak mungkin
			$sql_deltmp2 = "DELETE FROM tmp_penyakit 
							WHERE kd_penyakit='$hsl_relasi2[kd_penyakit]' 
							AND noip='$NOIP'";
			mysql_query($sql_deltmp2, $koneksi);
		}
	}
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=konsul'>";
}
?>