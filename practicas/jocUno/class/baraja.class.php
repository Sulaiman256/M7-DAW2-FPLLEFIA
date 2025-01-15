<?php
include_once "./carta.class.php";
class Baraja {
    private $conjunto_cartas = [];

    public function crea_baraja() {
        $pals = ['yellow', 'red', 'green', 'blue'];
        $numeros = array_merge(range(1, 9), ['reverse', 'skip', 'picker']);

        $index = 0;
        foreach ($pals as $palo) {
            foreach ($numeros as $numero) {
                $this->conjunto_cartas[] = new Carta($palo, $numero, $index++);
            }
        }
    }
    public function mezcla() {
        shuffle($this->conjunto_cartas);
    }
    public function pinta_baraja() {
        foreach ($this->conjunto_cartas as $carta) {
            $carta->pinta_carta();
        }
    }

    public function pinta_baraja_girada() {
        foreach ($this->conjunto_cartas as $carta) {
            $carta->pinta_carta_girada();
        }
    }

    public function getConjuntoCartas() {
        return $this->conjunto_cartas;
    }
}

?>