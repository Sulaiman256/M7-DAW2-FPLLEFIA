<?php

Class Cotxe {
    public string $marca = "Cupra";
    public string $model = "Cupra Ateca";



    public function descripcio(){
        return "El cotxe és un " . $this->marca . " ". "su modelo es" . " " . $this->model . ".";
    }
}

Class Persona {
    public string $nom;
    public int $edat;

    public function __construct($nom = "Sulaiman", $edat=22) {
        $this->nom = $nom;
        $this->edat = $edat;
    }

    public function Saludar() : string {
        return "Hola, Bienvenido eres, " . $this->nom . " i tienes " . $this->edat . " anys.";
    }
}

Class Calculadora {
    public function suma($a, $b){
        return $a + $b;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $edat = $_POST["edat"];

    $persona = new Persona($nom, $edat);

    // Mostrar el missatge personalitzat
    echo "<h2>Informació de la Persona:</h2>";
    echo "<p>" . $persona->Saludar() . "</p>";
} else {
    echo "<p>No s'ha enviat el formulari encara.</p>";
}

Class Animal {
    public string $nom;
    public string $tipus;

    public function __construct($nom = "Giraffa", $tipus="Mamífer") {
        $this->nom = $nom;
        $this->tipus = $tipus;
    }

    public function Saludar() : string {
        return "Hola soc un ". $this->tipus. " i em dic ". $this->nom. ".";
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

$cotxe = new Cotxe();
echo $cotxe->descripcio();
echo "<br>";

$persona = new Persona("Sulaiman", 22);
echo $persona->Saludar();
echo "<br>";
$persona2 = new Persona("Brian", 19);
echo $persona2->Saludar();
echo "<br>";

$calculadora = new Calculadora();
echo $calculadora->suma(5, 3);
echo "<br>";

$animal = new Animal();
echo $animal->Saludar();
echo "<br>";

$producte = new Producte("Pa", 1.75);
$producte2 = new Producte("Elden Ring Shadow of the erdtree" , 28.99);
$producte3 = new Producte("Coca Cola", 0.75);
$producte4 = new Producte("Pepsi", 0.75);
$producte5 = new Producte("Fanta", 0.75)




?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulari Persona</title>
</head>
<body>
    <h2>Introduïu les dades de la persona</h2>
    <form action="" method="post">
        <label for="nom">Nom:</label><br>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="edat">Edat:</label><br>
        <input type="number" id="edat" name="edat" required><br><br>

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
</body>
</html>



