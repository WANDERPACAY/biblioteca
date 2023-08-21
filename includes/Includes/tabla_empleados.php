<div class="container">
    <h2>Lista de Empleados</h2>

    <!-- Barra de búsqueda -->
    <div class="form-group">
        <label for="busqueda">Buscar Empleados:</label>
        <input type="text" id="busqueda" class="form-control" placeholder="Nombre, apellido, correo, teléfono...">
    </div>

    <!-- Tabla de empleados -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Usuario</th>
                <th>Usuario</th>
            </tr>
        </thead>
        <tbody id="employeeTable">
            <?php
            // Establece la conexión a la base de datos (ajusta los detalles de conexión)
            include '../includes/conn.php';

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Consulta para obtener los empleados
            $consulta = "SELECT * FROM usuarios";
            $resultado = $conn->query($consulta);

            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila["nombre"] . "</td>";
                    echo "<td>" . $fila["apellido"] . "</td>";
                    echo "<td>" . $fila["usuario"] . "</td>";
                    echo "<td>" . $fila["contrasena"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No se encontraron empleados</td></tr>";
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
// Función para filtrar la tabla de empleados
function filtrarEmpleados() {
    var input = document.getElementById("busqueda");
    var filter = input.value.toLowerCase();
    var table = document.getElementById("employeeTable");
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

document.getElementById("busqueda").addEventListener("input", filtrarEmpleados);
</script>
