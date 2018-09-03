
<?php
session_start();
include_once 'lib/SesionAdminVeryfication.php';
$sesionLoged = new SesionAdminVeryfication(session_id());
if ($sesionLoged->sesionLogeed()) {
    header("Location:witaj.php");
} else {
    //  header("Location:index.php");    
}
?>
<!DOCTYPE html>
<html>
    <head>
<?php
include_once 'header.php';
?>         
        <script src="js/walidacja_login.js"></script>
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
                            <h2>Logowanie</h2>
                        </div>
                        <form method="POST" >
                            <table  class="tabeleClass">
                                <tr>
                                    <td> <label class="zaloguj_text" id="login_error">Login:</label></td>
                                    <td> <input type="text" class="zaloguj_input" name="login" id="login"></td>
                                </tr> 
                                <tr>
                                    <td>  <label class="zaloguj_text" id="pass_error">Hasło:</label></td>
                                    <td> <input type="password" class="zaloguj_input" name="pass" id="pass"></td>
                                </tr> 
                                <tr>
                                    <td></td>  <td><button type="submit" class="zaloguj_button" name="login_b" id="button_zaloguj" onclick="sprawdz()"> Zaloguj &nbsp; ❯</button></td>
                                </tr> 
                                <tr>
                                    <td></td>
                                    <td><button type="button" class="zaloguj_button" onclick="location.href = 'rejestracja.php'"> Rejestracja &nbsp; ❯</button></td>
                                </tr> 
                            </table>
                        </form>

<?php
if (isset($_SESSION['error_login'])) {
    echo "<h4 style='color:red;'> Błedzny login lub hasło !!!</h4><br>";
    //  echo $_SESSION['mes'];
    session_unset();
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

<?php
$url = TRUE;
if (isset($_REQUEST['login_b'])) {
    $walid = "/^[a-zA-Z0-9ąĄęĘóÓłŁżŻźŹńŃ\s]{4,20}$/";
    if (preg_match($walid, $_REQUEST['login']) && (preg_match($walid, $_REQUEST['pass']))) {
        $_SESSION['login'] = $_REQUEST['login'];
        $_SESSION['pass'] = hash("ripemd160", $_REQUEST['pass']);
        header('Location:witaj.php');
    } else {
        $_SESSION['error_login'] = FALSE;
    }
}
?>