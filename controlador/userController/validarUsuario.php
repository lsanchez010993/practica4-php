<?php
function comprobarUsuarioRepe($usuario)
{
    require_once "../../modelo/user/comprobarUsuario.php";
    if (usuarioRepetido($usuario)) {
       return "El nombre de usuario ya está en uso.";
        
    } else {
      
        return false;
    }
}
