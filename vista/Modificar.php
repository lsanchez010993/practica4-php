<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Artículos</title>
    <script>
        function confirmaractualizacion() {
            return confirm('¿Estás seguro de que quieres actualizar este artículo?');
        }
    </script>
    <link rel="stylesheet" href="../estils/estils.css">
</head>

<body>

    <h1>Modificar</h1>

    <?php
    session_start();

    if (isset($_SESSION['mensaje_exito'])) {
        echo "<p style='color: green; font-size: 28px;'>" . htmlspecialchars($_SESSION['mensaje_exito']) . "</p>";
        unset($_SESSION['mensaje_exito']);
    }

    if (isset($_SESSION['mensaje_error'])) {
        echo "<p style='color: red; font-size: 28px;'>" . htmlspecialchars($_SESSION['mensaje_error']) . "</p>";
        unset($_SESSION['mensaje_error']);
    }

    require_once '../controlador/articuloController.php';
    $articles = leerArticulos();

    if (!empty($articles)) {
        echo "<div>";
    ?>
        <form action="" method="POST">
            <label for="titulobusqueda">Introduce el título del artículo:</label>
            <input type="text" id="titulobusqueda" name="titulobusqueda" required>
            <button type="submit">Buscar Artículo</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['titulobusqueda'])) {
            $tituloBuscado = $_POST['titulobusqueda'];
            $encontrado = false;

            foreach ($articles as $article) {
                if (strcasecmp($article['titol'], $tituloBuscado) == 0) {
                    echo '<form action="../controlador/articuloController.php?action=modificar" method="POST" onsubmit="return confirmaractualizacion();">';
                    echo '<input type="hidden" name="id" value="' . htmlspecialchars($article['id']) . '">';
                    echo '<label for="titol_' . $article['id'] . '">Título:</label>';
                    echo '<input type="text" id="titol_' . $article['id'] . '" name="titol" value="' . htmlspecialchars($article['titol']) . '" required>';
                    echo '<label for="cos_' . $article['id'] . '">Contenido:</label>';
                    echo '<textarea id="cos_' . $article['id'] . '" name="cos" cols="100" rows="5" required>' . htmlspecialchars($article['cos']) . '</textarea>';
                    echo '<button type="submit">Modificar artículo</button>';
                    echo '</form>';
                    $encontrado = true;
                    break;
                }
            }

            if (!$encontrado) {
                echo "<p>Artículo no encontrado.</p>";
            }
        }

        echo "</div><hr>";
    } else {
        echo "<p>No hay artículos disponibles para modificar.</p>";
    }
    ?>
    <button onclick="location.href='../index.php'">Atrás</button>

</body>

</html>
