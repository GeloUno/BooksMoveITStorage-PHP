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
                        <br><br><br><br><br>

                        <table class="tabeleClass">

                            <tr>
                                <td>Company:</td>	 <td>GK PHP Development</td>	
                            </tr>
                            <tr>
                                <td>tel. kom:</td>	 <td>509-999-999</td>	
                            </tr>
                            <tr>
                                <td>e-mail:</td>	<td><div>mail_help@.gmail.com</div></td>
                            </tr>
                            <tr>
                                <td> adres:</td> <td>21-100 Lublin ul. Lubelska 99 </td>
                            </tr>

                        </table>

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
