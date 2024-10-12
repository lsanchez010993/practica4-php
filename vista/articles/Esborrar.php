<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Articles</title>
    <script>
        function confirmarEliminacion() {
            return confirm('¿Estás seguro de que quieres eliminar este artículo?');
        }
    </script>
    <!-- <link rel="stylesheet" href="../estils/estils.css"> -->
</head>
<body>
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
    <h1>Llista d'Articles per Esborrar</h1>

    
    <?php
      

    require_once '../../modelo/articuloModel.php';  


    $articles = leerArticulos();


    if (!empty($articles)) {
        foreach ($articles as $article) {
        
            echo "<div>";
            echo "<h3>ID: " . htmlspecialchars($article['id']) . " - " . htmlspecialchars($article['titol']) . "</h3>";
            echo "<p>" . htmlspecialchars($article['cos']) . "</p>";
            // Enlace para eliminar el artículo con confirmación
            echo "<a href='../../modelo/articuloModel.php?action=eliminar&id=" . $article['id'] . "' onclick='return confirmarEliminacion()'>Esborrar</a>";
            echo "</div>";
            echo "<hr>";
        }
    } else {
        echo "<p>No hi ha articles disponibles per esborrar.</p>";
    }


    ?>
     <button onclick="location.href='../index.php'">Atrás</button>

</body>
</html>
