<?php

class Carta {
    public $palo;
    public $numero;
    public $index = 0;

    public function __construct($palo, $numero, $index) {
        $this->palo = $palo;
        $this->numero = $numero;
        $this->index = $index;
    }

    public function pinta_carta() {
        
        echo '<img src="./images/'.$this->numero.'_'.$this->palo.'.png" alt="'.$this->numero.'_'.$this->palo.'">';
    }
public function pinta_carta_link() {
    echo '<a href="index.php?id='.$this->index.'" class="inline-block">';
    echo '<img src="./images/'.$this->numero.'_'.$this->palo.'.png" alt="'.$this->numero.'_'.$this->palo.'" class="block">';
    echo '</a>';
}


    public function pinta_carta_girada() {
        echo '<img class="inline-block" width="100px" src="./images/carta_girada.png" alt="carta girada">';
    }

}
?>
