<?php
// Validar si el usuario está duplicado
function comprobarUsuarioRepe($usuario)
{
    require_once "../../modelo/user/comprobarUsuario.php";
    if (usuarioRepetido($usuario)) {
        include_once '../../controlador/errores/errores.php';
        return [Errores::ERROR_USUARIO_REPETIDO];
    } else {

        return false;
    }
}
function validarDatosNewUser($nombre_usuario, $email, $password, $confirm_password)
{
    $userDuplicado = [];

    $correcto = [];
    // Validación de si el usuario está duplicado
    require_once "../../controlador/userController/validarUsuario.php";
    $userDuplicado = comprobarUsuarioRepe($nombre_usuario);

    if ($userDuplicado === false) {
        // Si el usuario no está duplicado, continuamos con la validación de la contraseña
        require_once "../../controlador/userController/validarPassword.php";
        $resultado = comprobarPassword($password, $confirm_password);

        if ($resultado === true) {

            // Si la contraseña es válida y coincide, intentamos registrar al usuario
            require_once '../../modelo/user/registrarUsuario.php';
            include_once '../../controlador/mensajes/mensajes.php';
            if (registrarUsuario($nombre_usuario, $email, $password)) {
                $correcto []= Mensajes::MENSAJE_EXITO_CREAR_USUARIO;
               
            }
        } else {
            // Si la contraseña no es válida, mostramos el mensaje de error
            $errores = $resultado;
        }
    } else {
        // Si el usuario ya existe, no debemos continuar con el registro y mostramos el error
        $errores = $userDuplicado;
    }

    if (!isset($errores) || empty($errores)) {

        return $correcto;
    } else {

        return $errores;
    }
}
