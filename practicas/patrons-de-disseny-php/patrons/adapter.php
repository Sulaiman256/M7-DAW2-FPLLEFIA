<?php

// Interfaz que debe ser adaptada
interface OldSystem
{
    public function oldMethod();
}

class OldClass implements OldSystem
{
    public function oldMethod()
    {
        return "Método antiguo ejecutado.";
    }
}

// Nueva interfaz
interface NewSystem
{
    public function newMethod();
}

class NewClass implements NewSystem
{
    public function newMethod()
    {
        return "Método nuevo ejecutado.";
    }
}

// Adapter que permite que OldClass se adapte a NewSystem
class Adapter implements NewSystem
{
    private $oldSystem;

    public function __construct(OldSystem $oldSystem)
    {
        $this->oldSystem = $oldSystem;
    }

    public function newMethod()
    {
        // Llama al método viejo y lo adapta
        return $this->oldSystem->oldMethod();
    }
}

// Crear instancia de la clase antigua y adaptador
$oldClass = new OldClass();
$adapter = new Adapter($oldClass);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Adapter en PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg text-center">
        <h1 class="text-4xl font-semibold text-gray-800 mb-4">Patrón Adapter en PHP</h1>
        <p class="text-xl text-gray-600 mb-6">
            Este ejemplo muestra cómo adaptar una interfaz antigua a una nueva utilizando el patrón Adapter en PHP.
        </p>

        <div class="bg-gray-50 p-4 rounded-lg mb-6 shadow">
            <h2 class="text-2xl font-semibold text-gray-700">Resultado del Adaptador:</h2>
            <p class="text-lg text-gray-800 mt-2">
                <?php echo $adapter->newMethod(); ?>
            </p>
        </div>

        <div class="text-left text-gray-600 mt-6">
            <h3 class="text-xl font-semibold">Código PHP:</h3>
            <pre class="bg-gray-800 text-white p-4 rounded-lg overflow-auto">
&lt;?php

// Interfaz que debe ser adaptada
interface OldSystem {
    public function oldMethod();
}

class OldClass implements OldSystem {
    public function oldMethod() {
        return "Método antiguo ejecutado.";
    }
}

// Nueva interfaz
interface NewSystem {
    public function newMethod();
}

class NewClass implements NewSystem {
    public function newMethod() {
        return "Método nuevo ejecutado.";
    }
}

// Adapter que permite que OldClass se adapte a NewSystem
class Adapter implements NewSystem {
    private $oldSystem;

    public function __construct(OldSystem $oldSystem) {
        $this->oldSystem = $oldSystem;
    }

    public function newMethod() {
        // Llama al método viejo y lo adapta
        return $this->oldSystem->oldMethod();
    }
}

// Crear instancia de la clase antigua y adaptador
$oldClass = new OldClass();
$adapter = new Adapter($oldClass);

?&gt;
            </pre>
        </div>
    </div>
</body>

</html>