<?php


function insertarArticuloController()
{
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    

    require_once '../../controlador/errores/errores.php';
    $errores = [];

    if (empty($contenido)) {

        $errores[] = ErroresArticulos::CUERPO_MENSAJE_VACIO;
    }
    if (empty($titulo)) {
        $errores[] = ErroresArticulos::CAMPO_TITULO_VACIO;
    }
    require_once "../../modelo/articulo/insertarArticulo.php";



    if (empty($errores)) {
      
        $resultado = insertarArticulo();
        if ($resultado === true) {
         
            return [Mensajes::EXITO_INSERTAR_ARTICULO];
        }
    } else {
      return $errores;
    }
}









