<form action="../controlador/usuarioController.php?action=iniciarSesion" method="POST">
    <label for="nombre_usuario">Nombre de Usuario:</label>
    <input type="text" name="nombre_usuario" required><br>

    <label for="contraseña">Contraseña:</label>
    <input type="password" name="contraseña" required><br>

    <button type="submit">Iniciar Sesión</button>
</form>
