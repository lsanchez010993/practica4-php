<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    registrarUsuario();
}
function registrarUsuario()
{
    require_once '../conexion.php';
    require_once "../../controlador/userController.php";
    $errores; // Declaramos el array de errores
    $correcto; 

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
      require '../../controlador/mensajes/mensajes.php';
       
        $correcto = Mensajes::MENSAJE_EXITO_CREAR_USUARIO;
        include '../../vista/usuaris/crearUsuario.php';
        exit();
    }else{
        require '../../controlador/mensajes/mensajes.php';
       
        $error = Errores::ERROR_CREAR_USUARIO;
        include '../../vista/usuaris/crearUsuario.php';
        exit();
    } 
}
