<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <script>
        document.querySelector("form").addEventListener("submit", function(e) {
            const password = document.getElementById("pass").value;
            const confirmPassword = document.getElementById("confirm_pass").value;

            if (password !== confirmPassword) {
                e.preventDefault();
                alert("Las contraseñas no coinciden.");
            }
        });
    </script>
</head>

<body>


    <form action="../../modelo/user/registrarUsuario.php" method="POST">
        <label for="nombre_usuario">Nombre de Usuario:</label>
        <input type="text" id="nombre_usuario" name="nombre_usuario" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="pass">Contraseña:</label>
        <input type="password" id="pass" name="pass" required><br>

        <label for="confirm_pass">Confirmar Contraseña:</label>
        <input type="password" id="confirm_pass" name="confirm_pass" required><br>

        <button type="submit">Registrar</button>
     
        <button type="button" onclick="location.href='../../index.php'">Atrás</button>
        <?php
        if (isset($correcto) && !empty($correcto)) {
            echo '<p style="color:green;">' . $correcto . '</p>';
        }
        if (isset($error) && !empty($error)){
            echo '<p style="color:green;">' . $error . '</p>';

        }
        ?>
    </form>
</body>

</html>