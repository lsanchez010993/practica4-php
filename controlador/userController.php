<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action === 'registrarUsuario') {
        $id = $_GET['id'];
        registrarUsuario();
    } elseif ($action === 'iniciarSesion'){
        iniciarSesion();
    }
}


function registrarUsuario() {
    require_once '../modelo/conexion.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre_usuario = $_POST['nombre_usuario'];
        $email = $_POST['email'];
        $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);  // Hashear la contraseña

        $pdo = connectarBD();
        $sql = "INSERT INTO usuarios (nombre_usuario, email, contraseña) VALUES (:nombre_usuario, :email, :contraseña)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre_usuario', $nombre_usuario);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':contraseña', $contraseña);

        if ($stmt->execute()) {
            // Usuario registrado correctamente
            $_SESSION['mensaje_exito'] = "Usuario registrado correctamente.";
        } else {
            // Error en el registro
            $_SESSION['mensaje_error'] = "Error al registrar el usuario.";
        }

        header("Location: ../vista/registrar.php");
        exit();
    }
}
function iniciarSesion() {
    require_once '../modelo/conexion.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre_usuario = $_POST['nombre_usuario'];
        $contraseña = $_POST['contraseña'];

        $pdo = connectarBD();
        $sql = "SELECT id, contraseña FROM usuarios WHERE nombre_usuario = :nombre_usuario";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre_usuario', $nombre_usuario);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($contraseña, $usuario['contraseña'])) {
            // Autenticación exitosa
            session_start();
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['nombre_usuario'] = $nombre_usuario;
            header("Location: ../index.php");
            exit();
        } else {
            // Error en las credenciales
            $_SESSION['mensaje_error'] = "Credenciales incorrectas.";
            header("Location: ../vista/login.php");
            exit();
        }
    }
}

?>