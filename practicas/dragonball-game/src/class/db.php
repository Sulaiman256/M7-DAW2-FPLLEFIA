<?php
class DB {
    public $id;
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
    public string $image;

    public function __construct(
        $id = null,
        string $name = "", 
        float $hp = 100, 
        int $level = 1, 
        string $race = "", 
        string $image = "", 
        int $defense = 0, 
        int $attack = 0, 
        string $gender = "", 
        array $hability = [],
        int $Ki = 0, 
        array $powerUp = []
    )
    {
        $this->id = $id ?? uniqid();
        
        $this->name = $name;
        $this->hp = $hp;
        $this->level = $level;
        $this->race = $race;
        $this->image = $image;
        $this->defense = $defense;
        $this->attack = $attack;
        $this->gender = $gender;

        $this->hability = $hability;

        gettype($hability);

        // Valores predeterminados para los powerUps si no se pasan
        $this->powerUp = $powerUp ?? [
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
        ];

        // Si se pasa un Ki específico, se asigna
        $this->Ki = $Ki;
    }

public function ReceivedHability() {
    // Devolver habilidades como string separado por comas
    if (empty($this->hability)) {
        return "No tienes habilidades.";
    }
    return implode(' ', $this->hability); // Devuelve solo los nombres de las habilidades
}


}

$goku = new DB(); 

// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['attack'])) {
//     echo "¡Has seleccionado el ataque: " . htmlspecialchars($_POST['attack']) . "!<br>";
    
//     $selectedAttack = $_POST['attack'];
//     if (isset($goku->hability[$selectedAttack])) {
//         $attackDetails = $goku->hability[$selectedAttack];
//         echo "Daño: " . $attackDetails['damage'] . "<br>";
//         echo "Tipo: " . $attackDetails['type'] . "<br>";
//     }
// }
?>
