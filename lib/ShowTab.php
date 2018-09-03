<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ShowTab
 *
 * @author Grzegorz
 */
class ShowTab {

    private $assoc;

    public function __construct($assoc) {
        $this->assoc = $assoc;
        ;
    }
    function ShowAssoc($option){
      
        if($option==1)
        {            
        echo '<form method="POST" action="kup.php">'
        . '<table class="tabeleClass">';
       
        foreach ($this->assoc as $tab)
        {          
            echo '<tr>'
            . '<td> '.$tab['Nazwa'] .'</td>'
                    . '<td> '.$tab['cena'] .'</td>'
                    . '<td><button class="zaloguj_button" value="'.$tab['id_produkt'] .'" name="kup" id="'.$tab['id_produkt'] .'">Kup</button></td>'
                    . '</tr>';
        }
        echo "</table>"
        . "</form>";
        }
        if($option==2)
        {
        echo '<form method="POST" action="kup.php">'
        . '<table class="tabeleClass">';
       
        foreach ($this->assoc as $tab)
        {
            echo '<tr>'
            . '<td> '.$tab['Nazwa'] .'</td>'
                    . '<td><button class="zaloguj_button" name="usun" value="'.$tab['id_produkt'] .'" id="'.$tab['id_produkt'].'" >Usuń</button></td>'
                    . '</tr>';
        }
        echo "</table>"
        . "</form>";
        }
    }    
}
