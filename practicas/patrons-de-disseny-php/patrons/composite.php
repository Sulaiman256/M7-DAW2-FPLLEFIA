<?php

// Componente base
abstract class Component
{
    abstract public function operation();
}

// Hoja (un objeto simple)
class Leaf extends Component
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function operation()
    {
        return "Hoja: " . $this->name;
    }
}

// Compuesto (puede contener hojas y otros compuestos)
class Composite extends Component
{
    private $children = [];

    // Añadir un componente hijo
    public function add(Component $component)
    {
        $this->children[] = $component;
    }

    public function operation()
    {
        $result = "Componente compuesto que contiene:\n";
        foreach ($this->children as $child) {
            $result .= "- " . $child->operation() . "\n";
        }
        return $result;
    }
}

// Crear hojas y un compuesto
$leaf1 = new Leaf("Hoja 1");
$leaf2 = new Leaf("Hoja 2");
$leaf3 = new Leaf("Hoja 3");

$composite = new Composite();
$composite->add($leaf1);
$composite->add($leaf2);

$composite2 = new Composite();
$composite2->add($leaf3);

// Crear un compuesto que contiene otros compuestos
$rootComposite = new Composite();
$rootComposite->add($composite);
$rootComposite->add($composite2);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Composite en PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg text-center">
        <h1 class="text-4xl font-semibold text-gray-800 mb-4">Patrón Composite en PHP</h1>
        <p class="text-xl text-gray-600 mb-6">
            Trabaja con objetos como si fueran un árbol, permitiendo su manipulación individual
        </p>

        <div class="bg-gray-50 p-4 rounded-lg mb-6 shadow">
            <h2 class="text-2xl font-semibold text-gray-700">Resultado de la operación Composite:</h2>
            <p class="text-lg text-gray-800 mt-2">
                <?php echo nl2br($rootComposite->operation()); ?>
            </p>
        </div>

        <div class="text-left text-gray-600 mt-6">
            <h3 class="text-xl font-semibold">Código PHP:</h3>
            <pre class="bg-gray-800 text-white p-4 rounded-lg overflow-auto">
&lt;?php

// Componente base
abstract class Component {
    abstract public function operation();
}

// Hoja (un objeto simple)
class Leaf extends Component {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function operation() {
        return "Hoja: " . $this->name;
    }
}

// Compuesto (puede contener hojas y otros compuestos)
class Composite extends Component {
    private $children = [];

    // Añadir un componente hijo
    public function add(Component $component) {
        $this->children[] = $component;
    }

    public function operation() {
        $result = "Componente compuesto que contiene:\n";
        foreach ($this->children as $child) {
            $result .= "- " . $child->operation() . "\n";
        }
        return $result;
    }
}

// Crear hojas y un compuesto
$leaf1 = new Leaf("Hoja 1");
$leaf2 = new Leaf("Hoja 2");
$leaf3 = new Leaf("Hoja 3");

$composite = new Composite();
$composite->add($leaf1);
$composite->add($leaf2);

$composite2 = new Composite();
$composite2->add($leaf3);

// Crear un compuesto que contiene otros compuestos
$rootComposite = new Composite();
$rootComposite->add($composite);
$rootComposite->add($composite2);

?&gt;
            </pre>
        </div>
    </div>
</body>

</html>