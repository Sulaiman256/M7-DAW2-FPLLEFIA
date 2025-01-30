<?php

// La clase Configuración (Singleton)
class Configuration
{
    // La instancia única de la clase
    private static $instance = null;

    // Propiedades de configuración
    private $settings = [];

    // Constructor privado para evitar instanciación directa
    private function __construct()
    {
        // Aquí se podrían cargar configuraciones desde un archivo, base de datos, etc.
        $this->settings = [
            'site_name' => 'Mi Sitio Web',
            'admin_email' => 'admin@miweb.com',
            'timezone' => 'America/Mexico_City'
        ];
    }

    // Método para obtener la instancia única de la clase
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Configuration();
        }
        return self::$instance;
    }

    // Obtener una configuración por su nombre
    public function get($key)
    {
        return isset($this->settings[$key]) ? $this->settings[$key] : null;
    }

    // Establecer una configuración
    public function set($key, $value)
    {
        $this->settings[$key] = $value;
    }

    // Evitar la clonación de la instancia
    private function __clone() {}

    // Evitar la deserialización de la instancia
    private function __wakeup() {}
}

// Obtener la instancia única de Configuration
$config = Configuration::getInstance();

// Acceder a la configuración
$siteName = $config->get('site_name');
$adminEmail = $config->get('admin_email');
$timezone = $config->get('timezone');

// Cambiar alguna configuración
$config->set('timezone', 'America/New_York');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Singleton en PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg text-center">
        <h1 class="text-4xl font-semibold text-gray-800 mb-4">Patrón Singleton en PHP</h1>
        <p class="text-xl text-gray-600 mb-6">
            Asegura que una clase tenga una única instancia y proporciona un punto de acceso global a esa instancia.
        </p>

        <div class="bg-gray-50 p-4 rounded-lg mb-6 shadow">
            <h2 class="text-2xl font-semibold text-gray-700">Configuraciones Actuales:</h2>
            <p class="text-lg text-gray-800 mt-2">
                <strong>Nombre del Sitio:</strong> <?php echo $siteName; ?><br>
                <strong>Email del Administrador:</strong> <?php echo $adminEmail; ?><br>
                <strong>Zona Horaria:</strong> <?php echo $timezone; ?>
            </p>
        </div>

        <div class="text-left text-gray-600 mt-6">
            <h3 class="text-xl font-semibold">Código PHP:</h3>
            <pre class="bg-gray-800 text-white p-4 rounded-lg overflow-auto">
&lt;?php

// La clase Configuración (Singleton)
class Configuration {
    // La instancia única de la clase
    private static $instance = null;

    // Propiedades de configuración
    private $settings = [];

    // Constructor privado para evitar instanciación directa
    private function __construct() {
        // Aquí se podrían cargar configuraciones desde un archivo, base de datos, etc.
        $this->settings = [
            'site_name' => 'Mi Sitio Web',
            'admin_email' => 'admin@miweb.com',
            'timezone' => 'America/Mexico_City'
        ];
    }

    // Método para obtener la instancia única de la clase
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Configuration();
        }
        return self::$instance;
    }

    // Obtener una configuración por su nombre
    public function get($key) {
        return isset($this->settings[$key]) ? $this->settings[$key] : null;
    }

    // Establecer una configuración
    public function set($key, $value) {
        $this->settings[$key] = $value;
    }

    // Evitar la clonación de la instancia
    private function __clone() {}

    // Evitar la deserialización de la instancia
    private function __wakeup() {}
}

// Obtener la instancia única de Configuration
$config = Configuration::getInstance();

// Acceder a la configuración
$siteName = $config->get('site_name');
$adminEmail = $config->get('admin_email');
$timezone = $config->get('timezone');

// Cambiar alguna configuración
$config->set('timezone', 'America/New_York');

?&gt;
            </pre>
        </div>
    </div>
</body>

</html>