<?php

include_once 'lib/User_veryfication.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//session_start();
//echo $_SESSION['login'] . "<br>";
//echo $_SESSION['pass'];
/// to może być jako includ ale tylko dla stron które są dla zalogowanych userów
if ((isset($_SESSION['login'])) && ((isset($_SESSION['pass']))))  {
        $use = new User_veryfication($_SESSION['login'], $_SESSION['pass'], 0, 0);
        if ($use->spradz_logowania()) {
            $_SESSION['logged'] = TRUE;
            
        } else {
            $_SESSION['logged'] = FALSE;
            header("Location:loging.php");
        }
    } else {
        header("Location:loging.php");
    }

    