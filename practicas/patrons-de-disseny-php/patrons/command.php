<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Command en PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg text-center">
        <h1 class="text-4xl font-semibold text-gray-800 mb-4">Patrón Command en PHP</h1>
        <p class="text-xl text-gray-600 mb-6">
            Convierte una solicitud en un objeto independiente que contiene toda la información sobre la solicitud. Esta transformación te permite parametrizar los métodos con diferentes solicitudes, retrasar o poner en cola la ejecución de una solicitud y soportar </p>

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

// Interfaz para los comandos
interface Command {
    public function execute();
}

// Receptor
class Support {
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

// Comando Nivel 1
class Level1Command implements Command {
    private $support;
    private $issue;

    public function __construct(Support $support, $issue) {
        $this->support = $support;
        $this->issue = $issue;
    }

    public function execute() {
        $this->support->resolveLevel1Issue($this->issue);
    }
}

// Comando Nivel 2
class Level2Command implements Command {
    private $support;
    private $issue;

    public function __construct(Support $support, $issue) {
        $this->support = $support;
        $this->issue = $issue;
    }

    public function execute() {
        $this->support->resolveLevel2Issue($this->issue);
    }
}

// Comando Nivel 3
class Level3Command implements Command {
    private $support;
    private $issue;

    public function __construct(Support $support, $issue) {
        $this->support = $support;
        $this->issue = $issue;
    }

    public function execute() {
        $this->support->resolveLevel3Issue($this->issue);
    }
}

// Invocador
class SupportRequestInvoker {
    private $command;

    public function setCommand(Command $command) {
        $this->command = $command;
    }

    public function executeCommand() {
        $this->command->execute();
    }
}

// Crear instancia del receptor
$support = new Support();

// Crear comandos específicos
$request1 = new Level1Command($support, "Problema con la contraseña");
$request2 = new Level2Command($support, "Problema con la red");
$request3 = new Level3Command($support, "Problema con el servidor");

// Crear invocador
$invoker = new SupportRequestInvoker();

// Procesar solicitudes
$invoker->setCommand($request1);
$invoker->executeCommand();

$invoker->setCommand($request2);
$invoker->executeCommand();

$invoker->setCommand($request3);
$invoker->executeCommand();

?&gt;
            </pre>
        </div>
    </div>
</body>

</html>