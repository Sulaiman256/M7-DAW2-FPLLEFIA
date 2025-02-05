<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Observer en PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg text-center">
        <h1 class="text-4xl font-semibold text-gray-800 mb-4">Patrón Observer en PHP</h1>
        <p class="text-xl text-gray-600 mb-6">
            Define un mecanismo de suscripción para notificar a varios objetos sobre eventos de un objeto observado.
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

// Interfaz Observer
interface Observer {
    public function update($issue, $level);
}

// Sujeto (Subject)
class Request {
    private $issue;
    private $level;
    private $observers = [];

    public function __construct($issue, $level) {
        $this->issue = $issue;
        $this->level = $level;
    }

    // Agregar observador
    public function addObserver(Observer $observer) {
        $this->observers[] = $observer;
    }

    // Eliminar observador
    public function removeObserver(Observer $observer) {
        $key = array_search($observer, $this->observers);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    // Notificar a los observadores
    public function notifyObservers() {
        foreach ($this->observers as $observer) {
            $observer->update($this->issue, $this->level);
        }
    }

    // Cambiar estado y notificar a los observadores
    public function setState($issue, $level) {
        $this->issue = $issue;
        $this->level = $level;
        $this->notifyObservers();  // Notificar a todos los observadores sobre el cambio
    }

    public function getState() {
        return "Problema: {$this->issue}, Nivel: {$this->level}";
    }
}

// Observador concreto para Soporte de Nivel 1
class Level1Support implements Observer {
    public function update($issue, $level) {
        if ($level == 1) {
            echo "Nivel 1: Resuelto el problema de {$issue}.&lt;br&gt;";
        } else {
            echo "Nivel 1: No puedo resolver este problema, esperando a que el nivel adecuado se encargue.&lt;br&gt;";
        }
    }
}

// Observador concreto para Soporte de Nivel 2
class Level2Support implements Observer {
    public function update($issue, $level) {
        if ($level == 2) {
            echo "Nivel 2: Resuelto el problema de {$issue}.&lt;br&gt;";
        } else {
            echo "Nivel 2: No puedo resolver este problema, esperando a que el nivel adecuado se encargue.&lt;br&gt;";
        }
    }
}

// Observador concreto para Soporte de Nivel 3
class Level3Support implements Observer {
    public function update($issue, $level) {
        if ($level == 3) {
            echo "Nivel 3: Resuelto el problema de {$issue}.&lt;br&gt;";
        } else {
            echo "Nivel 3: No puedo resolver este problema, esperando a que el nivel adecuado se encargue.&lt;br&gt;";
        }
    }
}

// Crear la solicitud de soporte
$request = new Request("Problema con la contraseña", 1);

// Crear los niveles de soporte
$level1 = new Level1Support();
$level2 = new Level2Support();
$level3 = new Level3Support();

// Registrar los niveles de soporte como observadores
$request->addObserver($level1);
$request->addObserver($level2);
$request->addObserver($level3);

// Cambiar el estado de la solicitud y notificar a los observadores
$request->setState("Problema con la red", 2);
$request->setState("Problema con el servidor", 3);

?&gt;
            </pre>
        </div>
    </div>
</body>

</html>