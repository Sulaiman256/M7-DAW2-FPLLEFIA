<?php

class Llibre {
    public $titol;
    public $autor;
    public $anyPublicacio;
    public $foto;

    public function __construct($titol, $autor, $anyPublicacio, $foto) {
        $this->titol = $titol;
        $this->autor = $autor;
        $this->anyPublicacio = $anyPublicacio;
        $this->foto = $foto;
    }

    public function getDetalls() {
        return "Títol: $this->titol, Autor: $this->autor, Any de Publicació: $this->anyPublicacio, Foto: $this->foto";
    }
}
?>