<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="../estils/estilos_login.css">
</head>
<body>
   
    <form action="../../modelo/user/iniciarSesion.php" method="POST">
        <label for="nombre_usuario">Nombre de Usuario:</label>
        <input type="text" name="nombre_usuario" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required><br>

        <button type="submit">Iniciar Sesión</button>
        <button type="button" onclick="location.href='../../index.php'">Atrás</button>
    </form>
    <?php
    // Mostrar mensajes de error si existen
    if (isset($errores) && !empty($errores)) {
        foreach ($errores as $error) {
            echo '<p style="color:red;">' . $error . '</p>';
        }
    }
    ?>
</body>
</html>
