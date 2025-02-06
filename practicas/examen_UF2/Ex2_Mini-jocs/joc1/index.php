<?php

class JocAdivinacio
{
    public $numeroSecret;
    public $intentos = 0;

    public function __construct()
    {
        $this->numeroSecret = rand(1, 20);
        echo "Número secret generat: " . $this->numeroSecret . "<br>";
    }

    public function comprovar($num)
    {
        $this->intentos++;
        if ($num == $this->numeroSecret) {
            return "Felicitats! Has acertat el número secret en $this->intentos intentos.";
        } else if ($this->intentos >= 3) {
            return "Has superat el número d'intentos. El número secret era $this->numeroSecret.";
        } else if ($num < $this->numeroSecret) {
            return "El número secret és més gran. Tens $this->intentos intentos.";
        } else {
            return "El número secret és més petit. Tens $this->intentos intentos.";
        }
    }
}

session_start();

if (!isset($_SESSION['joc'])) {
    $_SESSION['joc'] = new JocAdivinacio();
}

$joc = $_SESSION['joc'];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Endevina el Número Secret</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800 font-sans">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-center mb-6">Endevina el Número Secret</h1>

        <div class="flex justify-end">
            <form method="post" action="destroySesion.php">
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition duration-300">Cerrar Sesión</button>
            </form>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md mt-6">
            <p class="mb-4 text-xl">Endevina el número secret entre 1 i 20.</p>

            <form method="post" action="" class="space-y-4">
                <label for="numero" class="block text-lg font-medium">Introdueix un número:</label>
                <input type="number" id="numero" name="numero" required class="px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

                <button type="submit" class="w-full py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-300">Enviar</button>
            </form>

            <div class="mt-6 text-center">
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $num = intval($_POST['numero']);
                    echo "<p class='text-lg text-gray-700'>" . $joc->comprovar($num) . "</p>";
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>