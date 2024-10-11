<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu principal</title>
    <link rel="stylesheet" href="vista/estils/estils_Index.css">

</head>

<body>
<?php
session_start();

if (!isset($_SESSION['nombre_usuario'])) {
    // El usuario no ha iniciado sesión
    echo '<div class="inicio">';
    echo '<button onclick="location.href=\'vista/usuaris/inicioSesion.php\'">Iniciar Sesión</button>';
    echo '<button onclick="location.href=\'vista/usuaris/crearUsuari.php\'">Registrarse</button>';  
    echo '</div>';

    // Mostrar la vista con artículos generales
    require_once 'vista/articles/vistaArticulosGeneral.php';
    
} else {
    // El usuario ha iniciado sesión, mostrar artículos solo del usuario autenticado
    require_once 'vista/articles/vistaArticulosUsuario.php';
   
}

?>

</body>

</html>