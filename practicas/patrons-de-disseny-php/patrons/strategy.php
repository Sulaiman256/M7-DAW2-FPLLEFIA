<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Strategy en PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg text-center">
        <h1 class="text-4xl font-semibold text-gray-800 mb-4">Patrón Strategy en PHP</h1>
        <p class="text-xl text-gray-600 mb-6">
            Permite definir una familia de algoritmos, colocarlos en clases separadas y hacerlos intercambiables. </p>

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

// Interfaz Strategy
interface SupportStrategy {
    public function resolveIssue($issue);
}

// Estrategia de resolución para problemas técnicos
class TechnicalSupportStrategy implements SupportStrategy {
    public function resolveIssue($issue) {
        echo "Resolviendo el problema técnico: {$issue}&lt;br&gt;";
    }
}

// Estrategia de resolución para problemas de red
class NetworkSupportStrategy implements SupportStrategy {
    public function resolveIssue($issue) {
        echo "Resolviendo el problema de red: {$issue}&lt;br&gt;";
    }
}

// Estrategia de resolución para problemas de software
class SoftwareSupportStrategy implements SupportStrategy {
    public function resolveIssue($issue) {
        echo "Resolviendo el problema de software: {$issue}&lt;br&gt;";
    }
}

// Clase Contexto (Solicitud de Soporte)
class Request {
    private $strategy;

    public function __construct(SupportStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(SupportStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function processRequest($issue) {
        $this->strategy->resolveIssue($issue);
    }
}

// Crear estrategias
$technicalSupport = new TechnicalSupportStrategy();
$networkSupport = new NetworkSupportStrategy();
$softwareSupport = new SoftwareSupportStrategy();

// Crear solicitud y procesar con estrategia de soporte técnico
$request = new Request($technicalSupport);
echo "&lt;strong&gt;Usando estrategia de soporte técnico:&lt;/strong&gt;&lt;br&gt;";
$request->processRequest("Problema con la instalación de hardware");

// Cambiar la estrategia a soporte de red
$request->setStrategy($networkSupport);
echo "&lt;strong&gt;Cambiando a estrategia de soporte de red:&lt;/strong&gt;&lt;br&gt;";
$request->processRequest("Problema con la conectividad a Internet");

// Cambiar la estrategia a soporte de software
$request->setStrategy($softwareSupport);
echo "&lt;strong&gt;Cambiando a estrategia de soporte de software:&lt;/strong&gt;&lt;br&gt;";
$request->processRequest("Problema con el sistema operativo");

?&gt;
            </pre>
        </div>
    </div>
</body>

</html>