
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Admin WEB
 */
session_start();
include_once 'logowanie_sprawdz.php';
include_once 'lib/SesionAdminVeryfication.php';
include_once 'lib/ShowProducts.php';
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
                <script src="js/walidacjaProdukt.js"></script>
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
                                    <h2>Admin Dodaj Produkt</h2>
                                </div>
                                <form method="POST" onsubmit="return sprawdz()" action="potwierdzProdukt.php">
                                    <table  class="tabeleClass">
                                        <tr>
                                            <td> <label class="zaloguj_text" id="nazwa_error">Nazwa:</label></td>
                                            <td> <input type="text" class="zaloguj_input" name="nazwa" id="nazwa"></td>
                                        </tr> 

                                        <tr>
                                            <td>  <label class="zaloguj_text" id="opis_error">Opis:</label></td>
                                            <td> <input type="text" class="zaloguj_input" name="opis" id="opis"></td>
                                        </tr> 
                                        <tr>
                                            <td> <label class="zaloguj_text" id="cena_error">Cena:</label></td>
                                            <td> <input type="number" step="any" class="zaloguj_input" name="cena" id="cena"></td>
                                        </tr>                                 

                                        <tr>
                                            <td></td><td><button  class="zaloguj_button" name="Dodaj"> Dodaj &nbsp; ❯</button></td>
                                        </tr> 
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
