<div class="container">
    <h2>Lista de Libros</h2>

    <!-- Barra de búsqueda -->
    <div class="form-group">
        <label for="busqueda">Buscar Libros:</label>
        <input type="text" id="busqueda" class="form-control" placeholder="Título, autor, género, ISBN...">
    </div>

    <!-- Tabla de libros -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Género</th>
                <th>Año de Publicación</th>
                <th>ISBN</th>
            </tr>
        </thead>
        <tbody id="bookTable">
            <?php
            // Establece la conexión a la base de datos (ajusta los detalles de conexión)
            include '../includes/conn.php';

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Consulta para obtener los libros
            $consulta = "SELECT * FROM libros";
            $resultado = $conn->query($consulta);

            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila["titulo"] . "</td>";
                    echo "<td>" . $fila["autor"] . "</td>";
                    echo "<td>" . $fila["genero"] . "</td>";
                    echo "<td>" . $fila["ano_publicacion"] . "</td>";
                    echo "<td>" . $fila["isbn"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No se encontraron libros</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<!-- Agrega enlaces a los archivos JS de Bootstrap y jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
// Función para filtrar la tabla de libros
function filtrarLibros() {
    var input = document.getElementById("busqueda");
    var filter = input.value.toLowerCase();
    var table = document.getElementById("bookTable");
    var rows = table.getElementsByTagName("tr");

    for (var i = 0; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName("td");
        var shouldShow = false;

        for (var j = 0; j < cells.length; j++) {
            var cell = cells[j];
            if (cell) {
                var cellText = cell.textContent || cell.innerText;
                if (cellText.toLowerCase().indexOf(filter) > -1) {
                    shouldShow = true;
                    break;
                }
            }
        }

        if (shouldShow) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }
    }
}

document.getElementById("busqueda").addEventListener("input", filtrarLibros);
</script>

</body>
</html>
