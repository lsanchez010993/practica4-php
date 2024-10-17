<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="../estils/estilos_formulario.css">
</head>

<?php
// Inicialización de variables
$userDuplicado = "";
$errores = "";
$correcto = "";

// Procesar el formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Obtenemos los valores del formulario
    $nombre_usuario = $_POST['nombre_usuario'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validación de si el usuario está duplicado
    require_once "../../controlador/userController/validarUsuario.php";
    $userDuplicado = comprobarUsuarioRepe($nombre_usuario);

    if ($userDuplicado === false) {
        // Si el usuario no está duplicado, continuamos con la validación de la contraseña
        require_once "../../controlador/userController/validarPassword.php";
        $resultado = comprobarPassword($password, $confirm_password);

        if ($resultado === true) {
            // Validamos que las contraseñas coincidan
            if ($password === $confirm_password) {
                // Si la contraseña es válida y coincide, intentamos registrar al usuario
                require_once '../../modelo/user/registrarUsuario.php';
                $correcto = registrarUsuario($nombre_usuario, $email, $password);
            } else {
                $errores = "Las contraseñas no coinciden.";
            }
        } else {
            // Si la contraseña no es válida, mostramos el mensaje de error
            $errores = $resultado;
        }
    } else {
        // Si el usuario ya existe, no debemos continuar con el registro y mostramos el error
        $errores = $userDuplicado;
    }
}
?>

<body>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <label for="nombre_usuario">Nombre de Usuario:</label>
        <input type="text" name="nombre_usuario" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required><br>

        <label for="confirm_password">Confirmar Contraseña:</label>
        <input type="password" name="confirm_password" required><br>

        <button type="submit">Registrar</button>
        <button type="button" onclick="location.href='../../index.php'">Atrás</button>
    </form>

    <?php
    // Mostrar mensajes de error o éxito
    if (!empty($errores)) {
        echo '<p class="error">' . htmlspecialchars($errores) . '</p>';
    } elseif (!empty($correcto)) {
        echo '<p class="correcto">' . htmlspecialchars($correcto) . '</p>';
    }
    ?>
    
</body>

</html>
