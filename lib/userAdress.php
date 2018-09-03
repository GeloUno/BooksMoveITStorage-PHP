<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userAdress
 *
 * @author Grzegorz
 */
class userAdress {

    //put your code here
    public function __construct() {
        ;
    }

    function sprawdzCzyJestAdres() {
        $mysqli_zapytanie = new DBconnecting(DB_server, DB_user, DB_pass, DB_baza);
        $wynik = $mysqli_zapytanie->select('SELECT * FROM adres WHERE adres.id_users ="' . $_SESSION['id'] . '";');
        $wynik_rows = $wynik->num_rows;
        $wynik_assoc = $wynik->fetch_assoc();
        if ($wynik_rows > 0) {
            //  foreach ($wynik as $tab) {
            echo "<tr><td>Miasto: </td><td>" . $wynik_assoc['Miasto'] . "</td></tr>";
            echo "<tr><td>Kod Pocztowy: </td><td>" . $wynik_assoc['Kod_Pocztowy'] . "</td></tr>";
            echo "<tr><td>Ulica: </td><td>" . $wynik_assoc['Ulica'] . "</td></tr>";
            echo "<tr><td>NR Budynku: </td><td>" . $wynik_assoc['Nr_Budynku'] . "</td></tr>";
            echo "<tr><td>NR Mieszkania: </td><td>" . $wynik_assoc['Nr_Mieszkania'] . "</td></tr>";
            echo "<tr><td>NIP: </td><td>" . $wynik_assoc['Nip'] . "</td></tr>";

            $_SESSION['miasto']=$wynik_assoc['Miasto'];
            $_SESSION['kod_pocztowy']=$wynik_assoc['Kod_Pocztowy'];
            $_SESSION['ulica']=$wynik_assoc['Ulica'];
            $_SESSION['numer_domu']=$wynik_assoc['Nr_Budynku'];
            $_SESSION['numer_mieszkania']=$wynik_assoc['Nr_Mieszkania'];
            $_SESSION['nip']=$wynik_assoc['Nip'];
            ?>
            <tr><td><button type="button" class='zaloguj_button' onclick="location.href = 'dodajadres.php'"> Edytuj &nbsp; ❯</button></td>
                <td><button type="button" class='zaloguj_button' onclick="location.href = 'usunadres.php'"> Usuń &nbsp; ❯</button></td></tr>
            <?php

            //  } 
        } else {
            echo "<tr><td>Nie wprowadzono danych do korespondencji</td>";
            ?>
            <td><button type="button" class='zaloguj_button' onclick="location.href = 'dodajadres.php'"> Dodaj &nbsp; ❯</button></td></tr>
            <?php

        }
    }

}
