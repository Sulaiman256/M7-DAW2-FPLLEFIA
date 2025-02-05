<?php

include_once '../header.php';
include_once '../footer.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Proxy en PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg text-center">
        <h1 class="text-4xl font-semibold text-gray-800 mb-4">Patrón Proxy en PHP</h1>
        <p class="text-xl text-gray-600 mb-6">
            Actúa como sustituto de un objeto, controlando el acceso y comportamiento del original.
        </p>

        <div class="bg-gray-50 p-4 rounded-lg mb-6 shadow">
            <h2 class="text-2xl font-semibold text-gray-700">Resultado de la carga de datos:</h2>
            <p class="text-lg text-gray-800 mt-2">
                <?php echo $data; ?>
            </p>
            <p class="text-lg text-gray-800 mt-2">
                <?php echo $dataAgain; ?>
            </p>
        </div>

        <div class="text-left text-gray-600 mt-6">
            <h3 class="text-xl font-semibold">Código PHP:</h3>
            <pre class="bg-gray-800 text-white p-4 rounded-lg overflow-auto">
&lt;?php

// Objeto real: Servicio de carga de datos costoso
class RealDataService {
    public function loadData() {
        sleep(2);  // Simulando un proceso costoso (como una consulta a una base de datos)
        return "Datos cargados desde el servicio real.";
    }
}

// Proxy: Controla el acceso al objeto real
class ProxyDataService {
    private $realDataService;
    private $cache;

    public function __construct() {
        $this->realDataService = new RealDataService();
        $this->cache = null;
    }

    public function loadData() {
        // Si ya tenemos los datos en caché, no necesitamos cargar de nuevo
        if ($this->cache === null) {
            $this->cache = $this->realDataService->loadData();
        }

        // Devolver los datos, ya sea de la caché o cargados
        return $this->cache;
    }
}

// Cliente: Accede a los datos a través del Proxy
$proxyService = new ProxyDataService();
$data = $proxyService->loadData();  // La primera vez, se carga desde el objeto real
$dataAgain = $proxyService->loadData();  // La segunda vez, se carga desde la caché (más rápido)

?&gt;
            </pre>
        </div>
    </div>
</body>

</html>