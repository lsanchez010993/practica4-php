<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../estils/estilos_formulario.css">
</head>


<?php

// Procesar el formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../../modelo/user/registrarUsuario.php';
}

// Mostrar el formulario solo si no se ha enviado con éxito

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
    if (!empty($correcto)) {
        echo "<p>$correcto</p>";
    }
    ?>
</body>

</html>
<?php



// Mostrar mensaje de éxito si el registro fue exitoso

?>