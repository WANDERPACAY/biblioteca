<div class="container">
    <h2>Registrar Libro</h2>

    <!-- Formulario de registro de libros -->
    <form action="../db/crear_libro.php" method="post">
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="form-group">
            <label for="autor">Autor:</label>
            <input type="text" class="form-control" id="autor" name="autor" required>
        </div>
        <div class="form-group">
            <label for="genero">Género:</label>
            <input type="text" class="form-control" id="genero" name="genero" required>
        </div>
        <div class="form-group">
            <label for="ano_publicacion">Año de Publicación:</label>
            <input type="number" class="form-control" id="ano_publicacion" name="ano_publicacion" required>
        </div>
        <div class="form-group">
            <label for="isbn">ISBN:</label>
            <input type="text" class="form-control" id="isbn" name="isbn" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar Libro</button>
    </form>
</div>

<!-- Agrega enlaces a los archivos JS de Bootstrap y jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

