<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Article</title>
    <link rel="stylesheet" href="estils/estils.css">
    <script>
        function confirmaractualizacion() {
            return confirm('¿Estás seguro de que quieres actualizar este artículo?');
        }
    </script>
</head>

<body>


    <form action="../../controlador/articuloController/modificarArticulo.controller.php" method="POST" onsubmit="return confirmaractualizacion();">
        <label for="titulo">Títol:</label>
        <input type="text" name="titulo"><br>

        <label for="contenido">Contingut:</label>
        <textarea name="contenido" cols="50" rows="5"></textarea><br>

        <div class="form-buttons">
            <button type="submit">Inserir Article</button>
            <button type="button" onclick="location.href='../../index.php'">Atrás</button>
        </div>
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
        ?>
    </form>



</body>

</html>