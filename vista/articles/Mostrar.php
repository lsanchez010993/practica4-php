<?php


function listarArticulos($articles) {
    require_once './controlador/articuloController.php';  


// Verificar si hay artículos
if (!empty($articles)) {
    foreach ($articles as $article) {
        $titulo = htmlspecialchars($article['titol']);
        $contenido = htmlspecialchars($article['cos']);
        
        echo <<<HTML
        <div>
            <h3>$titulo</h3>
            <p>$contenido</p>
        </div>
        <hr>
HTML;
    }
} else {
    echo <<<HTML
    <p>No hi ha articles disponibles.</p>
HTML;
}
}
?>
