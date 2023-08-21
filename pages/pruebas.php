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
        <div class="left-bar">
            <div class="upper-part">
                <div class="actions">
                    <div class="circle"></div>
                    <div class="circle-2"></div>
                </div>
            </div>
            <div class="left-content">

            </div>
        </div>
        <div class="page-content">
            <div class="header">Empleados</div>
            <div class="content-categories">
                <div class="label-wrapper">
                    <input class="nav-item" name="nav" type="radio" id="opt-1">
                    <label class="category" for="opt-1">Libros</label>
                </div>
                <div class="label-wrapper">
                    <input class="nav-item" name="nav" type="radio" id="opt-2" checked>
                    <label class="category" for="opt-2">Prestamos</label>
                </div>
                <div class="label-wrapper">
                    <input class="nav-item" name="nav" type="radio" id="opt-3">
                    <label class="category" for="opt-3">Clientes</label>
                </div>
            </div>
            <div class="content-categories">
                <div class="label-wrapper">
                    <a class="nav-link" href="libros.php">Libros</a>
                </div>
                <div class="label-wrapper">
                    <a class="nav-link" href="prestamos.php">Préstamos</a>
                </div>
                <div class="label-wrapper">
                    <a class="nav-link" href="clientes.php">Clientes</a>
                </div>
            </div>

            <div class="tasks-wrapper">
                <div class="task">
                    <input class="task-item" name="task" type="checkbox" id="item-1" checked>
                    <label for="item-1">
                        <span class="label-text">Dashboard Design Implementation</span>
                    </label>
                    <span class="tag approved">Approved</span>
                </div>
                <div class="task">
                    <input class="task-item" name="task" type="checkbox" id="item-2" checked>
                    <label for="item-2">
                        <span class="label-text">Create a userflow</span>
                    </label>
                    <span class="tag progress">In Progress</span>
                </div>
                <div class="task">
                    <input class="task-item" name="task" type="checkbox" id="item-3">
                    <label for="item-3">
                        <span class="label-text">Application Implementation</span>
                    </label>
                    <span class="tag review">In Review</span>
                </div>
                <div class="task">
                    <input class="task-item" name="task" type="checkbox" id="item-4">
                    <label for="item-4">
                        <span class="label-text">Create a Dashboard Design</span>
                    </label>
                    <span class="tag progress">In Progress</span>
                </div>
                <div class="task">
                    <input class="task-item" name="task" type="checkbox" id="item-5">
                    <label for="item-5">
                        <span class="label-text">Create a Web Application Design</span>
                    </label>
                    <span class="tag approved">Approved</span>
                </div>
                <div class="task">
                    <input class="task-item" name="task" type="checkbox" id="item-6">
                    <label for="item-6">
                        <span class="label-text">Interactive Design</span>
                    </label>
                    <span class="tag review">In Review</span>
                </div>
                <div class="header upcoming">Upcoming Tasks</div>
                <div class="task">
                    <input class="task-item" name="task" type="checkbox" id="item-7">
                    <label for="item-7">
                        <span class="label-text">Dashboard Design Implementation</span>
                    </label>
                    <span class="tag waiting">Waiting</span>
                </div>
                <div class="task">
                    <input class="task-item" name="task" type="checkbox" id="item-8">
                    <label for="item-8">
                        <span class="label-text">Create a userflow</span>
                    </label>
                    <span class="tag waiting">Waiting</span>
                </div>
                <div class="task">
                    <input class="task-item" name="task" type="checkbox" id="item-9">
                    <label for="item-9">
                        <span class="label-text">Application Implementation</span>
                    </label>
                    <span class="tag waiting">Waiting</span>
                </div>
                <div class="task">
                    <input class="task-item" name="task" type="checkbox" id="item-10">
                    <label for="item-10">
                        <span class="label-text">Create a Dashboard Design</span>
                    </label>
                    <span class="tag waiting">Waiting</span>
                </div>
            </div>
        </div>
        <div class="right-bar">

        </div>
    </div>
</body>

</html>