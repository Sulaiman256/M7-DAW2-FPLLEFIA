<?php

class Biblioteca {
    private $llibres = array();

    public function afegirLlibre($llibre) {
        $this->llibres[] = $llibre;
    }

    public function mostrarLlibres() {
        return $this->llibres;
    }

    public function cercarLlibrePerTitol($titol) {
        $resultat = array();
        foreach ($this->llibres as $llibre) {
            if (strpos($llibre->getDetalls(), $titol) !== false) {
                $resultat[] = $llibre;
            }
        }
        return $resultat;
    }
}

?>