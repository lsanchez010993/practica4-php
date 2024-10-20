<?php
// Validar si el usuario está duplicado
function comprobarUsuarioRepe($usuario)
{
    require_once "../../modelo/user/comprobarUsuario.php";
    if (usuarioRepetido($usuario)) {
        include_once '../../controlador/errores/errores.php';
        return [ErroresInicioSesion::ERROR_USUARIO_REPETIDO];
    } else {

        return false;
    }
}
function comprobarCorreoRepe($email)
{
    require_once "../../modelo/user/comprobarCorreo.php";
    if (correoRepetido($email)) {
        include_once '../../controlador/errores/errores.php';
        return [ErroresInicioSesion::ERROR_EMAIL_REPETIDO];
    } else {

        return false;
    }
}

function validarDatosNewUser($nombre_usuario, $email, $password, $confirm_password)
{
    $errores = []; 
    $correcto = []; 

    // Validación de si el usuario está duplicado
    require_once "../../controlador/userController/validarUsuario.php";
    $userDuplicado = comprobarUsuarioRepe($nombre_usuario);
    $correoDuplicado = comprobarCorreoRepe($email);

    // Si hay errores, se acumulan en el array $errores
    if ($userDuplicado !== false) {
        $errores = array_merge($errores, $userDuplicado);
    }
    if ($correoDuplicado !== false) {
        $errores = array_merge($errores, $correoDuplicado);
    }


    if (empty($errores)) {
        require_once "../../controlador/userController/validarPassword.php";
        $resultado = comprobarPassword($password, $confirm_password);

        if ($resultado === true) {
           
            require_once '../../modelo/user/registrarUsuario.php';
            include_once '../../controlador/errores/errores.php';
            if (registrarUsuario($nombre_usuario, $email, $password)) {
                $correcto[] = Mensajes::MENSAJE_EXITO_CREAR_USUARIO;
            }
        } else {
            // Si la contraseña no es válida, se agrega el error.
            $errores = array_merge($errores, $resultado);
        }
    }

    
    if (empty($errores)) {
        return $correcto;
    } else {
        return $errores;
    }
}