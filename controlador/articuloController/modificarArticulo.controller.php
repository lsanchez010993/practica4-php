<?php
function obtenerYActualizarArticulo()
{
    $result = [
        'id' => null,
        'titulo' => '',
        'contenido' => '',
        'errores' => []
    ];

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {

        $result['id'] = $_GET['id'];

        require_once "../../modelo/articulo/obtenerArticuloPorId.php";
        $articulo = obtenerArticuloPorId($result['id']);

        if ($articulo) {
            $result['titulo'] = $articulo['titol'];
            $result['contenido'] = $articulo['cos'];
        } else {
            require_once '../../controlador/errores/errores.php';
            echo "<p>" . ErroresArticulos::ARTICULO_NO_ENCONTRADO . "</p>";
            exit();
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Guardar los datos del usuario tras el envío
        $result['titulo'] = isset($_POST['titulo']) ? $_POST['titulo'] : '';
        $result['contenido'] = isset($_POST['contenido']) ? $_POST['contenido'] : '';

        $errores = controllerModificarArticulo();


        $result['errores'] = $errores;
    }

    return $result; // Devolver los datos y los errores para usarlos en la vista
}


function controllerModificarArticulo()
{

    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $id = $_GET['id'];
    require_once '../../controlador/errores/errores.php';
    if (isset($_GET['id'])) {
       
        $errores = [];

        if (empty($contenido)) {

            $errores[] = ErroresArticulos::CUERPO_MENSAJE_VACIO;
        }
        if (empty($titulo)) {
            $errores[] = ErroresArticulos::CAMPO_TITULO_VACIO;
        }
        if (empty($errores)) {

            require_once "../../modelo/articulo/insertarArticulo.php";

            $resultado = actualizarArticulo($id, $titulo, $contenido);

            if ($resultado === true) {

                return Mensajes::MENSAJE_ACTUALIZACION_CORRECTA;
            }
        } else {

            return $errores;
        }
    }
}
