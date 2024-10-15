<?php

function verificarPassword($usuario, $password, $nombre_usuario, &$errores)
{
    include "errores/errores.php";
    if ($usuario && password_verify($password, $usuario['password'])) {
        // Autenticación exitosa
        session_start(); // Si aún no has iniciado la sesión
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['nombre_usuario'] = $nombre_usuario;
        return true;
    } else {
        $error = Errores::ERROR_INICIO_SESION;
        include '../../vista/usuaris/inicioSesion.form.php';
        exit();
        return false;
    }
}

?>