<?php
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establece la conexión a la base de datos (ajusta los detalles de conexión)
    include '../includes/conn.php';

    // Recoge los valores del formulario
    $titulo = trim($_POST["titulo"]);
    $autor = trim($_POST["autor"]);
    $genero = trim($_POST["genero"]);
    $ano_publicacion = $_POST["ano_publicacion"];
    $isbn = trim($_POST["isbn"]);

    // Variables para mostrar mensaje y redirigir
    $mensajeError = "";
    $redireccion = "../pages/libros.php";

    // Validación de campos no vacíos ni con solamente espacios
    if (empty($titulo) || empty($autor) || empty($ano_publicacion) || empty($isbn)) {
        $mensajeError = "Por favor, completa todos los campos obligatorios.";
    } elseif (empty($genero)) {
        $mensajeError = "Por favor, completa el campo obligatorio Género.";
    } else {
        // Consulta para insertar el libro en la base de datos
        $consulta = "INSERT INTO libros (titulo, autor, genero, ano_publicacion, isbn)
                     VALUES ('$titulo', '$autor', '$genero', '$ano_publicacion', '$isbn')";

        if ($conn->query($consulta) === TRUE) {
            $redireccion = "Location: ../pages/libros.php";
        } else {
            $mensajeError = "Error al registrar el libro: " . $conn->error;
        }
    }

    $conn->close();

    // Mostrar mensaje de error y redireccionar después de un momento
    echo "<script>
            alert('$mensajeError');
            setTimeout(function() {
                window.location.href = '$redireccion';
            }, 3000); // 3000 milisegundos = 3 segundos
          </script>";
}
?>
