<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/inicio.css">
    <title>Document</title>
</head>

<body>
    <link href="https://fonts.googleapis.com/css?family=DM+Sans:400,500,700&display=swap" rel="stylesheet">
    <div class="task-manager">
        <?php
        include '../includes/Includes/leftbar.php'
        ?>
        <div class="page-content">
            <div class="header">Administrador</div>
            <div class="content-categories">
                <div class="label-wrapper">
                    <input class="nav-item" name="nav" type="radio" id="opt-1" checked onclick="redirectToPage('libros.php')">
                    <label class="category" for="opt-1">Empleados</label>
                </div>
            </div>

            <div class="tasks-wrapper">
                <form method="post">
                    <button type="submit" name="boton1">Agregar Empleado</button>
                    <button type="submit" name="boton2">Mostrar Empleados</button>
                </form>
                <?php
                if (isset($_POST['boton1'])) {
                    include '../includes/Includes/formulario_empleado.php';
                } elseif (isset($_POST['boton2'])) {
                    include '../includes/Includes/tabla_empleados.php';
                }
                ?>
            </div>

        </div>
        <script>
            function redirectToPage(pageURL) {
                window.location.href = pageURL;
            }
        </script>
        <?php
        include '../includes/Includes/rightbar.php';
        ?>
    </div>
</body>
<?php
include '../includes/Includes/footer.php';
?>

</html>
