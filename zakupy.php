<!DOCTYPE html>
<?php
session_start();
include_once 'logowanie_sprawdz.php';
include_once 'lib/ShowProducts.php';
?>
<html>
    <head>
        <?php
        include_once 'header.php';
        ?> </head>
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

                        <h2>Produkty do zakupienia: </h2>
                        <?php
                            $sh1 = new ShowProducts($_SESSION['id']);
                            $sh1->showDoKupienia();
                            ?>
                    </div>

                </div>
                <div style="clear: both"></div>
                <footer>
                    <div class="footerClass"><h5>G K Dev.&copy;&nbsp;;ilosć odwiedzeń:
                            <?php
                            include_once 'futter.php';
                            ?>
                        </h5>
                    </div>
                </footer>
            </div>
        </main>
    </body>

</html>
