<?php
session_start();

class Usuari
{
    public $nom;
    public $edat;
    public $correu;

    public function __construct($nom, $edat, $correu)
    {
        $this->nom = $nom;
        $this->edat = $edat;
        $this->correu = $correu;
    }

    public function validarDades()
    {
        $errors = [];

        if (!is_numeric($this->edat) || $this->edat <= 0) {
            $errors[] = "La edad tiene que ser un número positivo.";
        }

        $partesCorreo = explode("@", $this->correu);
        if (count($partesCorreo) != 2) {
            $errors[] = "El correo electrónico no tiene el formato correcto.";
        }

        $dominio = $partesCorreo[1];
        if (strpos($dominio, ".") === false) {
            $errors[] = "El correo electronico no tiene un dominio valido.";
        }

        return $errors;
    }
}

if (!isset($_SESSION['usuarios'])) {
    $_SESSION['usuarios'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $edat = $_POST["edat"];
    $correu = $_POST["correu"];

    $usuari = new Usuari($nom, $edat, $correu);
    $errors = $usuari->validarDades();

    if (empty($errors)) {
        $_SESSION['usuarios'][] = $usuari;
        echo "Les dades són vàlides. Usuari guardat en sessió.";
    } else {
        foreach ($errors as $error) {
            echo "<p class='text-red-500'>$error</p>";
        }
    }
}

if (isset($_SESSION['usuarios']) && count($_SESSION['usuarios']) > 0) {
    echo "<h2 class='mt-8 text-xl'>Usuarios creados:</h2>";
    echo "<ul class='list-disc ml-5 mt-4'>";
    foreach ($_SESSION['usuarios'] as $usuari) {
        echo "<li><strong>Nom:</strong> " . htmlspecialchars($usuari->nom) . ", <strong>Edat:</strong> " . htmlspecialchars($usuari->edat) . ", <strong>Correu:</strong> " . htmlspecialchars($usuari->correu) . "</li>";
    }
    echo "</ul>";
} else {
    echo "<p class='text-gray-500'>No hay usuarios creados en la sesión.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joc 3: Formulari d'inscripció amb validació
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="container mx-auto p-8">
        <h1 class="text-2xl text-center mb-4">Validador de Dades</h1>
        <div class="flex justify-end">
            <form method="post" action="destroySesion.php">
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition duration-300">Cerrar Sesión</button>
            </form>
        </div>

        <form method="POST" action="">
            <div class="mb-4">
                <label for="nom" class="block text-lg font-medium text-gray-700">Nom</label>
                <input type="text" id="nom" name="nom" class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
            </div>

            <div class="mb-4">
                <label for="edat" class="block text-lg font-medium text-gray-700">Edat</label>
                <input id="edat" name="edat" class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
            </div>

            <div class="mb-4">
                <label for="correu" class="block text-lg font-medium text-gray-700">Correu Electrònic</label>
                <input id="correu" name="correu" class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-300">Validar Dades</button>
        </form>
    </div>
</body>

</html>