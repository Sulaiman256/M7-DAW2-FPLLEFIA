<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'home del temps</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-10">
    <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">L'home del temps</h1>
    <div class="grid grid-cols-1 sm:grid-cols2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <?php
        $temperaturas = [];
        $sumaTemperaturas = 0;
        for($i = 0; $i <10; $i++) {
            $temperaturas[] = rand(-10, 50);
        }

        foreach($temperaturas as $temperatura){
            $sumaTemperaturas += $temperatura;

            if($temperatura <10){
                echo "
                    <div class='bg-blue-500 text-white p-6 rounded-lg shadow-lg transform transition hover:scale-105'>
                        <h2 class='text-2xl font-bold'>{$temperatura} °C</h2>
                        <p class='mt-2'>Frio</p>
                    </div>
                ";
            }elseif($temperatura >=10 && $temperatura <=25){
                echo "
                <div class='bg-green-500 text-white p-6 rounded-lg shadow-lg transform transition hover:scale-105'>
                   <h2 class='text-2xl font-bold'>{$temperatura} °C</h2>
                   <p class='mt-2'>Temperatura suave</p>
                </div>
                
                ";

            }else{
                echo "
                <div class='bg-red-500 text-white p-6 rounded-lg shadow-lg transform transition hover:scale-105'>
                   <h2 class='text-2xl font-bold'>{$temperatura} °C</h2>
                   <p class='mt-2'>Calor</p>
                </div>
                ";
        }
    }
        $media = $sumaTemperaturas / count($temperaturas);
        ?>
    </div>
    <div class="text-center mt-10">
        <div class="text-2xl font-semibold text-gray-800"> Media de las temperaturas son: 
        <span class="text-indigo-600"><?php echo round($media, 2); ?> °C</span>
        </div>
    </div>
    </div>
</body>
</html>