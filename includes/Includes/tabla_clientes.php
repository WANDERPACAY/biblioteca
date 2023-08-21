<div class="container">
    <h2>Lista de Clientes</h2>

    <!-- Barra de búsqueda -->
    <div class="form-group">
        <label for="busqueda">Buscar Clientes:</label>
        <input type="text" id="busqueda" class="form-control" placeholder="Nombre, apellido, correo, teléfono...">
    </div>

    <!-- Tabla de clientes -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Usuario</th>
            </tr>
        </thead>
        <tbody id="clientTable">
            <?php
            // Establece la conexión a la base de datos (ajusta los detalles de conexión)
            include '../includes/conn.php';

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Consulta para obtener los clientes
            $consulta = "SELECT * FROM clientes";
            $resultado = $conn->query($consulta);

            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila["nombre"] . "</td>";
                    echo "<td>" . $fila["apellido"] . "</td>";
                    echo "<td>" . $fila["correo"] . "</td>";
                    echo "<td>" . $fila["telefono"] . "</td>";
                    echo "<td>" . $fila["direccion"] . "</td>";
                    echo "<td>" . $fila["usuario"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No se encontraron clientes</td></tr>";
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
// Función para filtrar la tabla de clientes
function filtrarClientes() {
    var input = document.getElementById("busqueda");
    var filter = input.value.toLowerCase();
    var table = document.getElementById("clientTable");
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

document.getElementById("busqueda").addEventListener("input", filtrarClientes);
</script>
