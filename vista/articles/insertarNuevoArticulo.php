<?php
require_once '../../controlador/articuloController/insertarArticuloController.php';
require_once '../../controlador/errores/errores.php';
require_once '../../controlador/userController/verificarSesion.php';

verificarSesion();

$titulo = '';
$contenido = '';
$errores = [];
$correcto;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errores = verificarErrores_insertarArticulo();
    // var_dump($errores);
    // exit();
    if ($errores === true) {
        $correcto = insertarNuevoArticulo();
    }

}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Artículo</title>
    <link rel="stylesheet" href="../estils/estilos_formulario.css">
    <script>
        function confirmarCreacion() {
            return confirm("<?php echo Mensajes::CONFIRMAR_CREAR_ARTICULO ?>");
        }
    </script>
</head>

<body>
    <h1>Crear Artículo</h1>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" onsubmit="return confirmarCreacion();">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="<?php echo htmlspecialchars($titulo); ?>"><br>

        <label for="contenido">Contenido:</label>
        <textarea name="contenido" id="contenido"><?php echo htmlspecialchars($contenido); ?></textarea><br>

        <button type="submit">Crear Artículo</button>
        <button type="button" onclick="location.href='../../index.php'">Atrás</button>
    </form>

    <?php
    // Mostrar errores si existen
    if (!empty($errores) && is_array($errores)) {
        echo '<div class="error">';
        foreach ($errores as $error) {
            echo ($error) . '<br>';
        }
        echo '</div>';
    }
        if (!empty($correcto)){
        echo '<div class="correcto">' . $correcto . '</div>';
        }
    

    ?>
</body>

</html>