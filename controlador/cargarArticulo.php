<?php
// cargarArticulo.php

require_once '../../modelo/conexion.php';
// require_once '../../modelo/articuloModel.php';
require_once '../../modelo/articulo/obtenerArticuloPorId.php';

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
