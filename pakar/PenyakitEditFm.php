<?php 
include "inc.session.php";  
include "../librari/inc.koneksidb.php";

#Variabel URL (register global)
$kdubah = $_REQUEST['kdubah'];
if ($kdubah !="") {
#menampilkan data
	$sql = "SELECT * FROM penyakit
		WHERE kd_penyakit='$kdubah'";
	$qry = mysql_query ($sql, $koneksi)
		or die ("SQL Error" .mysql_error());
	$data=mysql_fetch_array($qry);
	
# Samakan dgn variabel form
$TxtKodeH  = $data['kd_penyakit'];
	$TxtPenyakit = $data['nm_penyakit'];
	$TxtPemeriksaan = $data['pemeriksaan'];
	$TxtKeterangan = $data['keterangan'];
	$TxtSolusi  = $data ['solusi'];
}
?>
<html>
<script type="text/javascript" src="./jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
	mode : "exact",
	elements : "elm2",
	theme : "advanced",
	skin : "o2k7",
	skin_variant : "silver",
	plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups",
	
	theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
	theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,|,insertdate,inserttime,preview,|,forecolor,backcolor",
	theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
	theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : true,
	
	template_external_list_url : "lists/template_list.js",
	external_link_list_url : "lists/link_list.js",
	external_image_list_url : "lists/image_list.js",
	media_external_list_url : "lists/media_list.js",
	
	template_replace_values : {
		username : "Some User",
		staffid : "991234"
	}
	});
</script>
<head>
<title> Merubah Data Penyakit </title>
</head>
<body>
<p>&nbsp;</p>
<form name="form1" method="post"
action="?page=PenyakitEditSim">
  <div align="center">
    <table width="450" border="0" cellpadding="2"
cellspacing="1" bgcolour="#DBEAF5">
      <tr>
        <td colspan="2" bgcolour="#77B6DO">
        <b>Merubah Data Penyakit</b></td>
    </tr>
      <tr bgcolour="#FFFFFF">
        <td>Kode</td>
    <td><input name="TxtKode" type"text"
maxlength="4" size="6" value="<?= $TxtKodeH; ?>"
disabled="disabled">
      <input name="TxtKodeH" type="hidden"
	value="<?= $TxtKodeH; ?>"> </td> </tr>
      <tr bgcolour="#FFFFFF">
        <td width="77">Penyakit </td>
	    <td width="361">
	      <input name="TxtPenyakit" type="text"
			maxlength="100" size="45"
			value="<?= $TxtPenyakit; ?>"></td>
		      </tr>
      <tr bgcolour="#FFFFFF">
        <td>Pemeriksaan</td>
        <td>
      <input name="TxtPemeriksaan" type="text"
	maxlength="100" size="45" 
	value="<?= $TxtPemeriksaan; ?>"></td>
      </tr>
      <tr bgcolour="#FFFFFF">
        <td>Keterangan</td>
	    <td><textarea name="TxtKeterangan" cols="40"
	rows="4"><?= $TxtKeterangan; ?></textarea> </td>
      </tr>
      <tr bgcolour="#FFFFFF">
        <td>Solusi<td><textarea name="TxtSolusi" cols="40"
	rows="4" id='elm2'><?= $TxtSolusi; ?> </textarea>
        <td>&nbsp;</td>
      </tr>
      <tr bgcolour="#FFFFFF">
        <td>&nbsp;</td>
    <td><input type="submit" name="Submit"
value="Simpan"></td>
    </tr>
    </table>
  </div>
</form>
</body></html>