<?php
function registrarUsuario($nombre_usuario, $email, $password)
{
    require_once "../../modelo/conexion.php"; // Incluimos la conexión a la base de datos
    $pdo = connectarBD();

    // Hashear la contraseña
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insertar el usuario en la base de datos
    $sql = "INSERT INTO usuarios (nombre_usuario, email, password) VALUES (:nombre_usuario, :email, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nombre_usuario', $nombre_usuario);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPassword);

    if ($stmt->execute()) {
        return "Usuario registrado con éxito.";
    } else {
        return "Error al registrar el usuario.";
    }
}
?>
