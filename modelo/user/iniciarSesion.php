<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    iniciarSesion();
}
function iniciarSesion()
{

    require_once '../../modelo/conexion.php';
    require_once "../../controlador/userController.php";

   
    $correcto; 
    $error;

    $nombre_usuario = $_POST['nombre_usuario'];
    $password = $_POST['password'];

    $pdo = connectarBD();
    $sql = "SELECT id, password FROM usuarios WHERE nombre_usuario = :nombre_usuario";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nombre_usuario', $nombre_usuario);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
 
   
    if (verificarPassword($usuario, $password, $nombre_usuario, $errores)) {
        
        header("Location: ../../index.php");
        exit();
    } else {
        // Si hay errores, incluimos el formulario y los errores estarán disponibles
        require '../../vista/usuaris/inicioSesion.form.php';
        exit();
    }
}
