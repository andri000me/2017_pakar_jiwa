<?php
include "inc.session.php";
include "../librari/inc.koneksidb.php";
$kdsakit = $_REQUEST['kdsakit'];
?>
<html>
    <head>
        <title>Halaman Buat Relasi Gejala Penyakit</title>
        <link rel="stylesheet" href="jquery.dataTables.min.css">
        <style>
            .text-center{
                text-align: center;
            }
            .text-center.lebar-kolom{
                width: 20%;
            }
        </style>
    </head>
    <body>
    <center>
        <p>&nbsp;</p>
        <form name="form1" method="post" action="?page=RelasiAddSim">
            <table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
                <tr bgcolor="#CCCCCC"> 
                    <td height="48" colspan="2" align="center" bgcolor="#FF9900">
                        <b> RELASI GEJALA DAN PENYAKIT </b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <select name="CmbPenyakit" id="CmbPenyakit">
                            <?php
                            $sqlp = "SELECT * FROM penyakit ORDER BY kd_penyakit";
                            $qryp = mysql_query($sqlp, $koneksi)
                                    or die("SQL Error: " . mysql_error());
                            while ($datap = mysql_fetch_array($qryp)) {
                                if ($datap['kd_penyakit'] == $kdsakit) {
                                    $cek = "selected";
                                } else {
                                    $cek = "";
                                }
                                echo "<option value='$datap[kd_penyakit]' $cek>
			  $datap[nm_penyakit]</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td bgcolor="#CCCCCC">
                        <button type="button" onclick="tambahRelasi();"><b>+</b> Tambahkan <b>+</b></button>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" bgcolor="#FFFFFF">

                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table style="width: 100%;" id="table-relasi">
                            <thead>
                                <tr>
                                    <th>Penyakit</th>
                                    <th>Gejala1</th>
                                    <th>Gejala2</th>
                                    <th>Gejala3</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT r.id_relasi, r.kd_penyakit, p.nm_penyakit, 
                                        r.kd_gejala1, g.nm_gejala as gejala1, r.kd_gejala2, g1.nm_gejala as gejala2, r.kd_gejala3, g2.nm_gejala as gejala3
                                        FROM relasi r
                                        LEFT JOIN penyakit p ON p.kd_penyakit = r.kd_penyakit
                                        LEFT JOIN gejala g ON g.kd_gejala = r.kd_gejala1
                                        LEFT JOIN gejala g1 ON g1.kd_gejala = r.kd_gejala2
                                        LEFT JOIN gejala g2 ON g2.kd_gejala = r.kd_gejala3 
                                        order by p.nm_penyakit asc, g.nm_gejala asc, g1.nm_gejala asc, g2.nm_gejala asc";
                                $query = mysql_query($sql, $koneksi);
                                while ($row = mysql_fetch_array($query)) {
                                    ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo $row['nm_penyakit'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $row['gejala1'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $row['gejala2'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $row['gejala3'] ?>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" disabled="">Simpan</button> | <button type="button" disabled="">Hapus</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
        </form>
    </center>
    <script src="jquery-3.3.1.min.js"></script>
    <script src="jquery.dataTables.min.js"></script>
    <script>
                            var counter = 1;
                            var table = $('#table-relasi').dataTable({
                                "paging": false,
                                "searching": false,
                                "info": false,
//                                "sorting": false
                            });
                            function tambahRelasi() {
                                var penyakit = $('#CmbPenyakit').val();
                                var textPenyakit = $("#CmbPenyakit option:selected").text();
                                if (penyakit !== "") {
                                    counter++;
                                    $.ajax({
                                        type: 'GET',
                                        url: "BackEnd.php",
                                        dataType: 'JSON',
                                        data: {action: "getGejala"},
                                        beforeSend: function (xhr) {

                                        },
                                        success: function (response, textStatus, jqXHR) {
                                            var option = "<option value=''>-</option>";
                                            $.each(response, function (key, value) {
                                                option += "<option value='" + value.kd_gejala + "'>" + value.nm_gejala + "</option>";
                                            });
                                            var select1 = "<select style='width:50%' id=gejala1_" + counter + ">" + option + "</select>";
                                            var select2 = "<select style='width:50%' id=gejala2_" + counter + ">" + option + "</select>";
                                            var select3 = "<select style='width:50%' id=gejala3_" + counter + ">" + option + "</select>";
                                            var newTargetRow = table.fnAddData([
                                                textPenyakit + "<input id='penyakit" + counter + "' type='hidden' value='" + penyakit + "'>",
                                                select1,
                                                select2,
                                                select3,
                                                "<button type='button' onclick=simpan('" + counter + "') id=simpan" + counter + ">Simpan</button> \n\
                                                | <button type='button' onclick=hapus('" + counter + "') id=hapus" + counter + ">Hapus</button>"
                                            ]);
                                            var oSettings = table.fnSettings();
                                            var nTr = oSettings.aoData[ newTargetRow[0] ].nTr;
                                            //menambahkan id
                                            var row = 'rowtarget' + counter;
                                            nTr.setAttribute('id', row);
                                            $('td', nTr)[0].setAttribute('class', 'text-center');
                                            $('td', nTr)[1].setAttribute('class', 'text-center lebar-kolom');
                                            $('td', nTr)[2].setAttribute('class', 'text-center lebar-kolom');
                                            $('td', nTr)[3].setAttribute('class', 'text-center lebar-kolom');
                                            $('td', nTr)[4].setAttribute('class', 'text-center');

                                        },
                                        complete: function (jqXHR, textStatus) {

                                        }
                                    });
                                }
                            }

                            function hapus(param) {
                                var table_targetrem = $('#table-relasi').DataTable();
                                table_targetrem.row('#rowtarget' + param).remove().draw(false);
                            }

                            function simpan(param) {
                                var penyakit = $('#penyakit' + param).val();
                                var gejala1 = $('#gejala1_' + param).val();
                                var gejala2 = $('#gejala2_' + param).val();
                                var gejala3 = $('#gejala3_' + param).val();
                                if (gejala1 == "") {
                                    alert("gejala 1 tidak boleh kosong");
                                } else if (gejala1 == gejala2) {
                                    alert("gejala 1 tidak boleh sama dengan gejala 2")
                                } else if (gejala2 != "" && gejala3 != "" && gejala2 == gejala3) {
                                    alert("gejala 2 tidak boleh sama dengan gejala 3")
                                } else if (gejala1 == gejala3) {
                                    alert("gejala 1 tidak boleh sama dengan gejala 3");
                                } else if (gejala2 == "" && gejala3 != "") {
                                    alert("gejala 2 tidak boleh kosong");
                                } else {
                                    var cf = confirm("apa anda yakin memasukkan data baru?");
                                    if (cf) {
                                        //untuk pengecekan
                                        var request = {
                                            penyakit: penyakit,
                                            gejala1: gejala1,
                                            gejala2: gejala2,
                                            gejala3: gejala3,
                                            action: "cekDuplikat"
                                        };
                                        $.ajax({
                                            type: 'GET',
                                            url: "BackEnd.php",
                                            data: request,
                                            dataType: 'text',
                                            beforeSend: function (xhr) {

                                            },
                                            success: function (response, textStatus, jqXHR) {
                                                if (response == 1) {
                                                    alert("berhasil insert relasi baru");
                                                    $('#simpan' + param).attr("disabled", "");
                                                    $('#hapus' + param).attr("disabled", "");
                                                    $('#penyakit' + param).attr("disabled", "");
                                                    $('#gejala1_' + param).attr("disabled", "");
                                                    $('#gejala2_' + param).attr("disabled", "");
                                                    $('#gejala3_' + param).attr("disabled", "");
                                                } else if (response == 0) {
                                                    alert("gagal insert relasi baru");
                                                } else if (response == 99) {
                                                    alert("data sudah ada. tolong pilih relasi lain")
                                                } else {
                                                    alert(response);
                                                }
                                            },
                                            complete: function (jqXHR, textStatus) {

                                            }
                                        });
                                    }
                                }
                            }
    </script>
</body>
</html>
