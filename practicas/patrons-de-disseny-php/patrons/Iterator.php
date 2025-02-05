<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Iterator en PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg text-center">
        <h1 class="text-4xl font-semibold text-gray-800 mb-4">Patrón Iterator en PHP</h1>
        <p class="text-xl text-gray-600 mb-6">
            Permite recorrer elementos de una colección sin exponer su representación subyacente (lista, pila, árbol, etc.) </p>

        <div class="bg-gray-50 p-4 rounded-lg mb-6 shadow">
            <h2 class="text-2xl font-semibold text-gray-700">Resultados de la Solicitud de Soporte:</h2>
            <p class="text-lg text-gray-800 mt-2">
                <?php
                // Los resultados ya se están mostrando a través de los comandos ejecutados
                ?>
            </p>
        </div>

        <div class="text-left text-gray-600 mt-6">
            <h3 class="text-xl font-semibold">Código PHP:</h3>
            <pre class="bg-gray-800 text-white p-4 rounded-lg overflow-auto">
&lt;?php

// Interfaz Iterator
interface Iterator {
    public function hasNext();
    public function next();
}

// Interfaz Aggregate
interface Aggregate {
    public function createIterator();
}

// Contenedor Concreto
class SupportRequestCollection implements Aggregate {
    private $requests = [];

    public function addRequest(Command $request) {
        $this->requests[] = $request;
    }

    public function createIterator() {
        return new SupportRequestIterator($this->requests);
    }
}

// Iterador Concreto
class SupportRequestIterator implements Iterator {
    private $requests;
    private $position = 0;

    public function __construct($requests) {
        $this->requests = $requests;
    }

    public function hasNext() {
        return $this->position < count($this->requests);
    }

    public function next() {
        return $this->requests[$this->position++];
    }
}

// Crear instancia del receptor
$support = new Support();

// Crear comandos específicos
$request1 = new Level1Command($support, "Problema con la contraseña");
$request2 = new Level2Command($support, "Problema con la red");
$request3 = new Level3Command($support, "Problema con el servidor");

// Crear colección de solicitudes
$collection = new SupportRequestCollection();
$collection->addRequest($request1);
$collection->addRequest($request2);
$collection->addRequest($request3);

// Crear iterador
$iterator = $collection->createIterator();

// Procesar solicitudes
while ($iterator->hasNext()) {
    $command = $iterator->next();
    $command->execute();
}

?&gt;
            </pre>
        </div>
    </div>
</body>

</html>