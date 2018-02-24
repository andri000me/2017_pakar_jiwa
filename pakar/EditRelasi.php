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
                        <b> FORM EDIT RELASI GEJALA DAN PENYAKIT </b>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table style="width: 100%;" id="table-relasi">
                            <thead>
                                <tr>
                                    <th style="display: none;">Id Relasi</th>
                                    <th>Penyakit</th>
                                    <th style="width: 20%;">Gejala1</th>
                                    <th style="width: 20%;">Gejala2</th>
                                    <th style="width: 20%;">Gejala3</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT r.id_relasi, 
                                        r.kd_penyakit, p.nm_penyakit, 
                                        r.kd_gejala1, g.nm_gejala as gejala1, 
                                        r.kd_gejala2, g1.nm_gejala as gejala2, 
                                        r.kd_gejala3, g2.nm_gejala as gejala3
                                        FROM relasi r
                                        LEFT JOIN penyakit p ON p.kd_penyakit = r.kd_penyakit
                                        LEFT JOIN gejala g ON g.kd_gejala = r.kd_gejala1
                                        LEFT JOIN gejala g1 ON g1.kd_gejala = r.kd_gejala2
                                        LEFT JOIN gejala g2 ON g2.kd_gejala = r.kd_gejala3 
                                        order by p.nm_penyakit asc, g.nm_gejala asc, g1.nm_gejala asc, g2.nm_gejala asc";
                                $query = mysql_query($sql, $koneksi);
                                while ($row = mysql_fetch_array($query)) {
                                    ?>
                                    <tr id="rowtarget<?php echo $row['id_relasi']; ?>">
                                        <td class="text-center" style="display: none;"><?php echo $row['id_relasi']; ?></td>
                                        <td class="text-center">
                                            <select id="penyakit_<?php echo $row['id_relasi']; ?>">
                                                <?php
                                                $sqlP = "select kd_penyakit, nm_penyakit from penyakit order by nm_penyakit asc";
                                                $queryP = mysql_query($sqlP, $koneksi);
                                                while ($row1 = mysql_fetch_array($queryP)) {
                                                    if ($row['kd_penyakit'] == $row1['kd_penyakit']) {
                                                        echo "<option value='$row1[kd_penyakit]' selected>$row1[nm_penyakit]</option>";
                                                    } else {
                                                        echo "<option value='$row1[kd_penyakit]'>$row1[nm_penyakit]</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <select id="gejala1_<?php echo $row['id_relasi']; ?>" style="width: 50%;">
                                                <?php
                                                $sqlG = "select kd_gejala, nm_gejala from gejala order by nm_gejala asc";
                                                $queryG = mysql_query($sqlG, $koneksi);
                                                while ($row2 = mysql_fetch_array($queryG)) {
                                                    if ($row['kd_gejala1'] == $row2['kd_gejala']) {
                                                        echo "<option value='$row2[kd_gejala]' selected>$row2[nm_gejala]</option>";
                                                    } else {
                                                        echo "<option value='$row2[kd_gejala]'>$row2[nm_gejala]</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <select id="gejala2_<?php echo $row['id_relasi']; ?>" style="width: 50%;">
                                                <option value="">-</option>
                                                <?php
                                                $sqlG = "select kd_gejala, nm_gejala from gejala order by nm_gejala asc";
                                                $queryG = mysql_query($sqlG, $koneksi);
                                                while ($row2 = mysql_fetch_array($queryG)) {
                                                    if ($row['kd_gejala2'] == $row2['kd_gejala']) {
                                                        echo "<option value='$row2[kd_gejala]' selected>$row2[nm_gejala]</option>";
                                                    } else {
                                                        echo "<option value='$row2[kd_gejala]'>$row2[nm_gejala]</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <select id="gejala3_<?php echo $row['id_relasi']; ?>" style="width: 50%;">
                                                <option value="">-</option>
                                                <?php
                                                $sqlG = "select kd_gejala, nm_gejala from gejala order by nm_gejala asc";
                                                $queryG = mysql_query($sqlG, $koneksi);
                                                while ($row2 = mysql_fetch_array($queryG)) {
                                                    if ($row['kd_gejala3'] == $row2['kd_gejala']) {
                                                        echo "<option value='$row2[kd_gejala]' selected>$row2[nm_gejala]</option>";
                                                    } else {
                                                        echo "<option value='$row2[kd_gejala]'>$row2[nm_gejala]</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" onclick="simpan('<?php echo $row['id_relasi']; ?>')">Update</button> 
                                            | 
                                            <button type="button" onclick="hapus('<?php echo $row['id_relasi']; ?>')">Hapus</button>
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
                                                    "sorting": false
                                                });

                                                function hapus(param) {
                                                    var cf = confirm("apa anda yakin menghapus relasi?");
                                                    if (cf == true) {
                                                        $.ajax({
                                                            type: 'POST',
                                                            url: "BackEnd.php",
                                                            data: {action: "deleteRelasi", id: param},
                                                            dataType: 'text',
                                                            beforeSend: function (xhr) {

                                                            },
                                                            success: function (response, textStatus, jqXHR) {
                                                                if (response == 1) {
                                                                    var table_targetrem = $('#table-relasi').DataTable();
                                                                    table_targetrem.row('#rowtarget' + param).remove().draw(false);
                                                                } else if (response == 0) {
                                                                    alert("gagal delete baris");
                                                                }
                                                            },
                                                            complete: function (jqXHR, textStatus) {

                                                            }
                                                        });

                                                    }
                                                }

                                                function simpan(param) {
                                                    var id = param;
                                                    var penyakit = $('#penyakit_' + param).val();
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
                                                                id: id,
                                                                penyakit: penyakit,
                                                                gejala1: gejala1,
                                                                gejala2: gejala2,
                                                                gejala3: gejala3,
                                                                action: "updateRelasi"
                                                            };
                                                            $.ajax({
                                                                type: 'POST',
                                                                url: "BackEnd.php",
                                                                data: request,
                                                                dataType: 'text',
                                                                beforeSend: function (xhr) {

                                                                },
                                                                success: function (response, textStatus, jqXHR) {
                                                                    if (response == 1) {
                                                                        alert("berhasil update relasi baru");
                                                                    } else if (response == 0) {
                                                                        alert("gagal update relasi baru");
                                                                    } else if (response == 99) {
                                                                        alert("data sudah ada. tolong pilih relasi lain")
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
