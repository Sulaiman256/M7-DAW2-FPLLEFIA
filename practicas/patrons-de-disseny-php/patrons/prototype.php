<?php

// La clase Producto: Documento
class Document
{
    private $title;
    private $content;

    public function __construct($title, $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function describe()
    {
        return "Título: $this->title<br>Contenido: $this->content";
    }

    // Método para clonar el documento (Prototype)
    public function clone(): Document
    {
        return clone $this;
    }
}

// Crear un documento base
$originalDocument = new Document("Documento Original", "Este es el contenido del documento original.");
$clonedDocument = $originalDocument->clone();

// Modificar el título y el contenido del documento clonado
$clonedDocument->setTitle("Documento Clonado");
$clonedDocument->setContent("Este es el contenido modificado del documento clonado.");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Prototype en PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg text-center">
        <h1 class="text-4xl font-semibold text-gray-800 mb-4">Patrón Prototype en PHP</h1>
        <p class="text-xl text-gray-600 mb-6">
            Permite copiar objetos existentes sin que el código dependa de las clases específicas de esos objetos.
        </p>

        <div class="bg-gray-50 p-4 rounded-lg mb-6 shadow">
            <h2 class="text-2xl font-semibold text-gray-700">Documento Original:</h2>
            <p class="text-lg text-gray-800 mt-2">
                <?php echo $originalDocument->describe(); ?>
            </p>

            <h2 class="text-2xl font-semibold text-gray-700 mt-6">Documento Clonado:</h2>
            <p class="text-lg text-gray-800 mt-2">
                <?php echo $clonedDocument->describe(); ?>
            </p>
        </div>

        <div class="text-left text-gray-600 mt-6">
            <h3 class="text-xl font-semibold">Código PHP:</h3>
            <pre class="bg-gray-800 text-white p-4 rounded-lg overflow-auto">
&lt;?php

// La clase Producto: Documento
class Document {
    private $title;
    private $content;

    public function __construct($title, $content) {
        $this->title = $title;
        $this->content = $content;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function describe() {
        return "Título: $this->title&lt;br&gt;Contenido: $this->content";
    }

    // Método para clonar el documento (Prototype)
    public function clone(): Document {
        return clone $this;
    }
}

// Crear un documento base
$originalDocument = new Document("Documento Original", "Este es el contenido del documento original.");
$clonedDocument = $originalDocument->clone();

// Modificar el título y el contenido del documento clonado
$clonedDocument->setTitle("Documento Clonado");
$clonedDocument->setContent("Este es el contenido modificado del documento clonado.");

?&gt;
            </pre>
        </div>
    </div>
</body>

</html>