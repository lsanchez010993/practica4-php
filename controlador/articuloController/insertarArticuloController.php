<?php


function insertarArticuloController()
{
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    

    require_once '../../controlador/errores/errores.php';
    $errores = [];

    if (empty($contenido)) {

        $errores[] = Errores::ERROR_CUERPO_MENSAJE_VACIO;
    }
    if (empty($titulo)) {
        $errores[] = Errores::ERROR_CAMPO_TITULO_VACIO;
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









