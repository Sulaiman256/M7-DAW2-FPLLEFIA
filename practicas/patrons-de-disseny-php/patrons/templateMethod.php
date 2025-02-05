<?php

include_once '../header.php';
include_once '../footer.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Template Method en PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg text-center">
        <h1 class="text-4xl font-semibold text-gray-800 mb-4">Patrón Template Method en PHP</h1>
        <p class="text-xl text-gray-600 mb-6">
            Define el esqueleto de un algoritmo en la superclase, permitiendo que las subclases </p>

        <div class="bg-gray-50 p-4 rounded-lg mb-6 shadow">
            <h2 class="text-2xl font-semibold text-gray-700">Resultados de la Solicitud de Soporte:</h2>
            <p class="text-lg text-gray-800 mt-2">
                <?php
                // Los resultados se generan a través del código PHP
                ?>
            </p>
        </div>

        <div class="text-left text-gray-600 mt-6">
            <h3 class="text-xl font-semibold">Código PHP:</h3>
            <pre class="bg-gray-800 text-white p-4 rounded-lg overflow-auto">
&lt;?php

// Clase Abstracta con el método Template
abstract class SupportHandler {
    // Método template
    public function handleIssue($issue) {
        $this->logIssue($issue);
        $this->processIssue($issue);
        $this->sendResponse($issue);
    }

    // Paso 1: Log de la solicitud (común)
    protected function logIssue($issue) {
        echo "Registrando el problema: {$issue}&lt;br&gt;";
    }

    // Paso 2: Resolver el problema (abstracto, implementado por las subclases)
    abstract protected function processIssue($issue);

    // Paso 3: Enviar respuesta (común)
    protected function sendResponse($issue) {
        echo "Enviando respuesta sobre el problema: {$issue}&lt;br&gt;";
    }
}

// Nivel 1: Soporte técnico
class Level1Support extends SupportHandler {
    protected function processIssue($issue) {
        echo "Nivel 1: Resolviendo el problema básico de {$issue}&lt;br&gt;";
    }
}

// Nivel 2: Soporte de red
class Level2Support extends SupportHandler {
    protected function processIssue($issue) {
        echo "Nivel 2: Resolviendo el problema avanzado de {$issue}&lt;br&gt;";
    }
}

// Nivel 3: Soporte especializado
class Level3Support extends SupportHandler {
    protected function processIssue($issue) {
        echo "Nivel 3: Resolviendo el problema crítico de {$issue}&lt;br&gt;";
    }
}

// Crear instancias de los niveles de soporte
$level1 = new Level1Support();
$level2 = new Level2Support();
$level3 = new Level3Support();

// Procesar solicitudes
echo "&lt;strong&gt;Procesando solicitud con Nivel 1:&lt;/strong&gt;&lt;br&gt;";
$level1->handleIssue("Problema con la contraseña");

echo "&lt;strong&gt;Procesando solicitud con Nivel 2:&lt;/strong&gt;&lt;br&gt;";
$level2->handleIssue("Problema con la red");

echo "&lt;strong&gt;Procesando solicitud con Nivel 3:&lt;/strong&gt;&lt;br&gt;";
$level3->handleIssue("Problema con el servidor");

?&gt;
            </pre>
        </div>
    </div>
</body>

</html>