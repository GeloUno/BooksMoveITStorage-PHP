<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


session_start();
include_once 'lib/DBconnecting.php';
include_once 'lib/DBconfig.php';
print_r($_POST);
echo '<br>';
//Array ( [miasto] => Lublin [kod_pocztowy] => 24000 [ulica] => Lubelsk [numer_domu] => 11 [numer_mieszkania] => [nip] => [zapisz] => )
$mysqli_zapytanie = new DBconnecting(DB_server, DB_user, DB_pass, DB_baza);
$mysqli_zapytanie->delete('DELETE FROM adres WHERE adres.id_users = "'.$_SESSION['id'].'";');
  
header("Location:moje.php");