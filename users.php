<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 *
 */
session_start();
include_once 'logowanie_sprawdz.php';
include_once 'lib/SesionAdminVeryfication.php';
$sesionLoged = new SesionAdminVeryfication(session_id());
if ($sesionLoged->sesionLogeed()) {
    
} else {
    header("Location:logout.php");
}

if ((isset($_SESSION['logged'])) && (isset($_SESSION['admin']))) {
    if (($_SESSION['logged'] == TRUE) && ($_SESSION['admin'] == 1)) {       
        ?>
        <!DOCTYPE html>
        <html>
            <head>
        <?php
        include_once 'header.php';
        ?>    
                <link rel="stylesheet" href="css/loging.css" type="text/css"/>
            </head>
            <body onload="zegar();">
                <main>            
                    <div id="contener">

                        <div id="nav1">
                            <div id="name1">
                                <a href="index.php" > <h5 class="powrot">GK Dev.</h5></a>
                            </div>
                            <div id="clock">
                                <h5 id="clock1">00:00.00</h5>                       
                            </div>
                        </div>
                        <div style="clear: both"></div>
                        <div id="nav2">

                            <div id="box1"> 
        <?php
        include_once 'buttons.php';
        ?>
                            </div>
                            <div id="box3">
                                <br><div>
                                    <h2>Użytkownicy</h2>
                                </div>
                                <form method="POST" >
                                    <table  class="tabeleClass">
                                       
                                    </table>
                                </form>       
                            </div>
                        </div>
                        <div style="clear: both"></div>



                        <footer>

                            <div class="footerClass"><h5>G K Dev.&copy;&nbsp;;ilosć odwiedzeń:
        <?php
        include_once 'futter.php';
        ?>             

                                </h5></div>
                        </footer>
                    </div>
                </main>
            </body>

        </html>
        <?php
    } else {
        header("Location:logout.php");
    }
} else {
    header("Location:logout.php");
}
?>
