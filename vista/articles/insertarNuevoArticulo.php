<?php
require_once '../../controlador/articuloController/insertarArticuloController.php';
require_once '../../controlador/errores/errores.php';

$titulo = '';
$contenido = '';
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errores = insertarArticuloController();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Artículo</title>
    <script>
       function confirmarActualizacion() {
            return confirm("<?php echo Mensajes::CONFIRMAR_ACTUALIZACION?>");
        }
    </script>
</head>
<body>
    <h1>Crear Artículo</h1>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" onsubmit="return confirmarCreacion();">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="<?php echo htmlspecialchars($titulo); ?>"><br>

        <label for="contenido">Contenido:</label>
        <textarea name="contenido" id="contenido" cols="50" rows="5"><?php echo htmlspecialchars($contenido); ?></textarea><br>

        <button type="submit">Crear Artículo</button>
        <button type="button" onclick="location.href='../../index.php'">Atrás</button>
    </form>

    <?php
    // Mostrar errores si existen
    if (!empty($errores) && is_array($errores)) {
        foreach ($errores as $error) {
            echo $error . '<br>';
        }
    }
    ?>
</body>
</html>
