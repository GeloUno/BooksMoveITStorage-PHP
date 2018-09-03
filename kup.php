<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include_once 'logowanie_sprawdz.php';
include_once 'lib/ShowProducts.php';
//print_r($_POST);
//echo "<br> ".key($_POST)."";
//echo "<br> ".($_POST[key($_POST)])."";
if(((key($_POST))=="kup")||(((key($_POST))=="usun")))
{
if (key($_POST)=="kup")
{
   // echo "KUP";
  //  echo "<br> ".($_POST[key($_POST)])."";
    $kup = new ShowProducts($_SESSION['id']);
    $kup->kupProduktKlient($_POST[key($_POST)]);
    header("Location:zakupy.php");
}
if(key($_POST)=="usun")
{
     $kup = new ShowProducts($_SESSION['id']);
    $kup->usunProduktKlient($_POST[key($_POST)]);
    header("Location:zasoby.php");
     
}
} else {
    header("Location:zakupy.php");
}
