<?php


function listarArticulos($articles) {
    require_once './controlador/articuloController.php';  


    // Verificar si hay artículos
    if (!empty($articles)) {
        foreach ($articles as $article) {
            echo "<div>";
            echo "<h3>" . htmlspecialchars($article['titol']) . "</h3>";
            echo "<p>" . htmlspecialchars($article['cos']) . "</p>";
            echo "</div>";
            echo "<hr>";
        }
    } else {
        echo "<p>No hi ha articles disponibles.</p>";
    }
}
?>
