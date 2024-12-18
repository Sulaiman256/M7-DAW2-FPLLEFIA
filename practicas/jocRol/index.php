<?php
// Definir la clase DB y las habilidades
class DB {
    public string $name;
    public float $hp;
    public int $level;
    public string $race; 
    public int $defense;
    public int $attack;
    public string $gender;
    public array $hability; 
    public int $Ki;
    public array $powerUp;

    public function __construct(
        string $name = "Goku/Kakarotto", 
        float $hp = 100, 
        int $level = 1, 
        string $race = "Saiyajin", 
        int $defense = 8, 
        int $attack = 8, 
        string $gender = "Male", 
        array $hability = [
            "Kamehameha" => [
                "damage" => 50,
                "type" => "Attack"
            ],
            "Kaioken" => [
                "damage" => 20,
                "type" => "Increment"
            ],
            "Genkidama" => [
                "damage" => 80,
                "type" => "Attack",
            ],
            "Dragon fist" => [
                "damage" => 100,
                "type" => "Attack"
            ]
        ],
        int $Ki = 50, 
        array $powerUp = [
            "SSJ Falso" => [
                "description" => "Aumenta todas sus habilidades 25x",
                "effect" => function($db) {
                    $db->defense *= 25;
                    $db->attack *= 25;
                    $db->Ki *= 25;
                }
            ],
            "SSJ" => [
                "description" => "Aumenta todas sus habilidades 50x",
                "effect" => function($db) {
                    $db->attack *= 50;
                    $db->defense *= 50;
                    $db->Ki *= 50;
                }
            ],
            "SSJ2" => [
                "description" => "Aumenta todas sus habilidades 100x",
                "effect" => function($db) {
                    $db->attack *= 100;
                    $db->defense *= 100;
                    $db->Ki *= 100;
                }
            ],
            "SSJ3" => [
                "description" => "Aumenta todas sus habilidades 400x",
                "effect" => function($db) {
                    $db->attack *= 400;
                    $db->defense *= 400;
                    $db->Ki *= 400;
                }
            ],
            "SSJ4" => [
                "description" => "Aumenta todas sus habilidades 500x",
                "effect" => function($db) {
                    $db->attack *= 500;
                    $db->defense *= 500;
                    $db->Ki *= 500;
                }
            ],
            "SSJ GOD" => [
                "description" => "Aumenta todas sus habilidades 1000x",
                "effect" => function($db) {
                    $db->attack *= 1000;
                    $db->defense *= 1000;
                    $db->Ki *= 1000;
                }
            ],
            "SSJ Blue" => [
                "description" => "Aumenta todas sus habilidades 5000x",
                "effect" => function($db) {
                    $db->attack *= 5000;
                    $db->defense *= 5000;
                    $db->Ki *= 5000;
                }
            ],
            "SSJ BLUE FULL POWER" => [
                "description" => "Aumenta todas sus habilidades 10000x",
                "effect" => function($db) {
                    $db->attack *= 6000;
                    $db->defense *= 6000;
                    $db->Ki *= 6000;
                }
            ],
            "UI IMPERFECT" => [
                "description" => "Aumenta todas sus habilidades 15000x",
                "effect" => function($db) {
                    $db->attack *= 6000;
                    $db->defense *= 15000;
                    $db->Ki *= 15000;
                }
            ],
            "UI PERFECT" => [
                "description" => "Aumenta todas sus habilidades 20000x",
                "effect" => function($db) {
                    $db->attack *= 20000;
                    $db->defense *= 20000;
                    $db->Ki *= 20000;
                }
            ],
            "UI SEÑAL" => [
                "description" => "Aumenta todas sus habilidades 25000x",
                "effect" => function($db) {
                    $db->attack *= 25000;
                    $db->defense *= 25000;
                    $db->Ki *= 25000;
                }
            ]
        ]
    )
    {
        $this->name = $name;
        $this->hp = $hp;
        $this->level = $level;
        $this->race = $race;
        $this->defense = $defense;
        $this->attack = $attack;
        $this->gender = $gender;
        $this->hability = $hability;
        $this->Ki = $Ki;
        $this->powerUp = $powerUp;
    }
}

$goku = new DB(); 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['attack'])) {
    echo "¡Has seleccionado el ataque: " . htmlspecialchars($_POST['attack']) . "!<br>";
    
    $selectedAttack = $_POST['attack'];
    if (isset($goku->hability[$selectedAttack])) {
        $attackDetails = $goku->hability[$selectedAttack];
        echo "Daño: " . $attackDetails['damage'] . "<br>";
        echo "Tipo: " . $attackDetails['type'] . "<br>";
    }
}

Class Player {
    public string $name;
    public string $person;

    public function __construct($name)
    {
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joc Rol Sulaiman</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">
    <h1 class="text-4xl text-center py-8">Joc Rol DB</h1>

    <!-- Formulario para mostrar ataques -->
    <div class="max-w-md mx-auto mt-8 p-4 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold mb-4">Elige un ataque</h2>

        <!-- Formulario que se envía al hacer clic en "Mostrar Habilidades" -->
        <form action="" method="POST">
            <div class="mb-4">
                <button type="submit" name="show_form" class="bg-blue-500 text-white py-2 px-4 rounded-lg">Mostrar Habilidades</button>
            </div>
        </form>

        <?php
        // Si el usuario ha hecho clic en el botón "Mostrar Habilidades"
        if (isset($_POST['show_form'])):
        ?>
            <form action="" method="POST">
                <?php
                // Generar las opciones de ataque
                foreach ($goku->hability as $attackName => $attackDetails) {
                    echo '<label class="block mb-2">';
                    echo '<input type="radio" name="attack" value="' . $attackName . '" class="mr-2"> ' . $attackName;
                    echo '</label>';
                }
                ?>
                <div class="text-center mt-4">
                    <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded-lg">Usar Ataque</button>
                </div>
            </form>
        <?php
        endif;
        ?>

    </div>
</body>
</html>
