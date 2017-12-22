<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<p align="justify"><strong>APLIKASI WEB DIAGNOSA PENYAKIT GANGGUAN MENTAL DENGAN  MENGGUNKAN PHP DAN MYSQL</strong></p>
<p align="justify">Sistem pakar adalah sistem berbasis computer  yang menggunakan pengetahuan, fakta dan teknik penalaran dalam memecahkan  masalah yang bisanya hanya dapat dipecahkan oleh seorang pakar dalam bidang  tersebut. Pada dasarnya sistem pakar diterapkan untuk mendukung aktivitas  pemecahan masalah. Dengan pendekatan tersebut, dibuatlah program yang  berbasiskan pengetahuan medis , untuk mendiagnosa penyakit Gangguan mental  seperti diagnosa gangguan psikosis, neurosis, learning disolder, kenakalan  remaja, dan tumbuh kembang. sehingga dapat mendeteksi penyakit sejak dini.  Informasi dalam bentuk tampilan WEB yang menarik dan mudah untuk dipahami,  diharapkan mampu membuat konsultasi menjadi menyenangkan.</p>
<p>
  <?php


require_once 'function.php';

session_start();

$dbconn = sql_connect('localhost', 'root', '', '2017_pakar_jiwa');
if(!$dbconn) {
    $exitmsg = "There seems to be a problem, sorry for the inconvenience. We should be back shortly.";
	exit($exitmsg);
}

if (isset($_GET['id'])) {
	$id = intval($_GET['id']);
} else {
	$id = 0;
}



echo "<div>{$content['title']}";
echo "{$content['body']}</div>";
	
// komentar
$alert = "<div><span>Berikan Komentar</span>";

if(isset($_POST['kirim'])) {
	$error = false;
	$nama = trim($_POST['nama']);
	$email = check_email($_POST['email']);
	$pesan = trim($_POST['pesan']);
	$alert .= "<br><br><span style='color:#c00;'>";
	if (strlen($nama) < 2 || strlen($pesan) < 2) {
		$alert .= "Mohon tulis nama dan komentar dengan benar.<br>";
		$error = true;
	}
	if (!$email) {
		$alert .= "Alamat e-mail anda tidak valid.<br>";
		$error = true;
	}
	if (!verify_code($_POST['randomcode'], $_POST['code'])) {
		$alert .= "Kode salah.<br>";
		$error = true;
	}
	if (!$error) {
		$nama = strip_tags($nama);
		$pesan = strip_tags($pesan);
		mysql_query("INSERT INTO comment ( name, email, comment, date) VALUES ( '{$nama}', '{$email}', '{$pesan}', NOW() )");
		
		unset($_POST['nama'],$_POST['email'],$_POST['pesan']);
			
		$alert .= "Terima kasih atas komentar anda..";
	}
}

$alert .= "</span></div><br>";

echo "<hr><a name='komentar'></a><h1> Komentar</h1><br>";

	$nama = $row['name'];
	$komentar = $row['comment'];
	$datestamp = $row['date'];
	echo "<div style='border:1px solid;'>{$nama}<br />{$datestamp}<br />{$komentar}</div><br />";

	
$nama = isset($_POST['nama']) ? $_POST['nama'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$pesan = isset($_POST['pesan']) ? $_POST['pesan'] : "";

echo "<a name='postkomentar'></a> {$alert}";

$temp = create_code();
$code1 = $temp[0];
$code2 = $temp[1];

echo "<div>
<form method='POST' action='?page=tolong'>
Nama:<br><input name='nama' size='30' type='text' value='{$nama}'><br><br>
E-mail:<br><input name='email' size='30' type='text' value='{$email}'><br><br>
Silahkan tulis komentar anda :<br><textarea cols='45' rows='5' name='pesan'>{$pesan}</textarea><br><br>
Masukkan kode berikut<br> {$code2} 
<input type='hidden' id='randomcode' name='randomcode' value='{$code1}' />
<input maxlength='6' size='6' type='text' name='code' />
<input value=' Kirim ' name='kirim' type='submit' />
</form>
</div>";


?>
</p>
</body>
</html>