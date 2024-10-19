<?php
// Iniciar la sesión al inicio del archivo
session_start();

// Incluir el controlador correspondiente
require_once '../../controlador/articuloController/modificarArticulo.controller.php';
require_once '../../controlador/errores/errores.php';

$resultado = obtenerYActualizarArticulo();
//$resultado es un array que contiene los siguientes datos:

$id = $resultado['id'];
$titulo = $resultado['titulo'];
$contenido = $resultado['contenido'];
$errores = $resultado['errores'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Artículo</title>
    <script>
        function confirmarActualizacion() {
            return confirm("<?php echo Mensajes::CONFIRMAR_ACTUALIZACION?>");
        }
    </script>
</head>
<body>
    <h1>Modificar Artículo</h1>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . '?id=' . urlencode($id); ?>" method="POST" onsubmit="return confirmarActualizacion();">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="<?php echo htmlspecialchars($titulo); ?>"><br>

        <label for="contenido">Contenido:</label>
        <textarea name="contenido" id="contenido" cols="50" rows="5"><?php echo htmlspecialchars($contenido); ?></textarea><br>

        <button type="submit">Actualizar Artículo</button>
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
