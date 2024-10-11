<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action === 'registrarUsuario') {
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
        $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);  // Cambié 'contraseña' por 'password'

        $pdo = connectarBD();
        $sql = "INSERT INTO usuarios (nombre_usuario, email, password) VALUES (:nombre_usuario, :email, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre_usuario', $nombre_usuario);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);  // Cambié ':contraseña' por ':password'

        if ($stmt->execute()) {
            // Usuario registrado correctamente
            $_SESSION['mensaje_exito'] = "Usuario registrado correctamente.";
        } else {
            // Error en el registro
            $_SESSION['mensaje_error'] = "Error al registrar el usuario.";
        }

        header("Location: ../index.php");
        exit();
    }
}


function iniciarSesion() {
    require_once '../modelo/conexion.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre_usuario = $_POST['nombre_usuario'];
        $password = $_POST['password'];  // Cambié 'contraseña' a 'password'

        $pdo = connectarBD();
        $sql = "SELECT id, password FROM usuarios WHERE nombre_usuario = :nombre_usuario";  // Asegúrate de que la columna en la BD sea 'contraseña'
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre_usuario', $nombre_usuario);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($password, $usuario['contraseña'])) {
            // Autenticación exitosa
            session_start();
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['nombre_usuario'] = $nombre_usuario;
            header("Location: ../../index.php");
            exit();
        } else {
            // Error en las credenciales
            $_SESSION['mensaje_error'] = "Credenciales incorrectas.";
            header("Location: ../vista/usuaris/inicioSesion.php");
            exit();
        }
    }
}


?>