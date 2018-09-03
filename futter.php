<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once'lib/DBconfig.php';
include_once'lib/DBconnecting.php';
include_once'lib/User_veryfication.php';


if (isset($_SESSION['id'])) {
    $ob = new DBconnecting(DB_server, DB_user,DB_pass,DB_baza);
    $wynik = $ob->selectDB_ilosc_odwiedzen("SELECT * FROM `statystyki`");
    echo $wynik;
} else {
    $ob = new DBconnecting(DB_server, DB_user,DB_pass,DB_baza);
    $wynik = $ob->selectDB_ilosc_odwiedzen("SELECT * FROM `statystyki`");
    $wynik = $wynik + 1;
    $ob->insert('UPDATE statystyki SET Ilosc_Wizyt = ' . ($wynik) . ' WHERE statystyki.Strona = "index";');
    echo $wynik;
    $_SESSION['id'] = session_id();
};
?>         