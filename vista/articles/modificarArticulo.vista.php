<?php
// Iniciar la sesión al inicio del archivo
session_start();

// Incluir el controlador correspondiente
require_once '../../controlador/articuloController/modificarArticulo.controller.php';

// Inicializar variables
$id = null;
$titulo = '';
$contenido = '';
$errores = [];

// Verificar si se ha pasado un ID a través de GET para modificar un artículo existente
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener los datos del artículo existente
    // Debes implementar esta función en tu controlador para obtener los datos del artículo por ID
    require_once "../../modelo/articulo/obtenerArticuloPorId.php";
    $articulo = obtenerArticuloPorId($id);

    if ($articulo) {
        $titulo = $articulo['titol'];
        $contenido = $articulo['cos'];
    } else {
        // Manejar el caso en que el artículo no existe
        echo "<p>Artículo no encontrado.</p>";
        exit();
    }
}

// Procesar el formulario cuando se envía
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errores = controllerModificarArticulo();
    // var_dump($errores);
    // exit();
    $id = $errores[1];
    if (is_numeric($errores[1])) {
        unset($errores[1]);
    }
  
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $id ? 'Modificar' : 'Crear'; ?> Artículo</title>
    <script>
        function confirmarActualizacion() {
            return confirm('<?php echo $id ? "¿Estás seguro de que quieres actualizar este artículo?" : "¿Estás seguro de que quieres crear este artículo?"; ?>');
        }
    </script>
</head>

<body>
    <h1><?php echo $id ? 'Modificar' : 'Crear'; ?> Artículo</h1>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . ($id ? '?id=' . urlencode($id) : ''); ?>" method="POST" onsubmit="return confirmarActualizacion();">
        <?php if ($id): ?>
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        <?php endif; ?>

        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="<?php echo htmlspecialchars($titulo); ?>"><br>

        <label for="contenido">Contenido:</label>
        <textarea name="contenido" id="contenido" cols="50" rows="5"><?php echo htmlspecialchars($contenido); ?></textarea><br>

        <button type="submit"><?php echo $id ? 'Actualizar' : 'Crear'; ?> Artículo</button>
        <button type="button" onclick="location.href='../../index.php'">Atrás</button>
    </form>

    <?php
    // var_dump($errores);

    // Mostrar errores si existen
   
    if (!empty($errores) && is_array($errores)) {
        foreach ($errores as $error) {
            echo $error . '<br>';
        }
    }

    ?>
</body>

</html>