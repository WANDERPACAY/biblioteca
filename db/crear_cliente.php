<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../includes/conn.php';

    $nombre = trim($_POST["nombre"]);
    $apellido = trim($_POST["apellido"]);
    $correo = trim($_POST["correo"]);
    $telefono = trim($_POST["telefono"]);
    $direccion = trim($_POST["direccion"]);
    $usuario = trim($_POST["usuario"]);
    $contrasena = trim($_POST["contrasena"]);

    $mensajeError = "registro exitoso";
    $redireccion = "../pages/clientes.php";

    if (empty($nombre) || empty($apellido) || empty($correo) || empty($usuario) || empty($contrasena)) {
        $mensajeError = "Por favor, completa todos los campos obligatorios.";
    } elseif ($telefono < 0) {
        $mensajeError = "El número de teléfono no puede ser negativo.";
    } else {
        $consulta = "INSERT INTO clientes (nombre, apellido, correo, telefono, direccion, usuario, contrasena)
                     VALUES ('$nombre', '$apellido', '$correo', '$telefono', '$direccion', '$usuario', '$contrasena')";

        if (!$conn->query($consulta)) {
            $mensajeError = "Error al registrar el cliente: " . $conn->error;
        }
    }

    $conn->close();
}
?>

<!-- Mostrar mensaje de error o éxito -->
<script>
    alert('<?php echo $mensajeError; ?>');
    setTimeout(function() {
        window.location.href = '<?php echo $redireccion; ?>';
    }, 3000); // 3000 milisegundos = 3 segundos
</script>
