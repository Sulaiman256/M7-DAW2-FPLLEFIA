<?php

// Subsistema 1: Procesar pago
class PaymentProcessor
{
    public function processPayment($amount)
    {
        return "Procesando pago de \$" . $amount;
    }
}

// Subsistema 2: Enviar productos
class ShippingService
{
    public function shipProduct($product)
    {
        return "Enviando producto: " . $product;
    }
}

// Subsistema 3: Generar factura
class InvoiceGenerator
{
    public function generateInvoice($orderDetails)
    {
        return "Generando factura para el pedido: " . $orderDetails;
    }
}

// Facade: Interfaz simplificada para interactuar con los subsistemas
class OrderFacade
{
    private $paymentProcessor;
    private $shippingService;
    private $invoiceGenerator;

    public function __construct()
    {
        $this->paymentProcessor = new PaymentProcessor();
        $this->shippingService = new ShippingService();
        $this->invoiceGenerator = new InvoiceGenerator();
    }

    public function placeOrder($product, $amount)
    {
        $paymentResult = $this->paymentProcessor->processPayment($amount);
        $shippingResult = $this->shippingService->shipProduct($product);
        $invoiceResult = $this->invoiceGenerator->generateInvoice("Producto: " . $product . " por \$" . $amount);

        return $paymentResult . "\n" . $shippingResult . "\n" . $invoiceResult;
    }
}

// Crear un pedido utilizando el Facade
$orderFacade = new OrderFacade();
$orderResult = $orderFacade->placeOrder("Café Especial", 12);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Facade en PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg text-center">
        <h1 class="text-4xl font-semibold text-gray-800 mb-4">Patrón Facade en PHP</h1>
        <p class="text-xl text-gray-600 mb-6">
            Simplifica el uso de un sistema complejo al ofrecer una interfaz más sencilla.
        </p>

        <div class="bg-gray-50 p-4 rounded-lg mb-6 shadow">
            <h2 class="text-2xl font-semibold text-gray-700">Resultado del Pedido:</h2>
            <pre class="text-lg text-gray-800 mt-2">
                <?php echo nl2br($orderResult); ?>
            </pre>
        </div>

        <div class="text-left text-gray-600 mt-6">
            <h3 class="text-xl font-semibold">Código PHP:</h3>
            <pre class="bg-gray-800 text-white p-4 rounded-lg overflow-auto">
&lt;?php

// Subsistema 1: Procesar pago
class PaymentProcessor {
    public function processPayment($amount) {
        return "Procesando pago de \$" . $amount;
    }
}

// Subsistema 2: Enviar productos
class ShippingService {
    public function shipProduct($product) {
        return "Enviando producto: " . $product;
    }
}

// Subsistema 3: Generar factura
class InvoiceGenerator {
    public function generateInvoice($orderDetails) {
        return "Generando factura para el pedido: " . $orderDetails;
    }
}

// Facade: Interfaz simplificada para interactuar con los subsistemas
class OrderFacade {
    private $paymentProcessor;
    private $shippingService;
    private $invoiceGenerator;

    public function __construct() {
        $this->paymentProcessor = new PaymentProcessor();
        $this->shippingService = new ShippingService();
        $this->invoiceGenerator = new InvoiceGenerator();
    }

    public function placeOrder($product, $amount) {
        $paymentResult = $this->paymentProcessor->processPayment($amount);
        $shippingResult = $this->shippingService->shipProduct($product);
        $invoiceResult = $this->invoiceGenerator->generateInvoice("Producto: " . $product . " por \$" . $amount);
        
        return $paymentResult . "\n" . $shippingResult . "\n" . $invoiceResult;
    }
}

// Crear un pedido utilizando el Facade
$orderFacade = new OrderFacade();
$orderResult = $orderFacade->placeOrder("Café Especial", 12);

?&gt;
            </pre>
        </div>
    </div>
</body>

</html>