<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="../estils/estilos_formulario.css">
</head>

<?php
// Inicializar variables
$nombre_usuario = "";
$email = "";
$password = "";
$confirm_password = "";
$errores = "";

// Procesar el formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtenemos los valores del formulario
    $nombre_usuario = $_POST['nombre_usuario'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    require_once '../../controlador/userController/validarUsuario.php';
    // Llamar a la función para validar datos:
    $errores = validarDatosNewUser($nombre_usuario, $email, $password, $confirm_password);
}
?>

<body>
    <h1>Crear nuevo usuario</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <label for="nombre_usuario">Nombre de Usuario:</label>
        <!-- Mantener el valor ingresado si hay errores -->
        <input type="text" name="nombre_usuario" value="<?php echo htmlspecialchars($nombre_usuario); ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" value="<?php echo htmlspecialchars($password); ?>" required><br>

        <label for="confirm_password">Confirmar Contraseña:</label>
        <input type="password" name="confirm_password" value="<?php echo htmlspecialchars($confirm_password); ?>" required><br>

        <button type="submit">Registrar</button>
        <button type="button" onclick="location.href='../../index.php'">Atrás</button>
        <?php
        // Mostrar los errores, si existen
        if (!empty($errores)) {
            foreach ($errores as $error) {
                if (strpos($error, '!') !== false) {
                    echo '<p class="correcto">' . htmlspecialchars($error) . '</p>';
                } else {
                    echo '<p class="error">' . htmlspecialchars($error) . '</p>';
                }
            }
        }
        ?>
    </form>


</body>

</html>