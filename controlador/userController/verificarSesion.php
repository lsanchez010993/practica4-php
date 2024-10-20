<?php

function verificarSesion()
{
      if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION['usuario_id'])) {
        if (time() - $_SESSION['login_time'] > 2400) { 
            // var_dump("Estoy a punto  de destruir la sesion");
            // exit();
            // La sesión ha expirado
            session_unset();
            session_destroy();
            // Redirigir 
            header('Location: ../../vista/usuaris/sesionExpirada.php');
            exit();
        } else {
            // La sesión es válida, actualizamos el tiempo
            $_SESSION['login_time'] = time();
        }
    } else {
        header('Location: index.php');
        exit();
    }
}
function inicioSesion()
{
    ini_set('session.gc_maxlifetime', 2400); 
    session_set_cookie_params(2400);
    $_SESSION['login_time'] = time();

  
}
