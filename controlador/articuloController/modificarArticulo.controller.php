<?php


function controllerModificarArticulo()
{

    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $id = $_GET['id'];
    require_once '../../controlador/errores/errores.php';
    if (isset($_GET['id'])) {
        require_once '../../controlador/errores/errores.php';
        $errores = [];

        if (empty($contenido)) {

            $errores[] = Errores::ERROR_CUERPO_MENSAJE_VACIO;
        }
        if (empty($titulo)) {
            $errores[] = Errores::ERROR_CAMPO_TITULO_VACIO;
        }
        if (empty($errores)) {

            require_once "../../modelo/articulo/insertarArticulo.php";

            $resultado = actualizarArticulo($id, $titulo, $contenido);

            if ($resultado === true) {

                return [Mensajes::MENSAJE_ACTUALIZACION_CORRECTA, $id];
            }
        } else {
           
            return $errores;

           


            // header("Location: ../articles/modificarArticulo.vista.php?id=" . $id);
            // exit();
        }
    } else {

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
}
