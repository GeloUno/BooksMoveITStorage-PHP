<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once'lib/DBconfig.php';
include_once'lib/DBconnecting.php';
session_start();
// echo $_SESSION['login'] . "<br>";
// echo $_SESSION['pass'] . "<br>";
// echo $_SESSION['email'] . "<br>";
$inset_mysqli = new DBconnecting(DB_server, DB_user, DB_pass, DB_baza);
$insert_zapytanie = "INSERT INTO `users` (`id_users`, `Login`, `Pass`, `Imie`, `Nazwisko`, `Admin`, `Ilosc_Wizyt`, `email`) "
        . "VALUES (NULL, '" . $_SESSION['login'] . "','" . $_SESSION['pass'] . "', NULL, NULL,'0','0','" . $_SESSION['email'] . "');";
$inset_mysqli->insert($insert_zapytanie);

header('Location:potwierdzenie_rejestracji.php')
?>

