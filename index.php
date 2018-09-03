<!DOCTYPE html>
<?php

session_start();
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
                        <h2> Jesli chcesz zrobić stronę</h2>
                        <br/>
                       Zobacz nasze osiągnięcia w galerii
                        <br/> <br/>
                        i przyłącz się do nas  
                        <br/>  <br/>
                        Zaloguj się już teraz
                        <br/> <br/>
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
