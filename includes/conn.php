<?php
$host = "localhost";
$user = "root" /*"id20936476_root"*/;
$pass = ""/*"Wander1405."*/;
$db = "prueba"/* "id20936476_gestion_estudiantes"*/;

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("No se pudo conectar a la base de datos: " . $conn->connect_error);
}   
?>