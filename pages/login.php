<?php
session_start();
// Establecer la conexión a la base de datos (reemplaza con tus propios detalles de conexión)
include '../includes/conn.php';

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    // Consultar la base de datos de clientes
    $consulta_clientes = "SELECT * FROM clientes WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
    $resultado_clientes = $conn->query($consulta_clientes);

    // Consultar la base de datos de usuarios
    $consulta_usuarios = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
    $resultado_usuarios = $conn->query($consulta_usuarios);

    if ($resultado_clientes->num_rows == 1) {
        // Inicio de sesión exitoso para cliente
        $_SESSION['usuario'] = $usuario;
        header("Location: inicioclientes.php");
    } elseif ($resultado_usuarios->num_rows == 1) {
        // Inicio de sesión exitoso para usuario
        $_SESSION['usuario'] = $usuario;
        header("Location: iniciousuarios.php");
    } else {
        // Inicio de sesión fallido
        $mensaje_error = "Credenciales incorrectas. Por favor, intenta nuevamente.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Iniciar sesión</title>
</head>

<body>
    <h2>Iniciar sesión</h2>
    <form action="login.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br>

        <label for="contrasena">Contraseña:</label>
        <input type="text" id="contrasena" name="contrasena" required><br>

        <input type="submit" value="Iniciar sesión">
    </form>
    <?php if (isset($mensaje_error)) echo "<p>$mensaje_error</p>"; ?>
</body>
</html>