<?php
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establece la conexión a la base de datos (ajusta los detalles de conexión)
    include '../includes/conn.php';

    // Recoge los valores del formulario
    $nombre = trim($_POST["nombre"]);
    $apellido = trim($_POST["apellido"]);
    $usuario = trim($_POST["usuario"]);
    $contrasena = trim($_POST["contrasena"]);

    // Variables para mostrar mensaje y redirigir
    $mensajeError = "Registro exitoso";
    $redireccion = "../pages/usuarios.php";

    // Validación de campos no vacíos ni con solamente espacios
    if (empty($nombre) || empty($apellido) || empty($usuario) || empty($contrasena)) {
        $mensajeError = "Por favor, completa todos los campos obligatorios.";
    } else {
        // Consulta para insertar el usuario en la base de datos
        $consulta = "INSERT INTO usuarios (nombre, apellido, usuario, contrasena)
                     VALUES ('$nombre', '$apellido', '$usuario', '$contrasena')";

        if ($conn->query($consulta) !== TRUE) {
            $mensajeError = "Error al registrar el usuario: " . $conn->error;
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Agrega enlaces a los archivos JS de Bootstrap y jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Mostrar mensaje de error y redirigir después de un momento -->
    <script>
        alert('<?php echo $mensajeError; ?>');
        setTimeout(function() {
            window.location.href = '<?php echo $redireccion; ?>';
        }, 3000); // 3000 milisegundos = 3 segundos
    </script>
</body>
</html>
