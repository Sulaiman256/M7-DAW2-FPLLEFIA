<?php

// Interfaz de manejador
interface SupportHandler
{
    public function setNext(SupportHandler $handler);
    public function handle(Request $request);
}

// Clase base de la solicitud
class Request
{
    private $issue;
    private $level;

    public function __construct($issue, $level)
    {
        $this->issue = $issue;
        $this->level = $level;
    }

    public function getIssue()
    {
        return $this->issue;
    }

    public function getLevel()
    {
        return $this->level;
    }
}

// Clase para Soporte de Nivel 1
class Level1Support implements SupportHandler
{
    private $nextHandler;

    public function setNext(SupportHandler $handler)
    {
        $this->nextHandler = $handler;
    }

    public function handle(Request $request)
    {
        if ($request->getLevel() == 1) {
            echo "Nivel 1: Resuelto el problema de {$request->getIssue()}<br>";
        } elseif ($this->nextHandler != null) {
            echo "Nivel 1: No puedo resolver este problema, escalando...<br>";
            $this->nextHandler->handle($request);
        }
    }
}

// Clase para Soporte de Nivel 2
class Level2Support implements SupportHandler
{
    private $nextHandler;

    public function setNext(SupportHandler $handler)
    {
        $this->nextHandler = $handler;
    }

    public function handle(Request $request)
    {
        if ($request->getLevel() == 2) {
            echo "Nivel 2: Resuelto el problema de {$request->getIssue()}<br>";
        } elseif ($this->nextHandler != null) {
            echo "Nivel 2: No puedo resolver este problema, escalando...<br>";
            $this->nextHandler->handle($request);
        }
    }
}

// Clase para Soporte de Nivel 3
class Level3Support implements SupportHandler
{
    private $nextHandler;

    public function setNext(SupportHandler $handler)
    {
        $this->nextHandler = $handler;
    }

    public function handle(Request $request)
    {
        if ($request->getLevel() == 3) {
            echo "Nivel 3: Resuelto el problema de {$request->getIssue()}<br>";
        } elseif ($this->nextHandler != null) {
            echo "Nivel 3: No puedo resolver este problema, escalando...<br>";
            $this->nextHandler->handle($request);
        }
    }
}

// Crear instancias de los niveles de soporte
$level1 = new Level1Support();
$level2 = new Level2Support();
$level3 = new Level3Support();

// Establecer la cadena de responsabilidad
$level1->setNext($level2);
$level2->setNext($level3);

// Crear solicitudes
$request1 = new Request("Problema con la contraseña", 1);
$request2 = new Request("Problema con la red", 2);
$request3 = new Request("Problema con el servidor", 3);

// Procesar solicitudes
$level1->handle($request1);
$level1->handle($request2);
$level1->handle($request3);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Chain of Responsibility en PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg text-center">
        <h1 class="text-4xl font-semibold text-gray-800 mb-4">Patrón Chain of Responsibility en PHP</h1>
        <p class="text-xl text-gray-600 mb-6">
            Este ejemplo muestra cómo usar el patrón Chain of Responsibility para manejar solicitudes de soporte técnico en diferentes niveles.
        </p>

        <div class="bg-gray-50 p-4 rounded-lg mb-6 shadow">
            <h2 class="text-2xl font-semibold text-gray-700">Resultados de la Solicitud de Soporte:</h2>
            <p class="text-lg text-gray-800 mt-2">
                <?php
                // Los resultados se mostrarán por las llamadas de los handlers en PHP
                ?>
            </p>
        </div>

        <div class="text-left text-gray-600 mt-6">
            <h3 class="text-xl font-semibold">Código PHP:</h3>
            <pre class="bg-gray-800 text-white p-4 rounded-lg overflow-auto">
&lt;?php

// Interfaz de manejador
interface SupportHandler {
    public function setNext(SupportHandler $handler);
    public function handle(Request $request);
}

// Clase base de la solicitud
class Request {
    private $issue;
    private $level;

    public function __construct($issue, $level) {
        $this->issue = $issue;
        $this->level = $level;
    }

    public function getIssue() {
        return $this->issue;
    }

    public function getLevel() {
        return $this->level;
    }
}

// Clase para Soporte de Nivel 1
class Level1Support implements SupportHandler {
    private $nextHandler;

    public function setNext(SupportHandler $handler) {
        $this->nextHandler = $handler;
    }

    public function handle(Request $request) {
        if ($request->getLevel() == 1) {
            echo "Nivel 1: Resuelto el problema de {$request->getIssue()}&lt;br&gt;";
        } elseif ($this->nextHandler != null) {
            echo "Nivel 1: No puedo resolver este problema, escalando...&lt;br&gt;";
            $this->nextHandler->handle($request);
        }
    }
}

// Clase para Soporte de Nivel 2
class Level2Support implements SupportHandler {
    private $nextHandler;

    public function setNext(SupportHandler $handler) {
        $this->nextHandler = $handler;
    }

    public function handle(Request $request) {
        if ($request->getLevel() == 2) {
            echo "Nivel 2: Resuelto el problema de {$request->getIssue()}&lt;br&gt;";
        } elseif ($this->nextHandler != null) {
            echo "Nivel 2: No puedo resolver este problema, escalando...&lt;br&gt;";
            $this->nextHandler->handle($request);
        }
    }
}

// Clase para Soporte de Nivel 3
class Level3Support implements SupportHandler {
    private $nextHandler;

    public function setNext(SupportHandler $handler) {
        $this->nextHandler = $handler;
    }

    public function handle(Request $request) {
        if ($request->getLevel() == 3) {
            echo "Nivel 3: Resuelto el problema de {$request->getIssue()}&lt;br&gt;";
        } elseif ($this->nextHandler != null) {
            echo "Nivel 3: No puedo resolver este problema, escalando...&lt;br&gt;";
            $this->nextHandler->handle($request);
        }
    }
}

// Crear instancias de los niveles de soporte
$level1 = new Level1Support();
$level2 = new Level2Support();
$level3 = new Level3Support();

// Establecer la cadena de responsabilidad
$level1->setNext($level2);
$level2->setNext($level3);

// Crear solicitudes
$request1 = new Request("Problema con la contraseña", 1);
$request2 = new Request("Problema con la red", 2);
$request3 = new Request("Problema con el servidor", 3);

// Procesar solicitudes
$level1->handle($request1);
$level1->handle($request2);
$level1->handle($request3);

?&gt;
            </pre>
        </div>
    </div>
</body>

</html>