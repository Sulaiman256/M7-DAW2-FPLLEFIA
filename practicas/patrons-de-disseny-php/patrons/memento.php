<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Memento en PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg text-center">
        <h1 class="text-4xl font-semibold text-gray-800 mb-4">Patrón Memento en PHP</h1>
        <p class="text-xl text-gray-600 mb-6">
            Permite guardar y restaurar el estado previo de un objeto sin revelar los detalles de su implementación
        </p>

        <div class="bg-gray-50 p-4 rounded-lg mb-6 shadow">
            <h2 class="text-2xl font-semibold text-gray-700">Resultados de la Solicitud de Soporte:</h2>
            <p class="text-lg text-gray-800 mt-2">
                <?php
                // Los resultados se generarán a través del código PHP
                ?>
            </p>
        </div>

        <div class="text-left text-gray-600 mt-6">
            <h3 class="text-xl font-semibold">Código PHP:</h3>
            <pre class="bg-gray-800 text-white p-4 rounded-lg overflow-auto">
&lt;?php

// Memento: almacena el estado del Originator (en este caso, el nivel de soporte)
class Memento {
    private $state;

    public function __construct($state) {
        $this->state = $state;
    }

    public function getState() {
        return $this->state;
    }
}

// Originator: el objeto cuyo estado queremos guardar y restaurar
class Support {
    private $issue;
    private $level;

    public function __construct($issue, $level) {
        $this->issue = $issue;
        $this->level = $level;
    }

    public function getState() {
        return "Problema: {$this->issue}, Nivel: {$this->level}";
    }

    public function setState($issue, $level) {
        $this->issue = $issue;
        $this->level = $level;
    }

    // Crear un memento para guardar el estado actual
    public function createMemento() {
        return new Memento($this->getState());
    }

    // Restaurar el estado desde un memento
    public function restore(Memento $memento) {
        $state = $memento->getState();
        list($this->issue, $this->level) = explode(', ', $state);
        $this->level = str_replace('Nivel: ', '', $this->level);
        $this->issue = str_replace('Problema: ', '', $this->issue);
    }

    public function display() {
        echo "Estado actual: {$this->getState()}&lt;br&gt;";
    }
}

// Caretaker: el objeto responsable de manejar los recuerdos
class Caretaker {
    private $mementos = [];

    public function addMemento(Memento $memento) {
        $this->mementos[] = $memento;
    }

    public function getMemento($index) {
        return $this->mementos[$index];
    }
}

// Crear instancias de los niveles de soporte
$support = new Support("Problema con la contraseña", 1);
$caretaker = new Caretaker();

// Mostrar el estado inicial
$support->display();

// Guardar el estado inicial
$caretaker->addMemento($support->createMemento());

// Cambiar el estado
$support->setState("Problema con la red", 2);
$support->display();

// Guardar el estado cambiado
$caretaker->addMemento($support->createMemento());

// Cambiar de nuevo el estado
$support->setState("Problema con el servidor", 3);
$support->display();

// Restaurar el primer estado guardado
$support->restore($caretaker->getMemento(0));
$support->display();

// Restaurar el segundo estado guardado
$support->restore($caretaker->getMemento(1));
$support->display();

?&gt;
            </pre>
        </div>
    </div>
</body>

</html>