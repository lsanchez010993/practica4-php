<?php


function verificarErrores_insertarArticulo()
{
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];


    require_once '../../controlador/errores/errores.php';


    if (empty($contenido)) {

        $errores[] = ErroresArticulos::CUERPO_MENSAJE_VACIO;
    }
    if (empty($titulo)) {
        $errores[] = ErroresArticulos::CAMPO_TITULO_VACIO;
    }
    if (empty($errores)) {
        return true;
    } else {
      

        return $errores;
    }
}
function insertarNuevoArticulo()
{
    require_once "../../modelo/articulo/insertarArticulo.php";
    require_once '../../controlador/errores/errores.php';


    $resultado = insertarArticulo();
   
    if ($resultado === true) {

        return Mensajes::EXITO_INSERTAR_ARTICULO;
    } else {
        return 'error';
    }
}
