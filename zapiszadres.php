<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once 'lib/DBconnecting.php';
include_once 'lib/DBconfig.php';

if((isset($_POST['ulica']))&&($_POST['miasto']))
{
$mysqli_zapytanie = new DBconnecting(DB_server, DB_user, DB_pass, DB_baza);
$wynik = $mysqli_zapytanie->select('SELECT * FROM adres WHERE adres.id_users="'.$_SESSION['id'].'"');
echo 'SELECT adres WHERE adres.id_users="'.$_SESSION['id'].'"';
 $wynik_row = $wynik->num_rows;
echo $wynik_row;
if($wynik_row==0)
{  
    
$mysqli_zapytanie->insert('INSERT INTO `adres`(`id_adres`, `Nazwa_Firmy`, `Nip`, `Miasto`, `Ulica`, `Kod_Pocztowy`, `Nr_Budynku`, `Nr_Mieszkania`, `id_users`)'
    . 'VALUES (NULL,"'.NULL.'","'
        .(htmlspecialchars(trim($_POST['nip']))).'","'
        .(htmlspecialchars(trim($_POST['miasto']))).'","'
        .(htmlspecialchars(trim($_POST['ulica']))).'","'
        .(htmlspecialchars(trim($_POST['kod_pocztowy']))).'","'
        .(htmlspecialchars(trim($_POST['numer_domu']))).'","'
        .(htmlspecialchars(trim($_POST['numer_mieszkania']))).'","'
        .$_SESSION['id'].'")');

header("Location:moje.php");
}
 else {
    $mysqli_zapytanie->insert('UPDATE adres SET 
            Nip="'.(htmlspecialchars(trim($_POST['nip']))).'",
            Miasto="'.(htmlspecialchars(trim($_POST['miasto']))).'",
            Ulica="'.(htmlspecialchars(trim($_POST['ulica']))).'",
            Kod_Pocztowy="'.(htmlspecialchars(trim($_POST['kod_pocztowy']))).'",
            Nr_Budynku="'.(htmlspecialchars(trim($_POST['numer_domu']))).'",
            Nr_Mieszkania="'.(trim($_POST['numer_mieszkania'])).'" 
            WHERE adres.id_users="'.$_SESSION['id'].'"');
    
    header("Location:moje.php");
     
}
} else {
     header("Location:dodajadres.php");
}
