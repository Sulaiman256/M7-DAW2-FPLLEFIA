<?php
    include_once "./baraja.class.php";
    Class Partida {
        public $numero_jugadores;
        public $numero_cartas;
        public $turno;
        public Baraja $baraja;
        public $carta_en_mesa;
        public $mesa;
        public $array_jugadores;
        public $constante_sentido;

        public function __construct($numero_jugadores, $numero_cartas ) {

            $this->numero_jugadores = $numero_jugadores;
            $this->numero_cartas = $numero_cartas;
            $this->turno = 0;
            $this->baraja = new Baraja();
            $this->carta_en_mesa = null;
            $this->mesa = [];
            $this->array_jugadores = [];
            $this->constante_sentido = 'derecha';
        }

    public function jugar() {
        echo "Estado del juego:\n";
        echo "Carta en la mesa: " . ($this->carta_en_mesa ? $this->carta_en_mesa : "Ninguna") . "\n";
        foreach ($this->array_jugadores as $jugador) {
            echo "Jugador " . ($jugador->numero_jugador + 1) . ": " . ($jugador->carta_en_mesa ? $jugador->carta_en_mesa : "Ninguna") . "\n";
        }
        echo "Es el turno de: Jugador " . ($this->turno + 1) . "\n";
    }

    public function cambiar_turno(){
        if($this->constante_sentido == 'derecha'){
            $this->turno = ($this->turno + 1) % $this->numero_jugadores;
        } else {
            $this->turno = ($this->turno - 1) % $this->numero_jugadores;
        }
    }

    public function cambiar_sentido(){
        $this->constante_sentido = ($this->constante_sentido == 'derecha' ? 'izquierda' : 'derecha');
    }
    }
?>