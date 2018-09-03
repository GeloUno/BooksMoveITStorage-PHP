<!DOCTYPE html>
<?php
session_start();
include_once 'logowanie_sprawdz.php';
include_once'lib/ShowProducts.php';
include_once'lib/userAdress.php';
?>
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
                    <form method="POST">
                        <div id="box3">

                            <h2>Twoje dane: </h2>
                            <table class="tabeleClass">
                                <?php
                                echo "<tr><td>Login: </td><td>" . $_SESSION['nick'] . "</td></tr>";
                                echo "<tr><td>ilość odwiedzin: </td><td>" . $_SESSION['wyz'] . "</td></tr>";
                                echo "<tr><td>e-mail: </td><td>" . $_SESSION['email'] . "</td></tr>";
                                $ua = new userAdress();
                                $ua->sprawdzCzyJestAdres();
                                ?>
                            </table>

                        </div>
                    </form>
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
