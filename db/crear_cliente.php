<?php
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establece la conexión a la base de datos (ajusta los detalles de conexión)
    include '../includes/conn.php';

    // Recoge los valores del formulario
    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $genero = $_POST["genero"];
    $ano_publicacion = $_POST["ano_publicacion"];
    $isbn = $_POST["isbn"];

    // Consulta para insertar el libro en la base de datos
    $consulta = "INSERT INTO libros (titulo, autor, genero, ano_publicacion, isbn)
                 VALUES ('$titulo', '$autor', '$genero', '$ano_publicacion', '$isbn')";

    if ($conn->query($consulta) === TRUE) {
        header("Location: ../pages/libros.php");
    } else {
        echo "Error al registrar el libro: " . $conn->error;
    }

    $conn->close();
}
?>
