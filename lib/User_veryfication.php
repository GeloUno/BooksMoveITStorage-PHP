<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_veryfication
 *
 * @author Grzegorz
 */
include_once'DBconfig.php';
include_once'DBconnecting.php';

class User_veryfication {

    private $login;
    private $pass1;
    private $pass2;
    private $email;
    private $valida = "/^[a-zA-Z0-9ąĄęĘóÓłŁśŚżŻźŹńŃ\s]{4,20}$/";

    public function __construct($Login, $Pass1, $Pass2, $Email) {
        $this->login = htmlspecialchars(trim($Login));
        $this->pass1 = htmlspecialchars(trim($Pass1));
        $this->pass2 = htmlspecialchars(trim($Pass2));
        $this->email = htmlspecialchars(trim($Email));
    }

    function show() {
        echo $this->login . " " . $this->pass1 . " " . $this->pass2 . " " . $this->email;
    }

    function veryfi_lengh() {
        if (strlen(($this->login)) < 4) {
            echo "<h4 style='color:red;'>" . strlen($this->login) . " to zdecydowanie za mało znaków na login<br></h4><br>";
            return FALSE;
        }
        if (preg_match($this->valida, ($this->login))) {
            
        } else {
            echo "<h4 style='color:red;'> login zawiera nie dozwolone znaki <br></h4><br>";
            return FALSE;
        }
        if (strlen(($this->pass1)) < 5) {
            echo "<h4 style='color:red;'>" . strlen($this->pass1) . " to zdecydowanie za mało znaków na hasło</h4><br>";
            return FALSE;
        }
        if (preg_match($this->valida,($this->pass1))) {
            
        } else {
            echo "<h4 style='color:red;'>  hasło zawiera nie dozwolone znaki <br></h4><br>";
            return FALSE;
        }
        if (strlen(($this->pass2)) < 5) {
            echo "<h4 style='color:red;'>" . strlen($this->pass2) . " to zdecydowanie za mało znaków na hasło</h4><br>";
            return FALSE;
        }
        if (preg_match($this->valida, $this->pass2)) {
            
        } else {
            echo "<h4 style='color:red;'> hasło zawiera nie dozwolone znaki <br></h4><br>";
            return FALSE;
        }
        if (strlen(($this->email)) < 4) {
            echo "<h4 style='color:red;'> email jest za krótki</h4><br>";
            return FALSE;
        }
        if (($this->pass1) != ($this->pass2)) {
            echo "<h4 style='color:red;'>Podane hasła nie są identyczne</h4><br/>";
            return FALSE;
        }
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            
        } else {
            echo "<h4 style='color:red;'>Nie poprawny mail</h4><br/>";
            return FALSE;
        }
        include_once 'DBconfig.php';
        include_once 'DBconnecting.php';

        $mysqli_zapytanie = new DBconnecting(DB_server, DB_user, DB_pass, DB_baza);
        //$mysqli_zapytanie = new DBconnecting("localhost", "root", "", "db_zaliczeniephp");        
        $wynik = $mysqli_zapytanie->select('SELECT users.Ilosc_Wizyt FROM users WHERE users.Login="' . $this->login . '";');
        // echo $wynik;
        //      echo 'Ass' . $wynik_assoc = $wynik->fetch_assoc()."<br>";
        $wynik_rows = $wynik->num_rows;
        if ($wynik_rows > 0) {
            echo "<h4 style='color:red;'>Padany login już istnieje proszę wybrać inny </h4><br/>";
            return FALSE;
        }
        $wynik = $mysqli_zapytanie->select('SELECT users.Ilosc_Wizyt FROM users WHERE users.email="' . $this->email . '";');
        // echo $wynik;
        //      echo 'Ass' . $wynik_assoc = $wynik->fetch_assoc()."<br>";
        $wynik_rows = $wynik->num_rows;
        if ($wynik_rows > 0) {
            echo "<h4 style='color:red;'>podany mail już istnieje w serwisie </h4><br/>";
            return FALSE;
        }

        return TRUE;
    }

    function potwierdzenie_rejestracji($login_rejestracja) {
        $mysqli_zapytanie = new DBconnecting(DB_server, DB_user, DB_pass, DB_baza);
        $wynik = $mysqli_zapytanie->select('SELECT users.Login FROM users WHERE users.Login="' . $login_rejestracja . '";');
        $wynik_rows = $wynik->num_rows;
        if ($wynik_rows > 0) {
            $wynik_asoc = $wynik->fetch_assoc();
            echo "<h4 style='color:blue;'><br><br>Witaj " . $wynik_asoc['Login'] . " !!!<br><br><br>Rejestracja przebiegła pomyślnie :-)<br><br> możesz się już zalogować </h4><br/>";
            return TRUE;
        } else {
            echo "<h4 style='color:red;'><br><br>Rejestracja nie powiodła się  :-(</h4><br/>";
            return FALSE;
        }
    }

    function spradz_logowania() {
        $mysqli_zapytanie = new DBconnecting(DB_server, DB_user, DB_pass, DB_baza);
        $wynik = $mysqli_zapytanie->select('SELECT * FROM users WHERE users.Login="' . $this->login . '" AND users.Pass="' . $this->pass1 . '";');
        $_SESSION['mes'] = $wynik_rows = $wynik->num_rows;
        if ($wynik_rows > 0) {
            $wynik_asoc = $wynik->fetch_assoc();
            $_SESSION['id'] = $wynik_asoc['id_users'];
            $_SESSION['admin'] = $wynik_asoc['Admin'];
            $_SESSION['wyz'] = $wynik_asoc['Ilosc_Wizyt'];
            $_SESSION['email'] = $wynik_asoc['email'];
            $_SESSION['nick'] = $this->login;

            $wynik2 = $mysqli_zapytanie->select('SELECT * FROM logged_users ls WHERE ls.id_Sesion ="' . session_id() . '";');
            $wynik_rows2 = $wynik2->fetch_assoc();
            if ($wynik_rows2 == 0) {
                $_SESSION['wyz'] = $_SESSION['wyz'] + 1;
                $upd = $mysqli_zapytanie = new DBconnecting(DB_server, DB_user, DB_pass, DB_baza);
                $upd->insert('UPDATE users u SET u.Ilosc_Wizyt="' . $_SESSION['wyz'] . '" WHERE u.id_users ="' . $_SESSION['id'] . '"');
                $upd->insert('INSERT INTO `logged_users`(`id_Sesion`, `id_users`, `Date_logged`) VALUES ("' . session_id() . '","' . $_SESSION['id'] . '","' . date("Y-m-d H:i:s") . '")');
            }
//  UPDATE users u SET u.Ilosc_Wizyt=5 WHERE u.id_users =5
            // $_SESSION['logged']=TRUE;
            return TRUE;
        } else {
            $_SESSION['error_login'] = TRUE;
            //  "<h4 style='color:red;'><br><br>Błedny login lub hasło !!!  :-(</h4><br/>";           
            // $_SESSION['logged']=FALSE;
            return FALSE;
        }
    }

    function loguot() {
        $mysqli_zapytanie = new DBconnecting(DB_server, DB_user, DB_pass, DB_baza);
        $ddb = $mysqli_zapytanie->delete('DELETE FROM logged_users WHERE  logged_users.id_users ="' . $_SESSION['id'] . '"');
    }

}
