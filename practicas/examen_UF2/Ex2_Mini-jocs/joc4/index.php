<?php
session_start();

class Factura
{
    public $client;
    public $producte;
    public $quantitat;
    public $preuUnitari;

    public function __construct($client, $producte, $quantitat, $preuUnitari)
    {
        $this->client = $client;
        $this->producte = $producte;
        $this->quantitat = $quantitat;
        $this->preuUnitari = $preuUnitari;
    }

    public function calcularTotal()
    {
        return $this->quantitat * $this->preuUnitari;
    }

    public function aplicarDescompte($percentatge)
    {
        $total = $this->calcularTotal();
        return $total - ($total * ($percentatge / 100));
    }
}

if (!isset($_SESSION['factures'])) {
    $_SESSION['factures'] = [];

    $clients = ['Client 1', 'Client 2', 'Client 3', 'Client 4', 'Client 5'];
    $productes = ['Producte A', 'Producte B', 'Producte C', 'Producte D', 'Producte E'];

    for ($i = 0; $i < 5; $i++) {
        $client = $clients[array_rand($clients)];
        $producte = $productes[array_rand($productes)];
        $quantitat = rand(1, 10);
        $preuUnitari = rand(10, 100);

        $factura = new Factura($client, $producte, $quantitat, $preuUnitari);
        $_SESSION['factures'][] = $factura;
    }

    $facturaDescuento = rand(0, 4);
    $percentatgeDescompte = rand(5, 30);
    $factura = $_SESSION['factures'][$facturaDescuento];
    $factura->aplicarDescompte($percentatgeDescompte);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joc 4: Factures amb descompte</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="container mx-auto p-8">
        <h1 class="text-2xl text-center mb-4">Factures amb Descompte</h1>

        <table class="min-w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">Client</th>
                    <th class="border px-4 py-2">Producte</th>
                    <th class="border px-4 py-2">Quantitat</th>
                    <th class="border px-4 py-2">Preu Unitari</th>
                    <th class="border px-4 py-2">Total</th>
                    <th class="border px-4 py-2">Total amb Descompte</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['factures'] as $index => $factura) : ?>
                    <tr class="<?= $index % 2 == 0 ? 'bg-gray-100' : '' ?>">
                        <td class="border px-4 py-2"><?= $factura->client ?></td>
                        <td class="border px-4 py-2"><?= $factura->producte ?></td>
                        <td class="border px-4 py-2"><?= $factura->quantitat ?></td>
                        <td class="border px-4 py-2"><?= number_format($factura->preuUnitari, 2) ?> €</td>
                        <td class="border px-4 py-2"><?= number_format($factura->calcularTotal(), 2) ?> €</td>
                        <td class="border px-4 py-2">
                            <?= number_format($factura->aplicarDescompte(rand(5, 30)), 2) ?> €
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>