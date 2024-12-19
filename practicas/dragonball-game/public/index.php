<?php
include_once '../../dragonball-game/src/config/config.php';
include_once '../../dragonball-game/src/class/db.php';

// Definir habilidades predeterminadas
$defaultHabilities = [
    'Kamehameha' => 'Un poderoso ataque de energía',
    'Kaioken' => 'Aumento temporal de poder',
    'Genkidama' => 'Esfera de energía creada con la ayuda de otros',
    // Agrega más habilidades aquí...
];

// Verifica si el formulario fue enviado y crea el personaje
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? 'Goku';
    $race = $_POST['race'] ?? 'Saiyajin';
    $level = $_POST['level'] ?? 1;
    $hp = $_POST['hp'] ?? 100;
    $defense = $_POST['defense'] ?? 8; // Valor por defecto
    $attack = $_POST['attack'] ?? 8; // Valor por defecto
    $ki = $_POST['ki'] ?? 50; // Valor por defecto
    $gender = $_POST['gender'] ?? 'Male';
    $image = $_POST['image'] ?? ''; // URL de la imagen
    $hability = $_POST['habilities'] ?? []; // Habilidades
    var_dump($hability);



// Crear el personaje con los datos del formulario
$goku = new DB(null, $name, $hp, $level, $race, $image, (int)$defense, (int)$attack, $gender, (array)$hability, (int)$ki);
echo (gettype($hability));


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Personaje - Joc Rol DB</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="container mx-auto p-6">
        <h1 class="text-4xl text-center py-8">Crea Tu Propio Personaje</h1>

        <!-- Formulario para crear un personaje -->
        <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Formulario de Creación de Personaje</h2>
            
            <form method="POST">
                <!-- Nombre -->
                <div class="mb-4">
                    <label for="name" class="block font-semibold">Nombre del Personaje</label>
                    <input type="text" name="name" id="name" class="w-full p-2 border rounded-lg" placeholder="Ingresa el nombre del personaje" required>
                </div>

                <!-- Raza -->
                <div class="mb-4">
                    <label for="race" class="block font-semibold">Raza</label>
                    <input type="text" name="race" id="race" class="w-full p-2 border rounded-lg" placeholder="Ejemplo: Saiyajin" required>
                </div>

                <!-- Nivel -->
                <div class="mb-4">
                    <label for="level" class="block font-semibold">Nivel</label>
                    <input type="number" name="level" id="level" class="w-full p-2 border rounded-lg" value="1" required>
                </div>

                <!-- HP -->
                <div class="mb-4">
                    <label for="hp" class="block font-semibold">Vida (HP)</label>
                    <input type="number" name="hp" id="hp" class="w-full p-2 border rounded-lg" value="100" required>
                </div>

                <!-- Defensa -->
                <div class="mb-4">
                    <label for="defense" class="block font-semibold">Defensa</label>
                    <input type="number" name="defense" id="defense" class="w-full p-2 border rounded-lg" value="8" required>
                </div>

                <!-- Ataque -->
                <div class="mb-4">
                    <label for="attack" class="block font-semibold">Ataque</label>
                    <input type="number" name="attack" id="attack" class="w-full p-2 border rounded-lg" value="8" required>
                </div>

                <!-- Ki -->
                <div class="mb-4">
                    <label for="ki" class="block font-semibold">Ki</label>
                    <input type="number" name="ki" id="ki" class="w-full p-2 border rounded-lg" value="50" required>
                </div>

                <!-- Género -->
                <div class="mb-4">
                    <label for="gender" class="block font-semibold">Género</label>
                    <select name="gender" id="gender" class="w-full p-2 border rounded-lg">
                        <option value="Male">Masculino</option>
                        <option value="Female">Femenino</option>
                    </select>
                </div>

                <!-- URL de la imagen -->
                <div class="mb-4">
                    <label for="image" class="block font-semibold">URL de la Imagen</label>
                    <input type="text" name="image" id="image" class="w-full p-2 border rounded-lg" placeholder="Ingresa la URL de la imagen" required>
                </div>

                <!-- Habilidades -->
                <div class="mb-4">
                    <label for="habilities" class="block font-semibold">Habilidades (separadas por comas)</label>
                    <input type="text" name="habilities" id="habilities" class="w-full p-2 border rounded-lg" placeholder="Ejemplo: Kamehameha, Kaioken, Genkidama" required>
                </div>

                <div class="text-center mt-6">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg">Crear Personaje</button>
                </div>
            </form>
        </div>

        <!-- Mostrar personaje creado -->
        <?php if ($goku): ?>
            <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-6 mt-8">
                <h2 class="text-2xl font-bold mb-4">Tu Personaje</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                    <div><strong>Nombre:</strong> <?php echo $goku->name; ?></div>
                    <div><strong>Raza:</strong> <?php echo $goku->race; ?></div>
                    <div><strong>Nivel:</strong> <?php echo $goku->level; ?></div>
                    <div><strong>Vida:</strong> <?php echo $goku->hp; ?> HP</div>
                    <div><strong>Defensa:</strong> <?php echo $goku->defense; ?></div>
                    <div><strong>Ataque:</strong> <?php echo $goku->attack; ?></div>
                    <div><strong>Ki:</strong> <?php echo $goku->Ki; ?></div>
                    <div><strong>Género:</strong> <?php echo $goku->gender; ?></div>
                    <div><strong>Imagen:</strong> <img src="<?php echo $goku->image; ?>" alt="Imagen del Personaje" class="w-32 h-32 object-cover rounded-lg"></div>
                </div>

                <h3 class="text-xl font-semibold">Habilidades:</h3>
<p><?php echo $goku->ReceivedHability(); ?></p>

            </div>
        <?php endif; ?>
    </div>
</body>
</html>
