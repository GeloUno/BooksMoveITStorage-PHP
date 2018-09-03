<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SesionAdminVeryfication
 *
 * @author Grzegorz
 */
include_once'DBconfig.php';
include_once'DBconnecting.php';

class SesionAdminVeryfication {

    private $sesion;
   // private $admin;

    public function __construct($sesionID) {
        $this->sesion = $sesionID;
        ;
    }
        function sesionLogeed() {
            $mysqli_zapytanie = new DBconnecting(DB_server, DB_user, DB_pass, DB_baza);
            $wynik = $mysqli_zapytanie->select('SELECT * FROM logged_users ls WHERE ls.id_Sesion ="' . $this->sesion . '";');
            $wynik_rows = $wynik->num_rows;
            if ($wynik_rows > 0) {
                return TRUE;
            } else {
                return FALSE;
            }            
        }
         function adminLogeed() {
             $mysqli_zapytanie = new DBconnecting(DB_server, DB_user, DB_pass, DB_baza);
            $wynik1 = $mysqli_zapytanie->select('SELECT * FROM logged_users ls WHERE ls.id_Sesion ="' . $this->sesion . '";');
            $wynik_rows1 = $wynik1->num_rows;
            if ($wynik_rows1 > 0) {
                  $wynik_asoc1 = $wynik1->fetch_assoc();
               $wynik2 = $mysqli_zapytanie->select('SELECT * FROM users WHERE users.Login="' . $wynik_asoc1['id_users'] . '"');
                 if($wynik2['Admin']==1)
                 {
                     return TRUE;
                 }
            } else {
                return FALSE;
            }
             
         }

    }

    //put your code here

