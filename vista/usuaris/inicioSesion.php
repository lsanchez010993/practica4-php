<form action="../../controlador/userController.php?action=iniciarSesion" method="POST">
    <label for="nombre_usuario">Nombre de Usuario:</label>
    <input type="text" name="nombre_usuario" required><br>

    <label for="pass">Contraseña:</label>
    <input type="password" name="password" required><br>

    <button type="submit">Iniciar Sesión</button>
    <p><?php
        session_start();
        if (isset($_SESSION['mensaje_exito'])) {
            echo "<p style='color: green; font-size: 28px;'>" . htmlspecialchars($_SESSION['mensaje_exito']) . "</p>";
            unset($_SESSION['mensaje_exito']);
        }

        if (isset($_SESSION['mensaje_error'])) {
            echo "<p style='color: red; font-size: 28px;'>" . htmlspecialchars($_SESSION['mensaje_error']) . "</p>";
            unset($_SESSION['mensaje_error']);
            session_destroy();
        }
        ?>
    </p>
</form>