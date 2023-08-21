<?php
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establece la conexión a la base de datos (ajusta los detalles de conexión)
    include '../includes/conn.php';

    // Recoge los valores del formulario
    $clienteUsuario = trim($_POST["cliente_usuario"]);
    $libroTitulo = trim($_POST["libro_titulo"]);
    $fechaPrestamo = $_POST["fecha_prestamo"];
    $fechaDevolucion = $_POST["fecha_devolucion"];
    
    // Variables para mostrar mensaje y redirigir
    $mensajeError = "registro exitoso";
    $redireccion = "../pages/prestamos.php";

    // Validación de campos no vacíos ni con solamente espacios
    if (empty($clienteUsuario) || empty($libroTitulo) || empty($fechaPrestamo)) {
        $mensajeError = "Por favor, completa todos los campos obligatorios.";
    } else {
        // Obtener ID de cliente y libro a partir de sus nombres
        $consultaCliente = "SELECT id FROM clientes WHERE usuario = '$clienteUsuario'";
        $resultadoCliente = $conn->query($consultaCliente);
        $consultaLibro = "SELECT id FROM libros WHERE titulo = '$libroTitulo'";
        $resultadoLibro = $conn->query($consultaLibro);

        if ($resultadoCliente->num_rows > 0 && $resultadoLibro->num_rows > 0) {
            $filaCliente = $resultadoCliente->fetch_assoc();
            $filaLibro = $resultadoLibro->fetch_assoc();

            // Obtener IDs de cliente y libro
            $clienteId = $filaCliente["id"];
            $libroId = $filaLibro["id"];

            // Consulta para insertar el préstamo en la base de datos
            $consulta = "INSERT INTO prestamos (cliente_id, libro_id, fecha_prestamo, fecha_devolucion)
                         VALUES ('$clienteId', '$libroId', '$fechaPrestamo', '$fechaDevolucion')";

            if ($conn->query($consulta) === TRUE) {
                $mensajeError = "Registro exitoso";
            } else {
                $mensajeError = "Error al registrar el préstamo: " . $conn->error;
            }
        } else {
            $mensajeError = "El cliente o el libro no existen.";
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
