<script>
    function confirmaractualizacion() {
        return confirm('¿Estás seguro de que quieres actualizar este artículo?');
    }
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Artículo</title>
</head>

<body>
    <?php
    // Verificar si es una solicitud GET y se ha proporcionado el ID del artículo
    if (isset($_GET['id'])) {
        require_once '../../controlador/cargarArticulo.php';
    }

    ?>

    <h1>Modificar Artículo</h1>

    <form action="../../controlador/modificarArticulo.controller.php?id=<?php echo $id ?>" method="POST" onsubmit="return confirmaractualizacion();">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" value="<?php echo $titulo; ?>" required><br>

        <label for="contenido">Contenido:</label>
        <textarea name="contenido" cols="50" rows="5" required><?php echo $contenido; ?></textarea><br>

        <button type="submit">Actualizar Artículo</button>
        <button type="button" onclick="location.href='../../index.php'">Atrás</button>
        <?php
        session_start();
        if (isset($_SESSION['errores'])) {
            $errores = $_SESSION['errores'];
            foreach ($errores as $error) {
                echo "<p>" . htmlspecialchars($error) . "</p>";
            }
            unset($_SESSION['errores']);
        }
        

        ?>
    </form>


</body>

</html>