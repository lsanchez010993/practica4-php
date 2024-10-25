<?php

require_once '../../controlador/userController/verificarSesion.php';
require_once '../../modelo/articulo/insertarArticulo.php';
require_once '../../controlador/errores/errores.php';

verificarSesion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {



function procesarFormulario()
{
    $errores = [];
    $correcto = '';

    // Validar y sanitizar campos
    $titulo = trim($_POST['titulo']);
    $contenido = trim($_POST['contenido']);

    // Validar título
    if (empty($titulo)) {
        $errores[] = 'El título es obligatorio.';
    }

    // Validar contenido
    if (empty($contenido)) {
        $errores[] = 'El contenido es obligatorio.';
    }

    // Manejar la imagen
    $rutaImagenBD = null;

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        // Ruta donde se guardarán las imágenes
        $rutaImagenes = __DIR__ . '/../../vista/imagenes/';

        // Asegurarse de que la carpeta existe
        if (!is_dir($rutaImagenes)) {
            mkdir($rutaImagenes, 0755, true);
        }

        // Obtener información del archivo
        $nombreArchivo = $_FILES['imagen']['name'];
        $tipoArchivo = $_FILES['imagen']['type'];
        $rutaTemporal = $_FILES['imagen']['tmp_name'];

        // Validar el tipo de archivo
        $extensionesPermitidas = ['jpg', 'jpeg', 'png', 'gif'];
        $extensionArchivo = pathinfo($nombreArchivo, PATHINFO_EXTENSION);

        if (in_array(strtolower($extensionArchivo), $extensionesPermitidas)) {
            // Generar un nombre único para evitar colisiones
            $nombreArchivoSeguro = uniqid('img_', true) . '.' . $extensionArchivo;

            // Mover el archivo a la carpeta de imágenes
            $rutaDestino = $rutaImagenes . $nombreArchivoSeguro;

            if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
                // El archivo se ha subido correctamente
                // Guardar la ruta relativa o el nombre del archivo en la base de datos
                $rutaImagenBD = 'imagenes/' . $nombreArchivoSeguro;
            } else {
                // Error al mover el archivo
                $errores[] = 'Error al guardar la imagen en el servidor.';
            }
        } else {
            $errores[] = 'Tipo de archivo no permitido. Solo se permiten imágenes JPG, JPEG, PNG y GIF.';
        }
    } elseif (isset($_FILES['imagen']) && $_FILES['imagen']['error'] !== UPLOAD_ERR_NO_FILE) {
        $errores[] = 'Error al subir la imagen.';
    }

    // Si no hay errores, insertar el artículo
    if (empty($errores)) {
        require_once '../../modelo/articulo/insertarArticulo.php';
        $usuario_id=  $_SESSION['usuario_id'];
        $resultado = insertarArticulo($titulo, $contenido, $rutaImagenBD, $usuario_id);

        if ($resultado === true) {
            require_once '../../controlador/errores/errores.php';
            $correcto = Mensajes::EXITO_INSERTAR_ARTICULO;
        } else {
            $errores[] = 'Error al insertar el artículo en la base de datos.';
        }
    }

    return [$errores, $correcto];
}
}
