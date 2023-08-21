<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <div class="header">Empleados</div>
            <div class="content-categories">
                <div class="label-wrapper">
                    <input class="nav-item" name="nav" type="radio" id="opt-1"  onclick="redirectToPage('libros.php')">
                    <label class="category" for="opt-1">Libros</label>
                </div>
                <div class="label-wrapper">
                    <input class="nav-item" name="nav" type="radio" id="opt-2" checked onclick="redirectToPage('prestamos.php')">
                    <label class="category" for="opt-2">Préstamos</label>
                </div>
                <div class="label-wrapper">
                    <input class="nav-item" name="nav" type="radio" id="opt-3"  onclick="redirectToPage('clientes.php')">
                    <label class="category" for="opt-3">Clientes</label>
                </div>
            </div>

            <div class="tasks-wrapper">

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

</html>