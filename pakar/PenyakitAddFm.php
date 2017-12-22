<?php
include "inc.session.php"; 
include "../librari/inc.koneksidb.php";
include "../librari/inc.kodeauto.php";
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
<title>Masukan Data Penyakitjgjh</title>
</head>
<body>
<form name="form1" method="post" action="?page=PenyakitAddSim">
  <div align="center">
    <p>&nbsp;</p>
    <table width="450" border="0" cellpadding="2" cellspacing="1" bgcolor="#DBEAF5">
      <tr> 
        <td colspan="2" bgcolor="#FF9900"><b>MASUKAN DATA PENYAKIT </b></td>
    </tr>
      <tr bgcolor="#FFFFFF"> 
        <td>Kode</td>
      <td><input name="TxtKode" type="text"  maxlength="4" size="6" value="<?php echo kdauto("penyakit","P"); ?>" disabled="disabled">
        <input name="TxtKodeH" type="hidden" value="<?php echo kdauto("penyakit","P"); ?>"></td>
    </tr>
      <tr bgcolor="#FFFFFF"> 
        <td width="77">Penyakit</td>
        <td width="361"><input name="TxtPenyakit" type="text" value="<?= $TxtPenyakit; ?>" size="45" maxlength="100"></td>
    </tr>
      <tr bgcolor="#FFFFFF">
        <td>Pemeriksaan</td>
        <td><input name="TxtPemeriksaan" type="text" value="<?= $TxtPemeriksaan; ?>" size="45" maxlength="100"></td>
    </tr>
      <tr bgcolor="#FFFFFF">
        <td>Keterangan</td>
        <td><textarea name="TxtKeterangan" cols="40" rows="4"><?= $TxtKeterangan; ?></textarea></td>
    </tr>
      <tr bgcolor="#FFFFFF">
        <td>Solusi</td>
      <td><textarea name="TxtSolusi" cols="40" rows="4" id='elm2'><?= $TxtSolusi; ?></textarea></td>
    </tr>
      <tr bgcolor="#FFFFFF"> 
        <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Simpan" " onClick="return confirm('Apakah Anda Yakin Tambah Data Penyakit?') "target="_self"></td>
    </tr>
    </table>
  </div>
</form>
</body>
</html>