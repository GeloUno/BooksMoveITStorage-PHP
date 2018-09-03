<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
if (isset($_SESSION['logged'])) {
     if (($_SESSION['logged'] == TRUE)&& ($_SESSION['admin']==1)) {
        //Zalogowany poprwanie
        echo '<div class="buttonBox2"><a href="logout.php"><h5>Wyloguj</h5></a></div>';
        echo '<div class="buttonBox1"><a href="moje.php"><h5>Moje</h5></a></div>';
        echo '<div class="buttonBox3"><a href="produktyadmin.php"><h5>Dodaj</h5></a></div>';
        echo '<div class="buttonBox4"><a href="usun.php"><h5>Usuń</h5></a></div>';
        echo '<div class="buttonBox1"><a href="zasoby.php"><h5>Zasoby</h5></a></div>';
        echo '<div class="buttonBox2"><a href="zakupy.php"><h5>Zakupy</h5></a></div>';
    }
    if (($_SESSION['logged'] == TRUE)&& ($_SESSION['admin']==0)) {
        //Zalogowany poprwanie
        echo '<div class="buttonBox2"><a href="logout.php"><h5>Wyloguj</h5></a></div>';
        echo '<div class="buttonBox1"><a href="moje.php"><h5>Moje</h5></a></div>';
        echo '<div class="buttonBox3"><a href="zasoby.php"><h5>Zasoby</h5></a></div>';
        echo '<div class="buttonBox4"><a href="zakupy.php"><h5>Zakupy</h5></a></div>';
        echo'<div class="buttonBox5">"Wszystko jest możliwe ... tylko ten czas"</div> ';
    }
    if ($_SESSION['logged'] == FALSE) {
        //logowanie nie poprawne
        echo '<div class="buttonBox2"><a href="loging.php"><h5>Zaloguj</h5></a></div>';
        echo '<div class="buttonBox1"><a href="produkty.php"><h5>Produkty</h5></a></div>';
        echo '<div class="buttonBox3"><a href="zdjecia.php"><h5>Zdjęcia</h5></a></div>';
        echo '<div class="buttonBox4"><a href="kontakt.php"><h5>Kontakt</h5></a></div>';
        echo'<div class="buttonBox5">"Wszystko jest możliwe ... tylko ten czas"</div> ';
    }
} else {
    //bez logowania
    echo '<div class="buttonBox2"><a href="loging.php"><h5>Zaloguj</h5></a></div>';
    echo '<div class="buttonBox1"><a href="produkty.php"><h5>Produkty</h5></a></div>';
    echo ' <div class="buttonBox3"><a href="zdjecia.php"><h5>Zdjęcia</h5></a></div>';
    echo '<div class="buttonBox4"><a href="kontakt.php"><h5>Kontakt</h5></a></div>';
    echo'<div class="buttonBox5">"Wszystko jest możliwe ... tylko ten czas"</div> ';
}
?>
<?php
?>  
                  
