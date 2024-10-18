<?php
// Validar si el usuario está duplicado
function comprobarUsuarioRepe($usuario)
{
    require_once "../../modelo/user/comprobarUsuario.php";
    if (usuarioRepetido($usuario)) {
        return ["El nombre de usuario ya está en uso."];
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
            if (registrarUsuario($nombre_usuario, $email, $password)) {
                $correcto []= "!Usuario registrado con éxito¡";
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
