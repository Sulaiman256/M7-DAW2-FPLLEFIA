<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón State en PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg text-center">
        <h1 class="text-4xl font-semibold text-gray-800 mb-4">Patrón State en PHP</h1>
        <p class="text-xl text-gray-600 mb-6">
            Define un sistema de suscripción para notificar a múltiples objetos sobre eventos de un objeto observado. </p>

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

// Interfaz de Estado
interface State {
    public function handle();
}

// Clase Contexto (Solicitud de soporte)
class Request {
    private $state;

    public function __construct(State $state) {
        $this->state = $state;
    }

    public function setState(State $state) {
        $this->state = $state;
    }

    public function processRequest() {
        $this->state->handle();
    }
}

// Estado "Pendiente"
class PendingState implements State {
    public function handle() {
        echo "La solicitud está pendiente. Aún no se ha procesado.&lt;br&gt;";
    }
}

// Estado "En Proceso"
class InProgressState implements State {
    public function handle() {
        echo "La solicitud está en proceso de resolución.&lt;br&gt;";
    }
}

// Estado "Resuelto"
class ResolvedState implements State {
    public function handle() {
        echo "La solicitud ha sido resuelta.&lt;br&gt;";
    }
}

// Crear instancias de los estados
$pendingState = new PendingState();
$inProgressState = new InProgressState();
$resolvedState = new ResolvedState();

// Crear una solicitud con el estado inicial "Pendiente"
$request = new Request($pendingState);
echo "&lt;strong&gt;Estado Inicial:&lt;/strong&gt;&lt;br&gt;";
$request->processRequest();

// Cambiar el estado a "En Proceso"
$request->setState($inProgressState);
echo "&lt;strong&gt;Cambiando al estado 'En Proceso'&lt;/strong&gt;:&lt;br&gt;";
$request->processRequest();

// Cambiar el estado a "Resuelto"
$request->setState($resolvedState);
echo "&lt;strong&gt;Cambiando al estado 'Resuelto'&lt;/strong&gt;:&lt;br&gt;";
$request->processRequest();

?&gt;
            </pre>
        </div>
    </div>
</body>

</html>