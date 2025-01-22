<?php

require_once 'carta.class.php';

class Baraja {
    public $conjunto_cartas = [];

    public function crea_baraja() {
        $index = 0;

        foreach (['red', 'yellow', 'blue', 'green'] as $color) {
            for ($i = 0; $i <= 9; $i++) {
                $this->conjunto_cartas[] = new Carta($color, $i, $index++);
            }
            foreach (['reverse', 'skip', 'picker'] as $especial) {
                $this->conjunto_cartas[] = new Carta($color, $especial, $index++);
            }
        }
    }

    public function mezcla() {
        shuffle($this->conjunto_cartas);
    }

    public function pinta_baraja() {
        $output = '';
        foreach ($this->conjunto_cartas as $carta) {
            $output .= $carta->pinta_carta_link();
        }
        return $output;
    }

    public function pinta_baraja_girada() {
        $output = '';
        foreach ($this->conjunto_cartas as $carta) {
            $output .= $carta->pinta_carta_girada();
        }
        return $output;
    }
}

?>
