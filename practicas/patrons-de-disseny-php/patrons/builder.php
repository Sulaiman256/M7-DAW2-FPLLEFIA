<?php

// La clase Producto: Pizza
class Pizza
{
    private $dough;
    private $sauce;
    private $toppings = [];

    public function setDough($dough)
    {
        $this->dough = $dough;
    }

    public function setSauce($sauce)
    {
        $this->sauce = $sauce;
    }

    public function addTopping($topping)
    {
        $this->toppings[] = $topping;
    }

    public function describe()
    {
        $description = "Pizza con masa de $this->dough, salsa $this->sauce, y los siguientes toppings: " . implode(", ", $this->toppings);
        return $description;
    }
}

// Interfaz Builder: Define los pasos para crear una Pizza
interface PizzaBuilder
{
    public function setDough();
    public function setSauce();
    public function setToppings();
    public function getPizza(): Pizza;
}

// Implementación concreta del Builder: Pizza Hawaiana
class HawaiianPizzaBuilder implements PizzaBuilder
{
    private $pizza;

    public function __construct()
    {
        $this->pizza = new Pizza();
    }

    public function setDough()
    {
        $this->pizza->setDough('suave');
    }

    public function setSauce()
    {
        $this->pizza->setSauce('tomate');
    }

    public function setToppings()
    {
        $this->pizza->addTopping('piña');
        $this->pizza->addTopping('jamón');
    }

    public function getPizza(): Pizza
    {
        return $this->pizza;
    }
}

// Implementación concreta del Builder: Pizza Vegetariana
class VegetarianPizzaBuilder implements PizzaBuilder
{
    private $pizza;

    public function __construct()
    {
        $this->pizza = new Pizza();
    }

    public function setDough()
    {
        $this->pizza->setDough('integral');
    }

    public function setSauce()
    {
        $this->pizza->setSauce('pesto');
    }

    public function setToppings()
    {
        $this->pizza->addTopping('pimientos');
        $this->pizza->addTopping('aceitunas');
        $this->pizza->addTopping('tomates secos');
    }

    public function getPizza(): Pizza
    {
        return $this->pizza;
    }
}

// Director: Maneja la construcción de la pizza
class PizzaDirector
{
    private $builder;

    public function __construct(PizzaBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function constructPizza()
    {
        $this->builder->setDough();
        $this->builder->setSauce();
        $this->builder->setToppings();
    }

    public function getPizza(): Pizza
    {
        return $this->builder->getPizza();
    }
}

// Crear una pizza hawaiana
$hawaiianBuilder = new HawaiianPizzaBuilder();
$pizzaDirector = new PizzaDirector($hawaiianBuilder);
$pizzaDirector->constructPizza();
$hawaiianPizza = $pizzaDirector->getPizza();

// Crear una pizza vegetariana
$vegetarianBuilder = new VegetarianPizzaBuilder();
$pizzaDirector = new PizzaDirector($vegetarianBuilder);
$pizzaDirector->constructPizza();
$vegetarianPizza = $pizzaDirector->getPizza();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Builder en PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg text-center">
        <h1 class="text-4xl font-semibold text-gray-800 mb-4">Patrón Builder en PHP</h1>
        <p class="text-xl text-gray-600 mb-6">
            Permite construir objetos complejos de manera paso a paso, produciendo diferentes tipos y representaciones con el mismo proceso de construcción. </p>

        <div class="bg-gray-50 p-4 rounded-lg mb-6 shadow">
            <h2 class="text-2xl font-semibold text-gray-700">Pizza Hawaiana:</h2>
            <p class="text-lg text-gray-800 mt-2">
                <?php echo $hawaiianPizza->describe(); ?>
            </p>

            <h2 class="text-2xl font-semibold text-gray-700 mt-6">Pizza Vegetariana:</h2>
            <p class="text-lg text-gray-800 mt-2">
                <?php echo $vegetarianPizza->describe(); ?>
            </p>
        </div>

        <div class="text-left text-gray-600 mt-6">
            <h3 class="text-xl font-semibold">Código PHP:</h3>
            <pre class="bg-gray-800 text-white p-4 rounded-lg overflow-auto">
&lt;?php

// La clase Producto: Pizza
class Pizza {
    private $dough;
    private $sauce;
    private $toppings = [];

    public function setDough($dough) {
        $this->dough = $dough;
    }

    public function setSauce($sauce) {
        $this->sauce = $sauce;
    }

    public function addTopping($topping) {
        $this->toppings[] = $topping;
    }

    public function describe() {
        $description = "Pizza con masa de $this->dough, salsa $this->sauce, y los siguientes toppings: " . implode(", ", $this->toppings);
        return $description;
    }
}

// Interfaz Builder: Define los pasos para crear una Pizza
interface PizzaBuilder {
    public function setDough();
    public function setSauce();
    public function setToppings();
    public function getPizza(): Pizza;
}

// Implementación concreta del Builder: Pizza Hawaiana
class HawaiianPizzaBuilder implements PizzaBuilder {
    private $pizza;

    public function __construct() {
        $this->pizza = new Pizza();
    }

    public function setDough() {
        $this->pizza->setDough('suave');
    }

    public function setSauce() {
        $this->pizza->setSauce('tomate');
    }

    public function setToppings() {
        $this->pizza->addTopping('piña');
        $this->pizza->addTopping('jamón');
    }

    public function getPizza(): Pizza {
        return $this->pizza;
    }
}

// Implementación concreta del Builder: Pizza Vegetariana
class VegetarianPizzaBuilder implements PizzaBuilder {
    private $pizza;

    public function __construct() {
        $this->pizza = new Pizza();
    }

    public function setDough() {
        $this->pizza->setDough('integral');
    }

    public function setSauce() {
        $this->pizza->setSauce('pesto');
    }

    public function setToppings() {
        $this->pizza->addTopping('pimientos');
        $this->pizza->addTopping('aceitunas');
        $this->pizza->addTopping('tomates secos');
    }

    public function getPizza(): Pizza {
        return $this->pizza;
    }
}

// Director: Maneja la construcción de la pizza
class PizzaDirector {
    private $builder;

    public function __construct(PizzaBuilder $builder) {
        $this->builder = $builder;
    }

    public function constructPizza() {
        $this->builder->setDough();
        $this->builder->setSauce();
        $this->builder->setToppings();
    }

    public function getPizza(): Pizza {
        return $this->builder->getPizza();
    }
}

// Crear una pizza hawaiana
$hawaiianBuilder = new HawaiianPizzaBuilder();
$pizzaDirector = new PizzaDirector($hawaiianBuilder);
$pizzaDirector->constructPizza();
$hawaiianPizza = $pizzaDirector->getPizza();

// Crear una pizza vegetariana
$vegetarianBuilder = new VegetarianPizzaBuilder();
$pizzaDirector = new PizzaDirector($vegetarianBuilder);
$pizzaDirector->constructPizza();
$vegetarianPizza = $pizzaDirector->getPizza();

?&gt;
            </pre>
        </div>
    </div>
</body>

</html>