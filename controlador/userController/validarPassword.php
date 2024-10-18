<?php

function comprobarPassword($password, $password2 = null) {
    include_once '../../controlador/errores/errores.php';
    // Array para acumular los errores
    $errores = [ErroresPassword::CONTRASEÑA_INCORRECTA]; 

    // Comprobar si las contraseñas coinciden
    if ($password2 !== null && $password !== $password2) {
        $errores[] = ErroresPassword::CONTRASEÑAS_NO_COINCIDEN;
    }

    // Comprobar si la contraseña está definida y no está vacía
    if (!isset($password) || empty($password)) {
        $errores[] = ErroresPassword::CONTRASEÑA_VACIA;
    }

    // Comprobar longitud mínima de 8 caracteres
    if (strlen($password) < 8) {
        $errores[] = ErroresPassword::CONTRASEÑA_CORTA;
    }

    // Comprobar si contiene al menos un número
    if (!preg_match('/[0-9]/', $password)) {
        $errores[] = ErroresPassword::CONTRASEÑA_SIN_NUMERO;
    }

    // Comprobar si contiene al menos una letra minúscula
    if (!preg_match('/[a-z]/', $password)) {
        $errores[] = ErroresPassword::CONTRASEÑA_SIN_MINUSCULA;
    }

    // Comprobar si contiene al menos una letra mayúscula
    if (!preg_match('/[A-Z]/', $password)) {
        $errores[] = ErroresPassword::CONTRASEÑA_SIN_MAYUSCULA;
    }

    // Si hay errores, devolverlos; si no, devolver true
    if (!empty($errores)) {
        return $errores;
    }

    return true;
}

function verificarPassword_BD($usuario, $password, $nombre_usuario)
{
//password_verify Verifica si el hash almacenado en la BD coincide con la contraseña en texto plano introducida ppor el usuario. 
    if ($usuario && password_verify($password, $usuario['password'])) {
        // Autenticación exitosa
        session_start(); // Si aún no has iniciado la sesión
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['nombre_usuario'] = $nombre_usuario;
        return true;
    } else {
      
        return false;
    }
}
