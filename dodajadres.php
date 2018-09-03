<!DOCTYPE html>
<?php
session_start();
include_once 'logowanie_sprawdz.php';
?>
<html>
    <head>
        <link rel="stylesheet" href="css/loging.css" type="text/css"/>
        <?php
        include_once 'header.php';
        ?> 
        <script src="js/walidacja.js"></script>
    </head>
    <body onload="zegar(), load();">
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
                        <h2>Dane do wysyłki</h2>
                        <form  method="POST" action="zapiszadres.php" onsubmit="return sprawdz()" id="postform"> <!-- action="rejestracja_sprawdz.php"-->

                            <table  class="tabeleClass">

                                <tr>                                    
                                    <td> <label class="zaloguj_text"  id="miasto_error">Miasto:</label></td>
                                    <td> <input type="text" class="zaloguj_input" name="miasto" id="miasto" value="<?php
                                        if (isset($_SESSION['miasto']))
                                            echo $_SESSION['miasto'];
                                        ?>"></td>

                                </tr>
                                <tr>                                    
                                    <td> <label class="zaloguj_text"  id="kod_pocztowy_error">Kod pocztowy:</label></td>
                                    <td> <input type="number" class="zaloguj_input" name="kod_pocztowy" id="kod_pocztowy"
                                                value="<?php
                                                if (isset($_SESSION['kod_pocztowy']))
                                                    echo $_SESSION['kod_pocztowy'];
                                                ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, 5);" 
                                                ></td>
                                </tr> 

                                <tr>                                     
                                    <td>  <label class="zaloguj_text"  id="ulica_error">ulica:</label></td>
                                    <td> <input type="text" class="zaloguj_input" name="ulica" id="ulica"
                                                value="<?php
                                                if (isset($_SESSION['ulica']))
                                                    echo $_SESSION['ulica'];
                                                ?>"></td>                                    
                                </tr> 
                                <tr>                                    
                                    <td> <label class="zaloguj_text"  id="numer_domu_error">numer domu:</label></td>
                                    <td> <input type="number" class="zaloguj_input" name="numer_domu" id="numer_domu"
                                                value="<?php
                                                if (isset($_SESSION['numer_domu']))
                                                    echo $_SESSION['numer_domu'];
                                                ?>"></td>
                                    
                                </tr> 

                                <tr>                                    
                                    <td><label class="zaloguj_text"  id="numer_mieszkania_error">numer mieszkania:</label></td>
                                    <td><input type="number" class="zaloguj_input" name="numer_mieszkania" id="numer_mieszkania"
                                               value="<?php
                                               if (isset($_SESSION['numer_mieszkania']))
                                                   echo $_SESSION['numer_mieszkania'];
                                               ?>"></td>

                                </tr> 
                                <tr>
                                    <td><label class="zaloguj_text"  id="nip_error">NIP:</label></td>
                                    <td><input type="number" class="zaloguj_input" name="nip" id="nip"
                                               oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, 11);"                                               
                                               value="<?php
                                               if (isset($_SESSION['nip']))
                                                   echo $_SESSION['nip'];
                                               ?>"></td>
                                </tr> 

                                <tr>                                     
                                    <td></td>
                                    <td><button  class="zaloguj_button" type="submit" name="zapisz" > Zapisz &nbsp; ❯</button></td>

                                </tr> 

                            </table>
                            <table>

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

