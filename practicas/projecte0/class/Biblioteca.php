<?php

class Biblioteca {
    private $llibres = []; 
    public function afegirLlibre($llibre) {
        array_push($this->llibres, $llibre);
        var_dump($this->llibres);
    }

    public function mostrarLlibres() {
        return  $this->llibres;
    }
    // public function mostrarLlibres() {
    //     $detalles = [];
    //     foreach ($this->llibres as $llibre) {
    //         $detalles[] = $llibre->getDetalls();
    //     }
    //     return  $detalles;
    // }
    public function cercarLlibrePerTitol($titol) {
        return array_filter($this->llibres, function($llibre) use ($titol) {
            return strpos(strtolower($llibre->titol), strtolower($titol)) !== false;
        });
    }
}


?>