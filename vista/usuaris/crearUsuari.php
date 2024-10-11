<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../../controlador/userController.php?action=registrarUsuario" method="POST">
        <label for="nombre_usuario">Nombre de Usuario:</label>
        <input type="text" name="nombre_usuario" required><br>
    
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
    
        <label for="pass">Contraseña:</label>
        <input type="password" name="pass" required><br>
    
        <button type="submit">Registrar</button>
    </form>
    
</body>
</html>