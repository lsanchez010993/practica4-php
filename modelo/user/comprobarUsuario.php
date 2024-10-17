<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim(strtolower($_POST['nombre_usuario'])); // Normalizamos el nombre de usuario
    $existe = usuarioRepetido($usuario);
    
    // Comprobar si el usuario ya existe
    if ($existe) {
      
        echo "El usuario ya existe.";
       
    } else {
        echo "El usuario está disponible.";
       
    }
}

function usuarioRepetido($usuario) {
    require_once '../../modelo/conexion.php';

    $pdo = connectarBD();
    
    // Consulta para verificar si el usuario ya existe
    $sql = "SELECT COUNT(*) FROM usuarios WHERE LOWER(nombre_usuario) = :nombre_usuario";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nombre_usuario', $usuario);
    $stmt->execute();
    
    // Obtener el número de filas que coinciden
    $count = $stmt->fetchColumn();

    // Si hay más de 0 coincidencias, el usuario ya existe
    return $count > 0;
}
?>
