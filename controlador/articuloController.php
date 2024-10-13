<?php
if (isset($_GET['action']) && $_GET['action'] === 'modificarArticulo') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'];
            $contenido = $_POST['contenido'];
            
           
            require_once '../modelo/articuloModel.php';
            $resultado = actualizarArticulo($id, $titulo, $contenido); 
            
            if ($resultado) {
                $_SESSION['mensaje_exito'] = "Artículo actualizado correctamente.";
            } else {
                $_SESSION['mensaje_error'] = "Error al actualizar el artículo.";
            }

            // Redirigir a la vista después de la actualización
            header("Location: ../index.php");
            exit();
        }
    }
}


?>