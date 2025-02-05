<?php

include_once '../header.php';
include_once '../footer.php';


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Mediator en PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg text-center">
        <h1 class="text-4xl font-semibold text-gray-800 mb-4">Patrón Mediator en PHP</h1>
        <p class="text-xl text-gray-600 mb-6">
            Permite reducir las dependencias caóticas entre objetos. El patrón restringe las comunicaciones directas entre los objetos, forzándolos a colaborar únicamente a través de un objeto mediador. </p>

        <div class="bg-gray-50 p-4 rounded-lg mb-6 shadow">
            <h2 class="text-2xl font-semibold text-gray-700">Resultados de la Solicitud de Soporte:</h2>
            <p class="text-lg text-gray-800 mt-2">
                <?php
                // Los resultados se generarán a través del mediador
                ?>
            </p>
        </div>

        <div class="text-left text-gray-600 mt-6">
            <h3 class="text-xl font-semibold">Código PHP:</h3>
            <pre class="bg-gray-800 text-white p-4 rounded-lg overflow-auto">
&lt;?php

// Interfaz Mediator
interface Mediator {
    public function notify($sender, $event);
}

// Clase Receptor que maneja las solicitudes
class Support {
    private $mediator;

    public function __construct(Mediator $mediator) {
        $this->mediator = $mediator;
    }

    public function handleRequest($issue, $level) {
        $this->mediator->notify($this, 'handleRequest');
    }

    public function resolveLevel1Issue($issue) {
        echo "Nivel 1: Resuelto el problema de {$issue}&lt;br&gt;";
    }

    public function resolveLevel2Issue($issue) {
        echo "Nivel 2: Resuelto el problema de {$issue}&lt;br&gt;";
    }

    public function resolveLevel3Issue($issue) {
        echo "Nivel 3: Resuelto el problema de {$issue}&lt;br&gt;";
    }
}

// Mediador concreto que coordina la comunicación entre los compañeros
class SupportMediator implements Mediator {
    private $level1;
    private $level2;
    private $level3;

    public function __construct(Support $level1, Support $level2, Support $level3) {
        $this->level1 = $level1;
        $this->level2 = $level2;
        $this->level3 = $level3;
    }

    public function notify($sender, $event) {
        if ($event == 'handleRequest') {
            if ($sender instanceof Level1Support) {
                $this->level1->resolveLevel1Issue("Problema con la contraseña");
            } elseif ($sender instanceof Level2Support) {
                $this->level2->resolveLevel2Issue("Problema con la red");
            } elseif ($sender instanceof Level3Support) {
                $this->level3->resolveLevel3Issue("Problema con el servidor");
            }
        }
    }
}

// Crear las instancias del Mediador
$mediator = new SupportMediator(
    new Level1Support($mediator),
    new Level2Support($mediator),
    new Level3Support($mediator)
);

// Crear solicitudes de soporte
$request1 = new Level1Support($mediator);
$request2 = new Level2Support($mediator);
$request3 = new Level3Support($mediator);

// Procesar las solicitudes
$request1->handleRequest("Problema con la contraseña");
$request2->handleRequest("Problema con la red");
$request3->handleRequest("Problema con el servidor");

?&gt;
            </pre>
        </div>
    </div>
</body>

</html>