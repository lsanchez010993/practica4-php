<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu principal</title>
    <link rel="stylesheet" href="vista/estils/estils_Index.css">

</head>

<body>
    <?php
    // session_start();
    // $usuario = 'luis';
    // $_SESSION['usuario_id'] = $usuario;

    if (isset($_SESSION['usuario_id'])) {
        echo '<div class="inicio">';
        echo '<button onclick="location.href=\'vista/articles/insertar.php\'">Agregar artículo</button>';
        echo '<button onclick="location.href=\'vista/articles/Modificar.php\'">Modificar artículo</button>';
        echo '<button onclick="location.href=\'vista/articles/Esborrar.php\'">Eliminar artículos</button>';
        echo '</div>';
    } else {
        require_once 'vista/articles/vistaArticulos.php';
    }
    ?>
</body>

</html>