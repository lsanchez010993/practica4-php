<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    session_start();
    if ($action === 'insertar') {
        insertarArticulo();
    }
}

function actualizarArticulo($id, $titulo, $contenido)
{
    try {
        require_once __DIR__ . '/../conexion.php';
        $pdo = connectarBD();

        // Consulta de actualización
        $sql = "UPDATE articles SET titol = :titol, cos = :cos WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':titol', $titulo);
        $stmt->bindParam(':cos', $contenido);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute(); // Devuelve true o false
    } catch (PDOException $e) {
      
        error_log("Error al actualizar el artículo: " . $e->getMessage());
        return false; // Devuelve false en caso de error
    }
}

function insertarArticulo()
{
    try {
        require_once __DIR__ . '/../conexion.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'];
            $contenido = $_POST['contenido'];
            $usuario_id = $_SESSION['usuario_id'];

            $pdo = connectarBD();
            $sql = "INSERT INTO articles (titol, cos, usuario_id) VALUES (:titol, :cos, :usuario_id)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':titol', $titulo);
            $stmt->bindParam(':cos', $contenido);
            $stmt->bindParam(':usuario_id', $usuario_id);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    } catch (PDOException $e) {
 
        error_log("Error al insertar el artículo: " . $e->getMessage());
        return false; // Devuelve false en caso de error
    }
}
