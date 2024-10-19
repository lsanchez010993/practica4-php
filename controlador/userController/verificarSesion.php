<?php

function verificarSesion()
{
    // Iniciar la sesión si aún no está iniciada
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['usuario_id'])) {
        if (time() - $_SESSION['login_time'] > 2400) { // O 60 para pruebas
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
    // Configurar y iniciar la sesión
    // Establecer la vida útil de la sesión a 1 minuto
    ini_set('session.gc_maxlifetime', 2400);

    // Establecer la vida útil de la cookie de sesión a 1 minuto
    session_set_cookie_params(2400);

    // Configurar el garbage collector para que se ejecute en cada solicitud (solo para pruebas)
    ini_set('session.gc_probability', 1);
    ini_set('session.gc_divisor', 1);
}
