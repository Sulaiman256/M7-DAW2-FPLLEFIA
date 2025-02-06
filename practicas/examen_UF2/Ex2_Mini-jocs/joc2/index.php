<?php
session_start();

class Producte
{
    public $nom;
    public $preu;

    public function __construct($nom, $preu)
    {
        $this->nom = $nom;
        $this->preu = $preu;
    }
}

class CarretCompra
{
    public $productes = array();
    public $total = 0;

    public function afegirProducte($producte)
    {
        $this->productes[] = $producte;
        $this->total += $producte->preu;
    }
}

if (!isset($_SESSION['carret'])) {
    $_SESSION['carret'] = serialize(new CarretCompra());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nom']) && isset($_POST['preu'])) {
    $nom = $_POST['nom'];
    $preu = $_POST['preu'];

    $producte = new Producte($nom, $preu);
    $carret = unserialize($_SESSION['carret']);
    $carret->afegirProducte($producte);

    $_SESSION['carret'] = serialize($carret);
}

$carret = unserialize($_SESSION['carret']);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carret de Compra</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold text-center mb-4">Carret de Compra</h1>

        <div class="flex justify-end">
            <form method="post" action="destroySesion.php">
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition duration-300">Cerrar Sesión</button>
            </form>
        </div>

        <form action="" method="POST" class="mb-8">
            <div class="mb-4">
                <label for="nom" class="block text-lg font-medium text-gray-700">Nom del producte</label>
                <input type="text" id="nom" name="nom" class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
            </div>

            <div class="mb-4">
                <label for="preu" class="block text-lg font-medium text-gray-700">Preu del producte (€)</label>
                <input type="number" id="preu" name="preu" class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Afegir producte al carret</button>
        </form>

        <h2 class="text-xl font-semibold mb-4">Productes al Carret</h2>
        <table class="min-w-full bg-white table-auto border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 border-b text-left">Nom</th>
                    <th class="py-2 px-4 border-b text-left">Preu</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carret->productes as $producte): ?>
                    <tr>
                        <td class="py-2 px-4 border-b"><?php echo $producte->nom ?></td>
                        <td class="py-2 px-4 border-b"><?php echo number_format($producte->preu, 2, ',', '.'); ?> €</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="mt-4 flex justify-between items-center">
            <span class="text-lg font-semibold">Total: </span>
            <span class="text-xl font-bold"><?php echo number_format($carret->total, 2, ',', '.'); ?> €</span>
        </div>
    </div>
</body>

</html>