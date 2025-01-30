<?php

// Interfaz: Definir el contrato para las notificaciones
interface Notification
{
    public function send($message);
}

// Clase concreta: Enviar una notificación por correo electrónico
class EmailNotification implements Notification
{
    public function send($message)
    {
        return "Enviando correo electrónico con el mensaje: " . $message;
    }
}

// Clase concreta: Enviar una notificación por SMS
class SMSNotification implements Notification
{
    public function send($message)
    {
        return "Enviando SMS con el mensaje: " . $message;
    }
}

// Clase abstracta: Define el Factory Method
abstract class NotificationFactory
{
    abstract public function createNotification(): Notification;

    public function notify($message)
    {
        $notification = $this->createNotification();
        return $notification->send($message);
    }
}

// Factoria concreta: Crea un correo electrónico
class EmailNotificationFactory extends NotificationFactory
{
    public function createNotification(): Notification
    {
        return new EmailNotification();
    }
}

// Factoria concreta: Crea un SMS
class SMSNotificationFactory extends NotificationFactory
{
    public function createNotification(): Notification
    {
        return new SMSNotification();
    }
}

// Cliente: Utiliza el Factory Method para crear las notificaciones
$emailFactory = new EmailNotificationFactory();
$emailMessage = $emailFactory->notify("¡Bienvenido a nuestra plataforma!");

$smsFactory = new SMSNotificationFactory();
$smsMessage = $smsFactory->notify("Tu código de verificación es 123456");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Factory Method en PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg text-center">
        <h1 class="text-4xl font-semibold text-gray-800 mb-4">Patrón Factory Method en PHP</h1>
        <p class="text-xl text-gray-600 mb-6">
            Proporciona una base la cual tendra una superclase y ademas las subclases podran alterar los objetos que se vayan creando </p>

        <div class="bg-gray-50 p-4 rounded-lg mb-6 shadow">
            <h2 class="text-2xl font-semibold text-gray-700">Resultado de las Notificaciones:</h2>
            <p class="text-lg text-gray-800 mt-2">
                <?php echo $emailMessage; ?>
            </p>
            <p class="text-lg text-gray-800 mt-2">
                <?php echo $smsMessage; ?>
            </p>
        </div>

        <div class="text-left text-gray-600 mt-6">
            <h3 class="text-xl font-semibold">Código PHP:</h3>
            <pre class="bg-gray-800 text-white p-4 rounded-lg overflow-auto">
&lt;?php

// Interfaz: Definir el contrato para las notificaciones
interface Notification {
    public function send($message);
}

// Clase concreta: Enviar una notificación por correo electrónico
class EmailNotification implements Notification {
    public function send($message) {
        return "Enviando correo electrónico con el mensaje: " . $message;
    }
}

// Clase concreta: Enviar una notificación por SMS
class SMSNotification implements Notification {
    public function send($message) {
        return "Enviando SMS con el mensaje: " . $message;
    }
}

// Clase abstracta: Define el Factory Method
abstract class NotificationFactory {
    abstract public function createNotification(): Notification;

    public function notify($message) {
        $notification = $this->createNotification();
        return $notification->send($message);
    }
}

// Factoria concreta: Crea un correo electrónico
class EmailNotificationFactory extends NotificationFactory {
    public function createNotification(): Notification {
        return new EmailNotification();
    }
}

// Factoria concreta: Crea un SMS
class SMSNotificationFactory extends NotificationFactory {
    public function createNotification(): Notification {
        return new SMSNotification();
    }
}

// Cliente: Utiliza el Factory Method para crear las notificaciones
$emailFactory = new EmailNotificationFactory();
$emailMessage = $emailFactory->notify("¡Bienvenido a nuestra plataforma!");

$smsFactory = new SMSNotificationFactory();
$smsMessage = $smsFactory->notify("Tu código de verificación es 123456");

?&gt;
            </pre>
        </div>
    </div>
</body>

</html>