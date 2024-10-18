<?php
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titulo = $_POST['titulo'];
        $contenido = $_POST['contenido'];
        $errores = array();
        $correcto;
        include '../controlador/errores/errores.php';
       
        if (empty($contenido)) {
            $errores[] = Errores::ERROR_CUERPO_MENSAJE_VACIO;
        }
        if (empty($titulo)) {
            $errores[] = Errores::ERROR_CAMPO_TITULO_VACIO;
        }


        if (empty($errores)) {
            $correcto = Mensajes::MENSAJE_ACTUALIZACION_CORRECTA;
            $_SESSION['correcto'] = $correcto;
            require_once "../modelo/articuloModel.php";
            $resultado = actualizarArticulo($id, $titulo, $contenido); 

            header("Location: ../index.php"); 
            // include '../vista/articles/modificarArticulo.vista.php'
            exit();
        } else {
          
           
            $_SESSION['errores'] = $errores;

            header("Location: ../vista/articles/modificarArticulo.vista.php?id=" . $id);
            exit();
        }
    }
} else {
    echo "ID de artículo no proporcionado.";
    exit();
}
