<?php

class Carta {
    // Propietats de la carta
    private $palo;
    private $numero;
    private $index;

    // Constructor
    public function __construct($palo, $numero, $index) {
        $this->palo = $palo;
        $this->numero = $numero;
        $this->index = $index;
    }

    public function pinta_carta() {
        echo '<img src="..images/'.$this->numero.'_'.$this->palo.'.png" alt="'.$this->palo.'_'.$this->numero.'">';
    }

    public function pinta_carta_link() {
        echo '<a href="interactuar.php?id='.$this->index.'"><img src="images/'.$this->palo.'_'.$this->numero.'.png" alt="'.$this->palo.'_'.$this->numero.'"></a>';
    }

    public function pinta_carta_girada() {
        echo '<img src="../images/back.jpg"" alt="carta girada">';
    }

    public function getPalo() {
        return $this->palo;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getIndex() {
        return $this->index;
    }
}
?>