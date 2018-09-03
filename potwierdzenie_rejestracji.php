<!DOCTYPE html>
<?php
session_start();
include_once'lib/DBconfig.php';
include_once'lib/DBconnecting.php';
include_once'lib/User_veryfication.php';
include_once 'logowanie_sprawdz.php';
?>
<html>
    <head>
        <?php
        include_once 'header.php';
        ?>
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
                        <br/><br/>
                        <?php
                        if((isset($_SESSION['login']))&&((isset($_SESSION['pass'])))&&(isset($_SESSION['email'])))
                        {
                        $user = new User_veryfication($_SESSION['login'], $_SESSION['pass'], $_SESSION['pass'], $_SESSION['email']);
                        $url = $user->potwierdzenie_rejestracji($_SESSION['login']);
                       } else {
                           header("Location:index.php");    
                        }
                        ?>

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
            </div> </main>
    </body>

</html>
