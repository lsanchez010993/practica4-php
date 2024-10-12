<script>
    function confirmarEliminacion() {
        return confirm('¿Estás seguro de que quieres eliminar este artículo?');
    }

    function confirmaractualizacion() {
        return confirm('¿Estás seguro de que quieres actualizar este artículo?');
    }
</script>
<?php


// require_once '../../modelo/articuloModel.php';  
function listarArticulos($articles, $accion = null)
{


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
        
HTML;
            if ($accion == 'editar') {
                echo "<a href='modelo/articuloModel.php?action=eliminar&id=" . $article['id'] . "' onclick='return confirmarEliminacion()'>Esborrar</a><br>";
                echo "<a href='./vista/articles/modificarArticulo.php?id=" . $article['id'] . "'>Editar artículo</a>";
            }
        }
    } else {
        echo <<<HTML
    <p>No hi ha articles disponibles.</p>
HTML;
    }
}

?>