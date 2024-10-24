<?php
require_once 'controlador/errores/errores.php'
?>
<script>
    function confirmarEliminacion() {
        return confirm("<?php echo Mensajes::CONFIRMAR_ACTUALIZACION ?>");
    }
</script>
<?php

//Utilizo esta funcion en vistaArticulos. Si la accion que se le pasa a 'listarArticulos()' es 'editar' agrega las opciones de editar junto a cada articulo.
//De otra forma estas permanecen ocultas.
function listarArticulos($articles, $accion = null)
{


    // Verificar si hay artículos y mostrarlos
    if (!empty($articles)) {
        if ($accion == 'editar') echo "<h1>Mis articulos</h1>";
        else echo '<h1>Todos los articulos</h1>';
        foreach ($articles as $article) {

            $titulo = htmlspecialchars($article['titol']);
            $contenido = htmlspecialchars($article['cos']);
            //Utilizo heredocs: <<<HTML... HTML;
            echo <<<HTML
            
        <div>
            <h3>$titulo</h3>
            <p>$contenido</p>
        </div>
        
HTML;
            if ($accion == 'editar') {
                echo "<a href='modelo/articulo/eliminarArticulo.php?id=" . $article['id'] . "' onclick='return confirmarEliminacion()'>
                    <img src='./vista/imagenes/iconos/eliminar.png' alt='Eliminar' width='20' height='20'>
                    </a>";

                echo "<a href='./vista/articles/modificarArticulo.vista.php?id=" . $article['id'] . "'>
                    <img src='./vista/imagenes/iconos/editar.png' alt='Editar' width='20' height='20'>
                    </a>";
            }
        }
    } else {
        echo Mensajes::NO_ARTICULOS;
    }
}



?>