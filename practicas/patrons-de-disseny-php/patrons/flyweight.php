<?php

// Flyweight: Definimos la clase que será el objeto compartido
class Character
{
    private $char;

    public function __construct($char)
    {
        $this->char = $char;
    }

    public function display()
    {
        return $this->char;
    }
}

// Flyweight Factory: Esta clase gestionará la creación y reutilización de objetos Flyweight
class CharacterFactory
{
    private $characters = [];

    public function getCharacter($char)
    {
        if (!isset($this->characters[$char])) {
            // Si no existe, se crea una nueva instancia y se guarda en el arreglo
            $this->characters[$char] = new Character($char);
        }

        // Devuelve el objeto Flyweight
        return $this->characters[$char];
    }
}

// Cliente: Usamos el Flyweight para componer una cadena de texto
class TextEditor
{
    private $factory;
    private $text = [];

    public function __construct()
    {
        $this->factory = new CharacterFactory();
    }

    public function addCharacter($char)
    {
        // Usamos el Flyweight (la misma instancia de Character se compartirá)
        $this->text[] = $this->factory->getCharacter($char);
    }

    public function displayText()
    {
        $output = "";
        foreach ($this->text as $char) {
            $output .= $char->display();
        }
        return $output;
    }
}

// Crear un editor de texto y añadir caracteres
$editor = new TextEditor();
$editor->addCharacter("H");
$editor->addCharacter("e");
$editor->addCharacter("l");
$editor->addCharacter("l");
$editor->addCharacter("o");
$editor->addCharacter(" ");
$editor->addCharacter("W");
$editor->addCharacter("o");
$editor->addCharacter("r");
$editor->addCharacter("l");
$editor->addCharacter("d");

// Mostrar el texto compuesto
$text = $editor->displayText();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Flyweight en PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg text-center">
        <h1 class="text-4xl font-semibold text-gray-800 mb-4">Patrón Flyweight en PHP</h1>
        <p class="text-xl text-gray-600 mb-6">
            Optimiza el uso de la memoria compartiendo objetos comunes entre instancias.
        </p>

        <div class="bg-gray-50 p-4 rounded-lg mb-6 shadow">
            <h2 class="text-2xl font-semibold text-gray-700">Resultado del Texto:</h2>
            <p class="text-lg text-gray-800 mt-2">
                <?php echo $text; ?>
            </p>
        </div>

        <div class="text-left text-gray-600 mt-6">
            <h3 class="text-xl font-semibold">Código PHP:</h3>
            <pre class="bg-gray-800 text-white p-4 rounded-lg overflow-auto">
&lt;?php

// Flyweight: Definimos la clase que será el objeto compartido
class Character {
    private $char;

    public function __construct($char) {
        $this->char = $char;
    }

    public function display() {
        return $this->char;
    }
}

// Flyweight Factory: Esta clase gestionará la creación y reutilización de objetos Flyweight
class CharacterFactory {
    private $characters = [];

    public function getCharacter($char) {
        if (!isset($this->characters[$char])) {
            // Si no existe, se crea una nueva instancia y se guarda en el arreglo
            $this->characters[$char] = new Character($char);
        }

        // Devuelve el objeto Flyweight
        return $this->characters[$char];
    }
}

// Cliente: Usamos el Flyweight para componer una cadena de texto
class TextEditor {
    private $factory;
    private $text = [];

    public function __construct() {
        $this->factory = new CharacterFactory();
    }

    public function addCharacter($char) {
        // Usamos el Flyweight (la misma instancia de Character se compartirá)
        $this->text[] = $this->factory->getCharacter($char);
    }

    public function displayText() {
        $output = "";
        foreach ($this->text as $char) {
            $output .= $char->display();
        }
        return $output;
    }
}

// Crear un editor de texto y añadir caracteres
$editor = new TextEditor();
$editor->addCharacter("H");
$editor->addCharacter("e");
$editor->addCharacter("l");
$editor->addCharacter("l");
$editor->addCharacter("o");
$editor->addCharacter(" ");
$editor->addCharacter("W");
$editor->addCharacter("o");
$editor->addCharacter("r");
$editor->addCharacter("l");
$editor->addCharacter("d");

// Mostrar el texto compuesto
$text = $editor->displayText();

?&gt;
            </pre>
        </div>
    </div>
</body>

</html>