<?php
include_once '../../dragonball-game/src/config/config.php';
include_once '../../dragonball-game/src/class/db.php';

$goku = new DB();  // Instanciamos el objeto de la clase DB
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joc Rol DB</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <div class="container mx-auto p-6">
        <h1 class="text-4xl text-center py-8">Joc Rol DB</h1>

        <!-- Formulario para mostrar el personaje -->
        <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Información del Personaje</h2>
            
            <!-- Mostrar los datos del personaje -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                <div>
                    <p class="font-semibold">Nombre:</p>
                    <p class="text-lg"><?php echo $goku->name; ?></p>
                </div>
                <div>
                    <p class="font-semibold">Raza:</p>
                    <p class="text-lg"><?php echo $goku->race; ?></p>
                </div>
                <div>
                    <p class="font-semibold">Nivel:</p>
                    <p class="text-lg"><?php echo $goku->level; ?></p>
                </div>
                <div>
                    <p class="font-semibold">Vida:</p>
                    <p class="text-lg"><?php echo $goku->hp; ?> HP</p>
                </div>
                <div>
                    <p class="font-semibold">Defensa:</p>
                    <p class="text-lg"><?php echo $goku->defense; ?></p>
                </div>
                <div>
                    <p class="font-semibold">Ataque:</p>
                    <p class="text-lg"><?php echo $goku->attack; ?></p>
                </div>
                <div>
                    <p class="font-semibold">Ki:</p>
                    <p class="text-lg"><?php echo $goku->Ki; ?></p>
                </div>
            </div>

            <!-- Mostrar la imagen del personaje si está definida -->
            <?php if (!empty($goku->image)): ?>
                <img src="<?php echo $goku->image; ?>" alt="Imagen del Personaje" class="w-full h-auto rounded-lg mb-4">
            <?php endif; ?>

            <!-- Mostrar las habilidades -->
            <h3 class="text-xl font-semibold mb-4">Habilidades</h3>
            <form action="" method="POST">
                <div class="space-y-4">
                    <?php
                    foreach ($goku->hability as $attackName => $attackDetails) {
                        echo '<label class="flex items-center">';
                        echo '<input type="radio" name="attack" value="' . $attackName . '" class="mr-2">';
                        echo '<span>' . $attackName . ' - ' . $attackDetails['type'] . ' (Daño: ' . $attackDetails['damage'] . ')</span>';
                        echo '</label>';
                    }
                    ?>
                </div>

                <div class="text-center mt-6">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg">Usar Ataque</button>
                </div>
            </form>

            <?php
            // Si se ha seleccionado un ataque, mostrar el nombre del ataque elegido
            if (isset($_POST['attack'])) {
                $selectedAttack = $_POST['attack'];
                echo '<div class="mt-4 text-center text-green-600 font-semibold">';
                echo '¡Has elegido usar el ataque: ' . $selectedAttack . '!';
                echo '</div>';
            }
            ?>
        </div>
    </div>

</body>
</html>
