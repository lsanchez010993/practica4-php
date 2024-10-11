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
    }elseif ($_GET['action'] === 'cerrarSesion') {
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../index.php");
        exit();
    }
    
}



function registrarUsuario() {
    require_once '../modelo/conexion.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre_usuario = $_POST['nombre_usuario'];
        $email = $_POST['email'];
        $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);  

        $pdo = connectarBD();
        $sql = "INSERT INTO usuarios (nombre_usuario, email, password) VALUES (:nombre_usuario, :email, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre_usuario', $nombre_usuario);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password); 

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
    require_once '../modelo/conexion.php';  // Asegúrate de que esta ruta es correcta

    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre_usuario = $_POST['nombre_usuario'];
        $password = $_POST['password'];

        $pdo = connectarBD();
        $sql = "SELECT id, password FROM usuarios WHERE nombre_usuario = :nombre_usuario";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre_usuario', $nombre_usuario);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
   
     
        // Verificar si se encontró el usuario y si la contraseña es correcta
        if ($usuario && password_verify($password, $usuario['password'])) {
            // Autenticación exitosa
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['nombre_usuario'] = $nombre_usuario;
            header("Location: ../index.php");  // Redirigir al inicio
            exit();
        } else {
            // Error en las credenciales
            $_SESSION['mensaje_error'] = "Credenciales incorrectas.";
            header("Location: ../vista/usuaris/inicioSesion.php");  // Redirigir a la página de inicio de sesión
            exit();
        }
    }
    
}



?>