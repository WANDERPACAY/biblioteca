<div class="container">
    <h2>Registrar Préstamo</h2>

    <!-- Formulario de registro de préstamos -->
    <form action="../db/crear_prestamo.php" method="post">
        <div class="form-group">
            <label for="cliente_usuario">Nombre de Usuario del Cliente:</label>
            <input type="text" class="form-control" id="cliente_usuario" name="cliente_usuario" required>
        </div>
        <div class="form-group">
            <label for="libro_titulo">Título del Libro:</label>
            <input type="text" class="form-control" id="libro_titulo" name="libro_titulo" required>
        </div>
        <div class="form-group">
            <label for="fecha_prestamo">Fecha de Préstamo:</label>
            <input type="date" class="form-control" id="fecha_prestamo" name="fecha_prestamo" required>
        </div>
        <div class="form-group">
            <label for="fecha_devolucion">Fecha de Devolución:</label>
            <input type="date" class="form-control" id="fecha_devolucion" name="fecha_devolucion">
        </div>
        <button type="submit" class="btn btn-primary">Registrar Préstamo</button>
    </form>
</div>

<!-- Agrega enlaces a los archivos JS de Bootstrap y jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
