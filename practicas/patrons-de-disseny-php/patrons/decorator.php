<?php

// Componente base
class Coffee
{
    public function cost()
    {
        return 5;  // El costo básico del café
    }
}

// Decorador abstracto
abstract class CoffeeDecorator
{
    protected $coffee;

    public function __construct($coffee)
    {
        if ($coffee instanceof Coffee || $coffee instanceof CoffeeDecorator) {
            $this->coffee = $coffee;
        } else {
            throw new InvalidArgumentException('Expected instance of Coffee or CoffeeDecorator');
        }
    }

    abstract public function cost();
}

// Decorador concreto para añadir leche
class MilkDecorator extends CoffeeDecorator
{
    public function cost()
    {
        return $this->coffee->cost() + 1;  // Leche cuesta 1 adicional
    }
}

// Decorador concreto para añadir azúcar
class SugarDecorator extends CoffeeDecorator
{
    public function cost()
    {
        return $this->coffee->cost() + 0.5;  // Azúcar cuesta 0.5 adicional
    }
}

// Decorador concreto para añadir crema
class CreamDecorator extends CoffeeDecorator
{
    public function cost()
    {
        return $this->coffee->cost() + 1.5;  // Crema cuesta 1.5 adicional
    }
}

// Crear un café y añadir decoradores
$coffee = new Coffee();
$coffeeWithMilk = new MilkDecorator($coffee);
$coffeeWithMilkAndSugar = new SugarDecorator($coffeeWithMilk);
$coffeeWithAllExtras = new CreamDecorator($coffeeWithMilkAndSugar);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Decorator en PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg text-center">
        <h1 class="text-4xl font-semibold text-gray-800 mb-4">Patrón Decorator en PHP</h1>
        <p class="text-xl text-gray-600 mb-6">
            Agrega funcionalidades a un objeto dentro de otro sin modificar su estructura original.
        </p>

        <div class="bg-gray-50 p-4 rounded-lg mb-6 shadow">
            <h2 class="text-2xl font-semibold text-gray-700">Costo de los cafés:</h2>
            <ul class="text-lg text-gray-800 mt-2">
                <li>Café básico: $<?php echo $coffee->cost(); ?></li>
                <li>Café con leche: $<?php echo $coffeeWithMilk->cost(); ?></li>
                <li>Café con leche y azúcar: $<?php echo $coffeeWithMilkAndSugar->cost(); ?></li>
                <li>Café con leche, azúcar y crema: $<?php echo $coffeeWithAllExtras->cost(); ?></li>
            </ul>
        </div>

        <div class="text-left text-gray-600 mt-6">
            <h3 class="text-xl font-semibold">Código PHP:</h3>
            <pre class="bg-gray-800 text-white p-4 rounded-lg overflow-auto">
&lt;?php

// Componente base
class Coffee {
    public function cost() {
        return 5;  // El costo básico del café
    }
}

// Decorador abstracto
abstract class CoffeeDecorator {
    protected $coffee;

    public function __construct(Coffee $coffee) {
        $this->coffee = $coffee;
    }

    abstract public function cost();
}

// Decorador concreto para añadir leche
class MilkDecorator extends CoffeeDecorator {
    public function cost() {
        return $this->coffee->cost() + 1;  // Leche cuesta 1 adicional
    }
}

// Decorador concreto para añadir azúcar
class SugarDecorator extends CoffeeDecorator {
    public function cost() {
        return $this->coffee->cost() + 0.5;  // Azúcar cuesta 0.5 adicional
    }
}

// Decorador concreto para añadir crema
class CreamDecorator extends CoffeeDecorator {
    public function cost() {
        return $this->coffee->cost() + 1.5;  // Crema cuesta 1.5 adicional
    }
}

// Crear un café y añadir decoradores
$coffee = new Coffee();
$coffeeWithMilk = new MilkDecorator($coffee);
$coffeeWithMilkAndSugar = new SugarDecorator($coffeeWithMilk);
$coffeeWithAllExtras = new CreamDecorator($coffeeWithMilkAndSugar);

?&gt;
            </pre>
        </div>
    </div>
</body>

</html>