<?php
function eliminarArticulo($id)
{

    require_once __DIR__ . '/../conexion.php';
    
    $pdo = connectarBD();
    $sql = "DELETE FROM articles WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute(); // Asegúrate de ejecutar la consulta

    header("Location: ../../index.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    eliminarArticulo($id);
} else {
    echo "No se ha proporcionado un ID válido para eliminar el artículo.";
}
?>
