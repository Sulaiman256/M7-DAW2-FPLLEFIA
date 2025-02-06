<?php
session_start();

class Habitacio

{
    public $tipus;
    public $preu;
    public $disponible;

    public function __construct($tipus, $preu, $disponible)
    {
        $this->tipus = $tipus;
        $this->preu = $preu;
        $this->disponible = $disponible;
    }

    public function mostrarInfo()
    {
        return "Tipus: " . $this->tipus . ", Preu: " . $this->preu . "€, Disponible: " . ($this->disponible ? "Si" : "No");
    }
}

class Hotel
{
    public $habitaciones = array();

    public function __construct()
    {
        $this->habitaciones[] = new Habitacio("Standard", 150, true);
        $this->habitaciones[] = new Habitacio("Deluxe", 200, false);
        $this->habitaciones[] = new Habitacio("Suite", 300, true);
    }

    public function llistarHabitacions()
    {
        $availableRooms = [];
        foreach ($this->habitaciones as $habitacio) {
            if ($habitacio->disponible) {
                $availableRooms[] = $habitacio->mostrarInfo();
            }
        }
        return $availableRooms;
    }

    public function reservarHabitacio($tipus)
    {
        foreach ($this->habitaciones as $habitacio) {
            if ($habitacio->tipus == $tipus && $habitacio->disponible) {
                $habitacio->disponible = false;
                return "La habitacion de tipo $tipus ha sido reservada.";
            }
        }
        return "No se ha podido reservar ninguna habitacion disponible del tipus $tipus.";
    }

    public function mostrarDisponibilitat()
    {
        return $this->habitaciones;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reservar"])) {
    $hotel = $_SESSION['hotel'];
    $tipus = $_POST['tipusHabitacio'];
    $reservaResult = $hotel->reservarHabitacio($tipus);
    $_SESSION['reservaResult'] = $reservaResult;
}

if (!isset($_SESSION['hotel'])) {
    $_SESSION['hotel'] = new Hotel();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Reserva de Habitaciones</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="container mx-auto p-8">
        <h1 class="text-2xl text-center mb-4">Sistema de Reserva d'Habitacions</h1>

        <div class="flex justify-end">
            <form method="post" action="destroySesion.php">
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition duration-300">Cerrar Sesión</button>
            </form>
        </div>

        <?php
        if (isset($_SESSION['reservaResult'])) {
            echo "<p class='text-green-500 text-center'>" . $_SESSION['reservaResult'] . "</p>";
            unset($_SESSION['reservaResult']);
        }
        ?>

        <form method="POST" action="">
            <div class="mb-4">
                <label for="tipusHabitacio" class="block text-lg font-medium text-gray-700">Selecciona el tipus d'habitació:</label>
                <select name="tipusHabitacio" id="tipusHabitacio" class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
                    <?php
                    $hotel = $_SESSION['hotel'];
                    $availableRooms = $hotel->llistarHabitacions();

                    foreach ($availableRooms as $roomInfo) {
                        $roomDetails = explode(", ", $roomInfo);
                        $tipus = explode(": ", $roomDetails[0])[1];
                        echo "<option value='$tipus'>$tipus</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" name="reservar" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-300">Reservar Habitació</button>
        </form>

        <hr class="my-8">

        <h2 class="text-xl font-semibold mb-4">Habitacions Disponibles</h2>
        <table class="min-w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">Habitacion</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $hotel = $_SESSION['hotel'];
                $habitacionesDisponibles = $hotel->llistarHabitacions();

                foreach ($habitacionesDisponibles as $roomInfo) {
                    echo "<tr><td class='border px-4 py-2'>$roomInfo</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>