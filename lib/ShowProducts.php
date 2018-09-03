<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ShowProducts
 *
 * @author Grzegorz
 */
include_once'DBconfig.php';
include_once'DBconnecting.php';
include_once'ShowTab.php';

class ShowProducts {

//put your code here
    private $id_user;

    public function __construct($id) {
        $this->id_user = $id;

        ;
    }

    public function showAssoc($assoc) {
        echo '<table>';
        foreach ($assoc as $tab) {
            echo ' ';
        }
        echo '</table>';
    }

    function showAll() {
        $showProdut = new DBconnecting(DB_server, DB_user, DB_pass, DB_baza);
        $wynik = $showProdut->select('SELECT * FROM produkty');
        $wynik_rows = $wynik->num_rows;
        if ($wynik_rows > 0) {
// $wynik_asoc = $wynik->fetch_assoc();
            echo '<br><br>';
            echo '<table class="tabeleClass" >';
            echo '<tr><th>Kurs:</th><th>Opis:</th><th>Cena:</th>';
            foreach ($wynik as $wys) {
                echo '<tr> <td>' . ($wys['Nazwa']) . '</td> <td>' . ($wys['Opis']) . '</td>'
                . '<td>' . ($wys['cena']) . '</td></tr>';
            }
            echo '</table>';
        }
    }

    function showZasoby() {
        $showProdut = new DBconnecting(DB_server, DB_user, DB_pass, DB_baza);
        $wynik = $showProdut->select('SELECT p.Nazwa,p.Opis,p.id_produkt FROM zamowienie z, users u, produkty p WHERE u.id_users = z.id_users AND z.id_produkt=p.id_produkt AND u.id_users ="' . $this->id_user . '"');
        $wynik_rows = $wynik->num_rows;
        if ($wynik_rows == 0) {
            echo '<h2>Nie posiadasz jeszcze zasobów zaprasamy na zakupy</h2>';
        }
        if ($wynik_rows > 0) {
            $sh1 = new ShowTab($wynik);
            $sh1->ShowAssoc(2);
        }
    }

    function showDoKupienia() {

        $showProdut = new DBconnecting(DB_server, DB_user, DB_pass, DB_baza);
        $wynik = $showProdut->select('SELECT 
p.id_produkt,
p.Nazwa,
p.Opis,
p.cena
FROM users u INNER JOIN zamowienie z
ON u.id_users = z.id_users AND u.id_users="' . $this->id_user . '"
RIGHT JOIN produkty p
ON p.id_produkt = z.id_produkt
WHERE z.id_users IS NULL');
        $wynik_rows = $wynik->num_rows;
        if ($wynik_rows == 0) {
            echo '<h2>Posiadasz wszystkie zasoby</h2>';
        }
        if ($wynik_rows > 0) {
            $sh1 = new ShowTab($wynik);
            $sh1->ShowAssoc(1);
        }
    }

    function kupProduktKlient($id_produkt) {
        $kupProdut = new DBconnecting(DB_server, DB_user, DB_pass, DB_baza);
        $wynik = $kupProdut->insert('INSERT INTO zamowienie'
                . '(`id_zamowienie`, `id_users`, `id_produkt`, `ile_sztuk`, `Data`)'
                . 'VALUES ("null","' . $this->id_user . '","' . $id_produkt . '","1","' . date("Y-m-d H:i:s") . '")');
    }

    function usunProduktKlient($id_produkt) {
        $usunProdut = new DBconnecting(DB_server, DB_user, DB_pass, DB_baza);
        $wynik = $usunProdut->delete('
            DELETE FROM zamowienie
WHERE zamowienie.id_users="' . $this->id_user . '" 
AND zamowienie.id_produkt="' . $id_produkt . '"
');
    }

    function dodajProdukt($nazwa, $opis, $cena) {
        $dodajProdut = new DBconnecting(DB_server, DB_user, DB_pass, DB_baza);
        $wynik = $dodajProdut->insert(''
                . 'INSERT INTO '
                . 'produkty(id_produkt, Nazwa, Opis, Dostepnosc, cena) '
                . 'VALUES ("null","'
                . mysqli_real_escape_string(htmlspecialchars(trim($nazwa))) . '","'
                . mysqli_real_escape_string(htmlspecialchars(trim($opis))) . '","99","'
                . mysqli_real_escape_string(htmlspecialchars(trim($cena))) . '")');
       
    }

    function showAllProduktAdminUsun() {
        $showProdut = new DBconnecting(DB_server, DB_user, DB_pass, DB_baza);
        $wynik = $showProdut->select('SELECT * FROM produkty');
        $wynik_rows = $wynik->num_rows;
        if ($wynik_rows > 0) {
// $wynik_asoc = $wynik->fetch_assoc();
            foreach ($wynik as $wys) {
                echo '<tr> <td>' . ($wys['Nazwa']) . '</td> '
                //  .'<td>' . ($wys['cena']) . '</td> '
                . '<td><button name="usun" value="' . $wys['id_produkt'] . '" id="' . $wys['id_produkt'] . '" >Usuń</button>'
                . ' </td></tr>';
            }
        }
    }

    function usunProduktzBazy($id_produkt) {

        $showProdut = new DBconnecting(DB_server, DB_user, DB_pass, DB_baza);
        $name_produkt = $showProdut->select('SELECT produkty.Nazwa FROM produkty WHERE produkty.id_produkt="' . $id_produkt . '"');
        $wynik = $showProdut->delete('DELETE FROM zamowienie WHERE zamowienie.id_produkt="' . $id_produkt . '"');
        // $showProdut = new DBconnecting(DB_server, DB_user, DB_pass, DB_baza);
        $wynik = $showProdut->delete('DELETE FROM produkty WHERE produkty.id_produkt="' . $id_produkt . '"');
        $name_produkt1 = $name_produkt->fetch_assoc();
        return $name_produkt1['Nazwa'];
    }

}
