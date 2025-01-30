<?php

// Implementación de la parte "implementadora" del patrón Bridge
interface Implementor
{
    public function operationImpl();
}

// Clases concretas que implementan la interfaz "Implementor"
class ConcreteImplementorA implements Implementor
{
    public function operationImpl()
    {
        return "Operación concreta A ejecutada.";
    }
}

class ConcreteImplementorB implements Implementor
{
    public function operationImpl()
    {
        return "Operación concreta B ejecutada.";
    }
}

// Abstracción
abstract class Abstraction
{
    protected $implementor;

    public function __construct(Implementor $implementor)
    {
        $this->implementor = $implementor;
    }

    abstract public function operation();
}

// Clases de la abstracción
class RefinedAbstraction extends Abstraction
{
    public function operation()
    {
        return "Abstracción refinada con: " . $this->implementor->operationImpl();
    }
}

// Crear las instancias de los objetos
$implementorA = new ConcreteImplementorA();
$implementorB = new ConcreteImplementorB();

$abstractionA = new RefinedAbstraction($implementorA);
$abstractionB = new RefinedAbstraction($implementorB);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Bridge en PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg text-center">
        <h1 class="text-4xl font-semibold text-gray-800 mb-4">Patrón Bridge en PHP</h1>
        <p class="text-xl text-gray-600 mb-6">
            Separa abstracción e implementación para que actúen independientemente. </p>

        <div class="bg-gray-50 p-4 rounded-lg mb-6 shadow">
            <h2 class="text-2xl font-semibold text-gray-700">Resultado de la Abstracción:</h2>
            <p class="text-lg text-gray-800 mt-2">
                <?php echo $abstractionA->operation(); ?>
            </p>
            <p class="text-lg text-gray-800 mt-2">
                <?php echo $abstractionB->operation(); ?>
            </p>
        </div>

        <div class="text-left text-gray-600 mt-6">
            <h3 class="text-xl font-semibold">Código PHP:</h3>
            <pre class="bg-gray-800 text-white p-4 rounded-lg overflow-auto">
&lt;?php

// Implementación de la parte "implementadora" del patrón Bridge
interface Implementor {
    public function operationImpl();
}

class ConcreteImplementorA implements Implementor {
    public function operationImpl() {
        return "Operación concreta A ejecutada.";
    }
}

class ConcreteImplementorB implements Implementor {
    public function operationImpl() {
        return "Operación concreta B ejecutada.";
    }
}

abstract class Abstraction {
    protected $implementor;

    public function __construct(Implementor $implementor) {
        $this->implementor = $implementor;
    }

    abstract public function operation();
}

class RefinedAbstraction extends Abstraction {
    public function operation() {
        return "Abstracción refinada con: " . $this->implementor->operationImpl();
    }
}

$implementorA = new ConcreteImplementorA();
$implementorB = new ConcreteImplementorB();

$abstractionA = new RefinedAbstraction($implementorA);
$abstractionB = new RefinedAbstraction($implementorB);

?&gt;
            </pre>
        </div>
    </div>
</body>

</html>