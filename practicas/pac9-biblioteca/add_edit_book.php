<?php
function agregarLibro($titulo, $autor, $imagen, $descripcion)
{
    include './array.php';

    if (!isset($libros) || !is_array($libros)) {
        $libros = [];
    }

    $nuevoLibro = [
        'id' => count($libros) + 1,
        'titulo' => $titulo,
        'autor' => $autor,
        'imagen' => $imagen,
        'descripcion' => $descripcion,
    ];

    $libros[] = $nuevoLibro;

    guardarLibros($libros);

    return true;
}

function editarLibro($id, $titulo, $autor, $imagen, $descripcion)
{
    include './array.php';

    $encontrado = false;
    foreach ($libros as &$libro) {
        if ($libro['id'] == $id) {
            $libro['titulo'] = $titulo;
            $libro['autor'] = $autor;
            $libro['imagen'] = $imagen;
            $libro['descripcion'] = $descripcion;
            $encontrado = true;
            break;
        }
    }

    if ($encontrado) {
        guardarLibros($libros);
    }

    return $encontrado;
}

function guardarLibros($libros)
{
    $contenido = '<?php' . PHP_EOL . '$libros = ' . var_export($libros, true) . ';' . PHP_EOL;
    file_put_contents('./array.php', $contenido);
}

include_once './array.php';

session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] != 'admin') {
    header('Location: home.php');
    exit();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header('Location: home.php');
    exit();
}

$id = isset($_GET['id']) ? $_GET['id'] : null;
$titulo = '';
$autor = '';
$imagen = '';
$descripcion = '';

if ($id !== null) {
    $encontrado = false;
    foreach ($libros as $libro) {
        if ($libro['id'] == $id) {
            $titulo = $libro['titulo'];
            $autor = $libro['autor'];
            $imagen = $libro['imagen'];
            $descripcion = $libro['descripcion'];
            $encontrado = true;
            break;
        }
    }

    if (!$encontrado) {
        header('Location: home.php');
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = trim($_POST['titulo']);
    $autor = trim($_POST['autor']);
    $imagen = trim($_POST['imagen']);
    $descripcion = trim($_POST['descripcion']);

    if (empty($titulo) || empty($autor)) {
        echo "<script>alert('Por favor, completa los campos requeridos.');</script>";
    } else {
        if ($id !== null) {
            if (editarLibro($id, $titulo, $autor, $imagen, $descripcion)) {
                echo "<script>alert('Libro editado correctamente.');</script>";
            } else {
                echo "<script>alert('Error al editar el libro.');</script>";
            }
        } else {
            agregarLibro($titulo, $autor, $imagen, $descripcion);
            echo "<script>alert('Libro agregado correctamente.');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Biblioteca Virtual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>
    <header class="bg-light py-3 mb-4 shadow-sm">
        <div class="container d-flex align-items-center justify-content-between">
            <div>
                <h4 class="m-0">👋 Bienvenido, <?= htmlspecialchars($_SESSION['usuario']) ?></h4>
                <p class="text-muted m-0"><i class="fas fa-user-shield text-success"></i> <?= htmlspecialchars($_SESSION['role']) ?></p>
            </div>
            <a href="home.php" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Volver a la Biblioteca
            </a>
        </div>
    </header>

    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold"><?= $id !== null ? 'Editar Libro' : 'Agregar Nuevo Libro' ?></h2>
            <p class="lead"><?= $id !== null ? 'Modifica los datos del libro.' : 'Completa los datos para agregar un libro.' ?></p>
        </div>

        <form method="POST" class="mx-auto" style="max-width: 600px;">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="titulo" name="titulo" value="<?= htmlspecialchars($titulo) ?>" placeholder="Título" required>
                <label for="titulo">Título</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="autor" name="autor" value="<?= htmlspecialchars($autor) ?>" placeholder="Autor" required>
                <label for="autor">Autor</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="imagen" name="imagen" value="<?= htmlspecialchars($imagen) ?>" placeholder="URL de la Imagen">
                <label for="imagen">URL de la Imagen</label>
            </div>
            <div class="form-floating mb-4">
                <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" style="height: 150px;"><?= htmlspecialchars($descripcion) ?></textarea>
                <label for="descripcion">Descripción</label>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg"><?= $id !== null ? 'Guardar Cambios' : 'Agregar Libro' ?></button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>