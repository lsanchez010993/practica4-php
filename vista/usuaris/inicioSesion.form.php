<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="../estils/estilos_formulario.css">
</head>

<?php


// Comprobación del envío del formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtenemos los valores del formulario
    $nombre_usuario = $_POST['nombre_usuario'];
    $password = $_POST['password'];

    // Validación de la contraseña
    require_once "../../controlador/userController/validarPassword.php";
    $resultado = comprobarPassword($password);
  

    if ($resultado === true) {
        include '../../modelo/user/iniciarSesion.php';
        // Si la contraseña es válida, intentamos iniciar sesión
        $errores = iniciarSesion();
    } else {
        // Si la contraseña no es válida, mostramos el mensaje de error
        $errores = $resultado;
    }
}
?>

<body>
    <h1>Inicio de sesion</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <label for="nombre_usuario">Nombre de Usuario:</label>
        <input type="text" name="nombre_usuario" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required><br>

        <button type="submit">Iniciar Sesión</button>
        <button type="button" onclick="location.href='../../index.php'">Atrás</button>

        <?php
        // Mostrar errores si existen
        if (!empty($errores)) {
            var_dump($errores);
            foreach ($errores as $error) {
                if (strpos($error, '!') !== false)  echo '<p class="correcto">' . htmlspecialchars($error) . '</p>';
                else echo '<p class="error">' . htmlspecialchars($error) . '</p>';
            }
        }
    
        ?>
    </form>

</body>

</html>
