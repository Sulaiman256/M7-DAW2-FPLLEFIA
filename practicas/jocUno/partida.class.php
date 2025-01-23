<?php

require_once 'baraja.class.php';
require_once 'jugador.class.php';

class Partida {
    public $numero_jugadores;
    public $numero_cartas;
    public $turno = 0;
    public $baraja;
    public $array_jugadores = [];
    public $carta_en_mesa;
    public $constante_sentido = 1; 

    public function __construct($numero_jugadores, $numero_cartas) {
        $this->numero_jugadores = $numero_jugadores;
        $this->numero_cartas = $numero_cartas;
        $this->baraja = new Baraja();
        $this->baraja->crea_baraja();
        $this->baraja->mezcla();

        for ($i = 0; $i < $this->numero_jugadores; $i++) {
            $this->array_jugadores[] = new Jugador($i);
        }

        for ($i = 0; $i < $this->numero_cartas; $i++) {
            foreach ($this->array_jugadores as $jugador) {
                $jugador->afegir_carta(array_shift($this->baraja->conjunto_cartas));
            }
        }

        $this->carta_en_mesa = array_shift($this->baraja->conjunto_cartas);
    }

    public function cambiar_turno() {
        $this->turno = ($this->turno + $this->constante_sentido + $this->numero_jugadores) % $this->numero_jugadores;
    }

    public function cambiar_sentido() {
        $this->constante_sentido *= -1;
    }
}

?>
