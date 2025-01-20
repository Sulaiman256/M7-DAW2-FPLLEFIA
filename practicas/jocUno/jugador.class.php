<?php

class Jugador {
    public $id;
    public $mano = [];

    public function __construct($id) {
        $this->id = $id;
    }

    public function afegir_carta($carta) {
        $this->mano[] = $carta;
    }

    public function eliminar_carta($index) {
        unset($this->mano[$index]);
        $this->mano = array_values($this->mano); // Reindexem l'array
    }

    public function mostrar_ma() {
        $output = '';
        foreach ($this->mano as $carta) {
            $output .= $carta->pinta_carta();
        }
        return $output;
    }
}

?>
