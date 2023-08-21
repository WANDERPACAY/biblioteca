<div class="container">
    <h2>Lista de Préstamos</h2>

    <!-- Barra de búsqueda -->
    <div class="form-group">
        <label for="busqueda">Buscar Préstamos:</label>
        <input type="text" id="busqueda" class="form-control" placeholder="Cliente, libro, fecha...">
    </div>

    <!-- Tabla de préstamos -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Libro</th>
                <th>Fecha de Préstamo</th>
                <th>Fecha de Devolución</th>
            </tr>
        </thead>
        <tbody id="loanTable">
            <?php
            // Establece la conexión a la base de datos (ajusta los detalles de conexión)
            include '../includes/conn.php';

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Consulta para obtener los préstamos con los detalles de cliente y libro
            $consulta = "SELECT c.nombre AS cliente, l.titulo AS libro, p.fecha_prestamo, p.fecha_devolucion FROM prestamos p
                         INNER JOIN clientes c ON p.cliente_id = c.id
                         INNER JOIN libros l ON p.libro_id = l.id";
            $resultado = $conn->query($consulta);

            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila["cliente"] . "</td>";
                    echo "<td>" . $fila["libro"] . "</td>";
                    echo "<td>" . $fila["fecha_prestamo"] . "</td>";
                    echo "<td>" . ($fila["fecha_devolucion"] ?? 'No devuelto') . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No se encontraron préstamos</td></tr>";
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
// Función para filtrar la tabla de préstamos
function filtrarPrestamos() {
    var input = document.getElementById("busqueda");
    var filter = input.value.toLowerCase();
    var table = document.getElementById("loanTable");  // Cambia el ID de la tabla a "loanTable"
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

document.getElementById("busqueda").addEventListener("input", filtrarPrestamos);
</script>

