
<!DOCTYPE html>
<?php
include_once'lib/DBconnecting.php';
include_once'lib/User_veryfication.php';
include_once'lib/DBconfig.php';
include_once 'lib/SesionAdminVeryfication.php';
session_start();
$sesionLoged = new SesionAdminVeryfication(session_id());
if ($sesionLoged->sesionLogeed()) {
    header("Location:witaj.php");
} else {
    //  header("Location:index.php");    
}
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
                    <div id="box3">
                        <br>
                        <div>
                            <h2>  Rejestracja</h2>
                        </div>
                        <form  method="POST"> <!-- action="rejestracja_sprawdz.php"-->

                            <table  class="tabeleClass">

                                <tr>
                                    <td> <label class="zaloguj_text">Login:</label></td>
                                    <td> <input type="text" class="zaloguj_input" name="login"></td>
                                </tr> 

                                <tr>
                                    <td>  <label class="zaloguj_text">podaj hasło:</label></td>
                                    <td> <input type="password" class="zaloguj_input" name="login1"></td>
                                </tr> 
                                <tr>
                                    <td> <label class="zaloguj_text">powtórz hasło:</label></td>
                                    <td> <input type="password" class="zaloguj_input" name="login2"></td>
                                </tr> 

                                <tr>
                                    <td><label class="zaloguj_text">e-mail:</label></td>
                                    <td><input type="text" class="zaloguj_input" name="email"></td>
                                </tr> 

                                <tr>
                                    <td></td><td><button  class="zaloguj_button" name="zapisz" > Zapisz &nbsp; ❯</button></td>
                                </tr> 

                            </table>
                            <table>

                            </table>
                        </form>

                        <?php
                        $url = TRUE;
                        if (isset($_REQUEST['zapisz'])) {
                            $user = new User_veryfication($_REQUEST['login'], $_REQUEST['login1'], $_REQUEST['login2'], $_REQUEST['email']);
                            $url = $user->veryfi_lengh();
                            if ($url == TRUE) {
                                //   echo 'Przekierowanie';
                                $_SESSION['login'] = $_REQUEST['login'];
                                $_SESSION['pass'] = hash("ripemd160", $_REQUEST['login1']);
                                $_SESSION['email'] = $_REQUEST['email'];
                                header('Location:rejestracja_sprawdz.php');
                            } else {
                               
                            }
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
            </div>
        </main>
    </body>

</html>


