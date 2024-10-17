<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_usuario = $_POST['nombre_usuario'];
    usuarioRepetido($nombre_usuario);
    // Comprobar si el usuario ya existe
    
}

function usuarioRepetido($usuario) {
    require_once '../../modelo/conexion.php';

    $pdo = connectarBD();
    
    // Consulta para verificar si el usuario ya existe
    $sql = "SELECT COUNT(*) FROM usuarios WHERE nombre_usuario = :nombre_usuario";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nombre_usuario', $usuario);
    $stmt->execute();
    
    // Obtener el número de filas que coinciden
    $count = $stmt->fetchColumn();

    // Si hay más de 0 coincidencias, el usuario ya existe
    if ($count > 0) {
        return true;
    } else {
        return false;
    }
}
