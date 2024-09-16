<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primera aplicacion de Sulaiman El Taha Santos con PHP</title>
    <style>
        body{
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            display:flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .container{
            max-width: 900px;
            width: 100%;
            background-color: #ffffff;
            border-radius: 3px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        header{
            background-color: #1e3a8a;
            color: #ffffff;
            padding: 16px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }
        header img {
            height: 48px;
            vertical-align: middle;
        }
        header h1{
            display: inline;
            font-size: 1.5rem;
            font-weight: bold;
            margin-left: 10px;
            vertical-align: middle;
        }
        main{
            padding: 24px;
        }
        .perfil{
            text-align: center;
            margin-bottom: 24px;
        }
        .perfil img {
            border-radius: 50%;
            width: 160px;
            height: 160px;
        }
        .perfil p{
            margin-top: 10px;
            font-size: 1.125rem;
            font-weight: medium;
        }
        .descripcion{
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
        }
        .descripcion h2 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
        .seccion{
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 24px;
        }
       .seccion h4 {
        font-size: 1.25rem;
            font-weight: bold;
            color: #1e3a8a;
            border-bottom: 2px solid #1e3a8a;
            padding-bottom: 10px;
            margin-bottom: 10px;
            text-align: center;
 
       }
        .seccion p{
            font-size: 1rem;
            font-weight: medium;
            text-align: center;
        }
        footer{
            background-color: #1e3a8a;
            color: #ffffff;
            padding: 16px;
            text-align: center;
            border-radius: 0 0 8px 8px;
        }
        a{
            color: #ffffff;
            text-decoration: none;
            transition: color 0.3s ease;
            padding: 5px 10px;
            border-radius: 4px;
            background-color: #007bff;
        }
        a:hover{
            background-color: #0056b3;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
    <header>
            <img src="./images/logo.png" alt="Logo de FPLlefia">
            <h1>Módulo 7 - Práctica 1. Mi primera aplicación en PHP</h1>
            <a href="./demostracion.php">demostracion</a>
    </header>
    <main>
        <div class="perfil">
            <img src="./images/fotoperfil.JPG" alt="foto perfil">
            <p>Sulaiman El Taha Santos</p>
        </div>
        <div class="descripcion">
        <h2 class="text-xl font-semibold mb-4">Descripción del Código</h2>

            <div class="seccion">
                <h4>&lt; ?php ?></h4>
                <p>Esta particula de codigo sirve para indicar que estas empezando un archivo de php es esencial para que funcione</p>
            </div>

            <div class="seccion">
                <h4>function sayHello($name) { 
                    echo "Hello $name!"; 
                }</h4>
                <p>En al siguiente Area que es la segunda nos indica que hay una funcion llamada <strong>sayHello($name)</strong> A la cual le estamos enviando una variable por parametro lo cual usaremos para enviar un mensaje por con un string y la variable</p>
            </div>
            <div class="seccion">
                <h4>sayHello('remote world');</h4>
                <p>En esta parte se muestra la llamada a la funcion <strong>sayHello('remote world')</strong> que imprime el mensaje 'Hello remote world!' en la consola</p>
            </div>
            <div class="seccion">
               <h4>phpinfo();</h4>
                <p>En esta ultima area se muestra la llamada a la función <strong>phpinfo();</strong> que muestra información sobre el entorno de ejecución PHP en este caso la información del sistema operativo y la versión PHP que se está utilizando</p>
            </div>
        </div>
    </main>
    <footer>
        <p> Sulaiman El Taha Santos <?php echo date("Y/m/d")?></p>
    </footer>
    </div>
</body>
</html>
