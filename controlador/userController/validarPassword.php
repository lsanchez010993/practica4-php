<?php
function comprobarPassword($password) {
    // Comprobar si la contraseña está definida y no está vacía
    if (!isset($password) || empty($password)) {
        return "La contraseña no puede estar vacía.";
    }

    // Comprobar longitud mínima de 8 caracteres
    if (strlen($password) < 8) {
        return "La contraseña debe tener al menos 8 caracteres.";
    }

    // Comprobar si contiene al menos un número
    if (!preg_match('/[0-9]/', $password)) {
        return "La contraseña debe contener al menos un número.";
    }

    // Comprobar si contiene al menos una letra minúscula
    if (!preg_match('/[a-z]/', $password)) {
        return "La contraseña debe contener al menos una letra minúscula.";
    }

    // Comprobar si contiene al menos una letra mayúscula
    if (!preg_match('/[A-Z]/', $password)) {
        return "La contraseña debe contener al menos una letra mayúscula.";
    }

    // Si pasa todas las validaciones
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
