<script>
    function confirmaractualizacion() {
        return confirm('¿Estás seguro de que quieres actualizar este artículo?');
    }
</script>
<?php
// Conectar a la base de datos y obtener los datos del artículo a modificar
require_once '../../modelo/conexion.php';
require_once '../../modelo/articuloModel.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $article = obtenerArticuloPorId($id); // Función en el modelo que obtiene el artículo por su ID

    if ($article) {
        $titulo = htmlspecialchars($article['titol']);
        $contenido = htmlspecialchars($article['cos']);
    } else {
        echo "Artículo no encontrado.";
        exit();
    }
} else {
    echo "ID de artículo no proporcionado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Artículo</title>
</head>

<body>
    <h1>Modificar Artículo</h1>

    <form action="../../controlador/articuloController.php?action=modificarArticulo&id=
    <?php echo $id; ?>" method="POST" onsubmit="return confirmaractualizacion();">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" value="<?php echo $titulo; ?>" required><br>

        <label for="contenido">Contenido:</label>
        <textarea name="contenido" cols="50" rows="5" required><?php echo $contenido; ?></textarea><br>

        <button type="submit">Actualizar Artículo</button>
    </form>
</body>

</html>