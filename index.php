<?php
//error_reporting(0);
include './librari/inc.koneksidb.php';
session_start();
?>
<html>
    <head>
        <link rel="shortcut icon" href="favicon.gif" type="image/x-icon" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>SISTEM PAKAR GANGGUAN MENTAL</title>
        <!-- Start css3menu.com HEAD section -->
        <link rel="stylesheet" href="CSS3 MenuPAKARver1_files/css3menu100/style.css" type="text/css" /><style type="text/css">._css3m{display:none}</style>
        <!-- End css3menu.com HEAD section -->
        <script src="pakar/jquery-3.3.1.min.js"></script>
    </head>
    <body>
    <center>
        <hr/>
        <table width="1153" height="827" border="1" cellpadding="2" bordercolor="#666666">
            <tr>
                <th height="161" colspan="2" scope="col">
                    <div align="left">
                        <img src="img/banner.gif" width="1141" height="250">
                    </div>
                </th>
            </tr>
            <tr>
                <td width="245" height="565" valign="top">
                    <ul id="css3menu100" class="topmenu">
                        <li class="topfirst">
                            <a href="?page=home" style="width:223px;height:48px;line-height:48px;">
                                <img src="CSS3 MenuPAKARver1_files/css3menu100/home3.png" alt=""/>
                                HALAMAN UTAMA
                            </a>
                        </li>
                        <li class="topmenu">
                            <a href="#" style="width:223px;height:48px;line-height:48px;">
                                <span>
                                    <img src="CSS3 MenuPAKARver1_files/css3menu100/service.png" alt=""/>MENU USER</span>
                            </a>
                            <ul>
                                <li class="subfirst">
                                    <a href="?page=daftar">
                                        <img src="CSS3 MenuPAKARver1_files/css3menu100/favour2.png" alt=""/>KONSULTASI
                                    </a>
                                </li>
                                <li>
                                    <a href="?page=dafsakit">
                                        <img src="CSS3 MenuPAKARver1_files/css3menu100/favour3.png" alt=""/>JENIS PENYAKIT
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="topmenu">
                            <a href="#" style="width:223px;height:49px;line-height:49px;">
                                <span>
                                    <img src="CSS3 MenuPAKARver1_files/css3menu100/service1.png" alt=""/>MENU PAKAR
                                </span>
                            </a>
                            <ul>
                                <li class="subfirst">
                                    <a href="pakar/login.php" target="_blank">
                                        <img src="CSS3 MenuPAKARver1_files/css3menu100/256base-buy.png" alt=""/>LOGIN PAKAR
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="toplast">
                            <a href="#" style="width:223px;height:48px;line-height:48px;"><span><img src="CSS3 MenuPAKARver1_files/css3menu100/help.png" alt=""/>BANTUAN</span></a>
                            <ul>
                                <li class="subfirst">
                                    <a href="?page=tolong">
                                        <img src="CSS3 MenuPAKARver1_files/css3menu100/help4.png" alt=""/>PENJELASAN
                                    </a>
                                </li>
                                <li>
                                    <a href="?page=tentang">
                                        <img src="CSS3 MenuPAKARver1_files/css3menu100/bfavour1.png" alt=""/>PROFIL
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <p class="_css3m">
                        <a href="http://css3menu.com/">Create A Menu In HTML  Css3Menu.com</a>
                        <!-- End css3menu.com BODY section -->
                </td>


                <td width="901" align="center" valign="top">
                    <div style="height:600px; overflow:auto">
                        <?php
                        include "inc.bukaprogram.php";
                        ?>
                    </div>
                </td>
            </tr>
        </table>
    </center>
    <p>
        <?php
        include "inc.footer.php";
        ?>
    </p>
</body>
</html>