<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBconnecting
 *
 * @author Grzegorz
 */
//include_once 'DBconfig.php';
class DBconnecting {

    //put your code here
    private $mysqli;

    public function __construct($server, $user, $pass, $baza) {
        $this->mysqli = new mysqli($server, $user, $pass, $baza);
        if ($this->mysqli->connect_errno) {
            printf("Nie udało sie połączenie z serwerem: %s\n", $mysqli->connect_error);
            exit();
        }
        /* zmien kodowanie na utf8 */
        if ($this->mysqli->set_charset("utf8")) {
            //udało sie zmienić kodowanie
        }
    }

    function __destruct() {
        $this->mysqli->close();
    }

    public function select($zapytanie) {
        if ($wynik_zapytania = $this->mysqli->query($zapytanie)) {
            //  $wynik_zapytania_array_assoc = $wynik_zapytania->fetch_assoc();                  
            // $wynik_zapytania->num_rows;
            return $wynik_zapytania;
        }
    }

    public function selectDB_ilosc_odwiedzen($sql) {
        if ($result = $this->mysqli->query($sql)) {

            $tabli_asocja = $result->fetch_assoc();
            return $wynik = $tabli_asocja['Ilosc_Wizyt'];
        } else {
            return FALSE;
        }
    }

    public function insert($sql) {

        if ($result = $this->mysqli->query($sql)) {

            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function delete($sql) {
        if ($result = $this->mysqli->query($sql)) {

            return TRUE;
        } else {
            return FALSE;
        }
    }

}
