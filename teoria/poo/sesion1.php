<?php 

class Saiyajin {
    public string $nombre = "Goku";
    public int $nivel_pelea = 1000;


    public function Saludar() : string {
        return "Hola, mi nombre es ". $this->nombre;
    }

    public function NivelDePelea() {
        return $this->nombre . "tiene un nivel de pelea de" . $this->nivel_pelea;
    }

}



$objeto1 = new Saiyajin();
$dragonball = new Saiyajin();

var_dump($objeto1);
echo "<br>";
var_dump($dragonball);

echo "<br>";
echo $objeto1->Saludar();
echo "<br>";
echo  $objeto1->NivelDePelea();







?>