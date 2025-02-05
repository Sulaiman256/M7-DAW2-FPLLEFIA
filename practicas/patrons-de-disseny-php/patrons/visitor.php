<?php

include_once '../header.php';
include_once '../footer.php';

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Visitor en PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg text-center">
        <h1 class="text-4xl font-semibold text-gray-800 mb-4">Patrón Visitor en PHP</h1>
        <p class="text-xl text-gray-600 mb-6">
            Permite separar algoritmos de los objetos sobre los que operan. </p>

        <div class="bg-gray-50 p-4 rounded-lg mb-6 shadow">
            <h2 class="text-2xl font-semibold text-gray-700">Resultados de la Solicitud de Soporte:</h2>
            <p class="text-lg text-gray-800 mt-2">
                <?php
                // Los resultados se generarán mediante las llamadas del código PHP.
                ?>
            </p>
        </div>

        <div class="text-left text-gray-600 mt-6">
            <h3 class="text-xl font-semibold">Código PHP:</h3>
            <pre class="bg-gray-800 text-white p-4 rounded-lg overflow-auto">
&lt;?php

// Interfaz para el visitante
interface SupportVisitor {
    public function visit(Level1SupportRequest $request);
    public function visit(Level2SupportRequest $request);
    public function visit(Level3SupportRequest $request);
}

// Interfaz para los elementos visitables
interface SupportRequest {
    public function accept(SupportVisitor $visitor);
}

// Clase concreta para el problema de nivel 1
class Level1SupportRequest implements SupportRequest {
    private $issue;

    public function __construct($issue) {
        $this->issue = $issue;
    }

    public function getIssue() {
        return $this->issue;
    }

    public function accept(SupportVisitor $visitor) {
        $visitor->visit($this);
    }
}

// Clase concreta para el problema de nivel 2
class Level2SupportRequest implements SupportRequest {
    private $issue;

    public function __construct($issue) {
        $this->issue = $issue;
    }

    public function getIssue() {
        return $this->issue;
    }

    public function accept(SupportVisitor $visitor) {
        $visitor->visit($this);
    }
}

// Clase concreta para el problema de nivel 3
class Level3SupportRequest implements SupportRequest {
    private $issue;

    public function __construct($issue) {
        $this->issue = $issue;
    }

    public function getIssue() {
        return $this->issue;
    }

    public function accept(SupportVisitor $visitor) {
        $visitor->visit($this);
    }
}

// Implementación concreta del visitante
class SupportRequestHandler implements SupportVisitor {
    public function visit(Level1SupportRequest $request) {
        echo "Nivel 1: Resolviendo el problema de soporte básico: {$request->getIssue()}&lt;br&gt;";
    }

    public function visit(Level2SupportRequest $request) {
        echo "Nivel 2: Resolviendo el problema de soporte avanzado: {$request->getIssue()}&lt;br&gt;";
    }

    public function visit(Level3SupportRequest $request) {
        echo "Nivel 3: Resolviendo el problema de soporte especializado: {$request->getIssue()}&lt;br&gt;";
    }
}

// Crear solicitudes
$request1 = new Level1SupportRequest("Problema con la contraseña");
$request2 = new Level2SupportRequest("Problema con la red");
$request3 = new Level3SupportRequest("Problema con el servidor");

// Crear un visitante para manejar las solicitudes
$handler = new SupportRequestHandler();

// Procesar solicitudes
echo "&lt;strong&gt;Procesando solicitud de nivel 1:&lt;/strong&gt;&lt;br&gt;";
$request1->accept($handler);

echo "&lt;strong&gt;Procesando solicitud de nivel 2:&lt;/strong&gt;&lt;br&gt;";
$request2->accept($handler);

echo "&lt;strong&gt;Procesando solicitud de nivel 3:&lt;/strong&gt;&lt;br&gt;";
$request3->accept($handler);

?&gt;
            </pre>
        </div>
    </div>
</body>

</html>