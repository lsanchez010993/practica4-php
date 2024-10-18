<?php
function contarArticulos($usuario_id = null)
{
    $pdo = connectarBD();

    // Verifica si se proporcionó un usuario_id para contar los artículos de un usuario específico
    if ($usuario_id) {
        $sql = "SELECT COUNT(*) FROM articles WHERE usuario_id = :usuario_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT); // Asignar valor antes de ejecutar
    } else {
        // Si no se proporciona usuario_id, contar todos los artículos
        $sql = "SELECT COUNT(*) FROM articles";
        $stmt = $pdo->prepare($sql);
    }

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el número de artículos
    $count = $stmt->fetchColumn();

    return $count;
}
?>