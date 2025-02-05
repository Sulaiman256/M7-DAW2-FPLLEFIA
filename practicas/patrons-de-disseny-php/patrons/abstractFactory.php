<?php
include_once '../header.php';
include_once '../footer.php';


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Abstract Factory en PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg text-center">
        <h1 class="text-4xl font-semibold text-gray-800 mb-4">Patrón Abstract Factory en PHP</h1>
        <p class="text-xl text-gray-600 mb-6">
            Permite crear familias de objetos relacionados sin definir sus clases específicas.
        </p>

        <div class="bg-gray-50 p-4 rounded-lg mb-6 shadow">
            <h2 class="text-2xl font-semibold text-gray-700">Interfaz de Windows:</h2>
            <p class="text-lg text-gray-800 mt-2">
                <?php
                // Interfaz de Windows
                ?>
            </p>

            <h2 class="text-2xl font-semibold text-gray-700 mt-6">Interfaz de Mac:</h2>
            <p class="text-lg text-gray-800 mt-2">
                <?php
                // Interfaz de Mac
                ?>
            </p>
        </div>

        <div class="text-left text-gray-600 mt-6">
            <h3 class="text-xl font-semibold">Código PHP:</h3>
            <pre class="bg-gray-800 text-white p-4 rounded-lg overflow-auto">
&lt;?php

// Interfaz para los botones
interface Button {
    public function render(): string;
}

// Interfaz para los cuadros de texto
interface TextBox {
    public function render(): string;
}

// Fabrica abstracta: define los métodos para crear los componentes
abstract class GUIFactory {
    abstract public function createButton(): Button;
    abstract public function createTextBox(): TextBox;
}

// Fabrica concreta para el sistema Windows
class WindowsFactory extends GUIFactory {
    public function createButton(): Button {
        return new WindowsButton();
    }

    public function createTextBox(): TextBox {
        return new WindowsTextBox();
    }
}

// Fabrica concreta para el sistema Mac
class MacFactory extends GUIFactory {
    public function createButton(): Button {
        return new MacButton();
    }

    public function createTextBox(): TextBox {
        return new MacTextBox();
    }
}

// Implementación de un botón específico para Windows
class WindowsButton implements Button {
    public function render(): string {
        return "Botón de Windows";
    }
}

// Implementación de un cuadro de texto específico para Windows
class WindowsTextBox implements TextBox {
    public function render(): string {
        return "Cuadro de texto de Windows";
    }
}

// Implementación de un botón específico para Mac
class MacButton implements Button {
    public function render(): string {
        return "Botón de Mac";
    }
}

// Implementación de un cuadro de texto específico para Mac
class MacTextBox implements TextBox {
    public function render(): string {
        return "Cuadro de texto de Mac";
    }
}

// Cliente: Usa la fábrica abstracta para crear los componentes
function clientCode(GUIFactory $factory) {
    $button = $factory->createButton();
    $textBox = $factory->createTextBox();

    echo $button->render() . "<br>";
    echo $textBox->render() . "<br>";
}

// Usar la fábrica Windows
echo "<h2>Interfaz de Windows:</h2>";
clientCode(new WindowsFactory());

// Usar la fábrica Mac
echo "<h2>Interfaz de Mac:</h2>";
clientCode(new MacFactory());

?&gt;
            </pre>
        </div>
    </div>
</body>

</html>