<?php

// Ejercicio 1 2 3 4

class Llibre {
    public string $titol;
    public string $autor;

    public function __construct($titol = "El Quijo", $autor="Miguel") {
        $this->titol = $titol;
        $this->autor = $autor;
    }

    public function getAutor() : string {
        return $this->autor;
    }

    public function descripcio() : string {
        return "El llibre '" . $this->titol . "' és escrit per " . $this->autor . ".";
    }
}

Class Persona {
    public string $nom;
    public int $edat;

    public function __construct($nom = "Anna", $edat=25) {
        $this->nom = $nom;
        $this->edat = $edat;
    }

    public function Saludar() {
        return "Hola, soc " . $this->nom . " i tinc " . $this->edat . " anys.";
    }

}

Class Producte {
    public string $nom;
    public float $preu;

    public function __construct($nom = "Pa", $preu=1.75) {
        $this->nom = $nom;
        $this->preu = $preu;
    }

    public function mostrarPreu(){
        return "El preu del " . $this->nom . " és de " . $this->preu . "€.";
    }


}

Class Calculadora{
    public function suma($a, $b){
        return $a + $b;
    }

    public function resta($a, $b){
        return $a - $b;
    }

    public function multiplicar($a, $b){
        return $a * $b;
    }

    public function dividir($a, $b){
        if($b!= 0){
            return $a / $b;
        }else{
            return "Error: Divisio per zero.";
        }
    }
}

class Animal {

    private $nom;
    private $tipus;

    // Constructor
    public function __construct($nom, $tipus) {
        $this->nom = $nom;
        $this->tipus = $tipus;
    }

    public function descriure() {
        return "El nom de l'animal és " . $this->nom . " i és un " . $this->tipus . ".";
    }
}



$llibre = new Llibre("El Quijote", "Miguel de Cervantes");
echo $llibre->descripcio();
echo "<br>";
echo $llibre->getAutor();
echo "<br>";

$persona = new Persona("Anna", 25);
echo "<br>";

echo $persona->Saludar();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nom = $_POST['nom'];
    $edat = (int) $_POST['edat']; 

    $persona = new Persona($nom, $edat);

    echo $persona->Saludar();
}

$producte = new Producte("Pa", 1.75);
$producte2 = new Producte("Elden Ring Shadow of the erdtree" , 28.99);
$producte3 = new Producte("Coca Cola", 0.75);
$producte4 = new Producte("Pepsi", 0.75);
$producte5 = new Producte("Fanta", 0.75);
echo "<br>";
echo $producte->mostrarPreu();

$calculadora = new Calculadora();
echo "<br>";
echo "Suma: ". $calculadora->suma(5, 3);
echo "<br>";
echo "Resta: ". $calculadora->resta(5, 3);
echo "<br>";
echo "Multiplicar: ". $calculadora->multiplicar(5, 3);
echo "<br>";
echo "Divisio: ". $calculadora->dividir(5, 3);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $tipus = $_POST["tipus"];

    $animal = new Animal($nom, $tipus);

    echo "<h2>Descripció de l'animal:</h2>";
    echo "<p>" . $animal->descriure() . "</p>";
}
  
?>
  <form method="POST" action="">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required>
        <br><br>
        <label for="edat">Edat:</label>
        <input type="number" id="edat" name="edat" required>
        <br><br>
        <input type="submit" value="Enviar">
    </form>

    <table>
        <tr>
            <th>Nom</th>
            <th>Preu</th>
        </tr>
        <tr>
            <td><?php echo $producte2->nom;?></td>
            <td><?php echo $producte2->mostrarPreu();?></td>
        </tr>
        <tr>
            <td><?php echo $producte3->nom;?></td>
            <td><?php echo $producte3->mostrarPreu();?></td>
        </tr>
        <tr>
            <td><?php echo $producte4->nom;?></td>
            <td><?php echo $producte4->mostrarPreu();?></td>
        </tr>
        <tr>
            <td><?php echo $producte5->nom;?></td>
            <td><?php echo $producte5->mostrarPreu();?></td>
        </tr>
    </table>

<h2>Introduïu les dades de l'animal</h2>
    <form action="" method="post">
        <label for="nom">Nom de l'animal:</label><br>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="tipus">Tipus d'animal:</label><br>
        <input type="text" id="tipus" name="tipus" required><br><br>

        <input type="submit" value="Enviar">
    </form>

