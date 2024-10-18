<?php
function obtenerArticuloPorId($id) {
    require_once __DIR__ . '/../conexion.php';
    $pdo = connectarBD();
    $sql = "SELECT * FROM articles WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>