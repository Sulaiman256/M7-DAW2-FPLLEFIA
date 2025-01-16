<?php
    include_once "./baraja.class.php";
    Class Partida {
        public $numero_jugadores;
        public $numero_cartas;
        public $turno;
        public Baraja $baraja;
        public $carta_en_mesa;
        public $array_jugadores;
        public $constante_sentido;

        public function __construct( ) {

            $this->numero_jugadores = [];
            $this->numero_cartas = [];
            $this->turno = 0;
            $this->baraja = new Baraja();
            $this->carta_en_mesa = true;
            $this->array_jugadores = [];
            $this->constante_sentido = 'derecha';
        }

   public function jugar() {
    echo "Estado del juego:\n";
    
    echo "Carta en la mesa: " . ($this->carta_en_mesa ? '<img src="./images/1_green.png" alt="Carta en la mesa">' : "Ninguna") . "\n";
    
    foreach ($this->array_jugadores as $jugador) {
        echo "Jugador " . ($jugador->numero_jugador + 1) . ": " . ($jugador->carta_en_mesa ? $jugador->carta_en_mesa : "Ninguna") . "\n";
    }
    
    echo "Es el turno de: Jugador " . ($this->turno + 1) . "\n";
}

// public function normas_uno($carta) {
//     switch ($carta->tipo) {
//         case 'reverse_green':
//         case 'reverse_yellow':
//         case 'reverse_red':
//         case 'reverse_blue':
//             $this->constante_sentido = ($this->constante_sentido == 'derecha') ? 'izquierda' : 'derecha';
//             break;
//         case 'skip_green':
//         case 'skip_blue':
//         case 'skip_red':
//         case 'skip_yellow':
//             $this->cambiar_turno();
//             break;
//         case 'picker_green':
//         case 'picker_blue':
//         case 'picker_red':
//         case 'picker_yellow':
//             // $siguiente_jugador = ($this->turno + 1) % $this->numero_jugadores;
//             $this->array_jugadores[$siguiente_jugador];
//             break;
//     }
//     $this->cambiar_turno();
// }


    // public function cambiar_turno(){
    //     if($this->constante_sentido == 'derecha'){
    //         $this->turno = ($this->turno + 1) % $this->numero_jugadores;
    //     } else {
    //         $this->turno = ($this->turno - 1) % $this->numero_jugadores;
    //     }
    // }

    public function cambiar_sentido(){
        $this->constante_sentido = ($this->constante_sentido == 'derecha' ? 'izquierda' : 'derecha');
    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
</body>
</html>