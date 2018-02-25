<?php
//error_reporting(0);
?>
<html>
    <head>
    </head>
    <link rel="shortcut icon" href="favicon.gif" type="image/x-icon" />
    <body>
    <center>
        <table width="1200" height="300" border="1" cellpadding="2" bordercolor="#CCCCCC">
            <tr>
                <th height="161" colspan="2" scope="col"><div align="left">
                        <img src="images/banner.gif" width="1200" height="250">
                    </div>
                </th>
            </tr>
            <tr>    
                <td>
                    <div>
                        <?php
                        include "menu.php";
                        ?>
                    </div>
                </td>
            </tr>

            <tr>    
                <td width="1200" height="254" align="left" valign="center">
                    <div style="height:600px; overflow:auto">
                        <?php
                        include "inc.bukaprogram.php";
                        ?>
                    </div>
                </td>
            </tr>
        </table>
    </center>
</body>
</html>