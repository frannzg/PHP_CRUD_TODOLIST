<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="number"] {
            padding: 8px;
            width: 300px;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            color: blue;
            text-decoration: none;
            margin-right: 10px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <h1>Lista de Tareas</h1>

    <!-- Formulario para crear tarea -->
    <h3>Agregar Nueva Tarea</h3>
    <form method="POST" action="index.php">
        <label for="nombre">Nombre de la tarea:</label>
        <input type="text" name="nombre" placeholder="Nombre de la tarea" required><br><br>
        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" placeholder="Cantidad" required><br><br>
        <button type="submit" name="create">Crear Tarea</button>
    </form>

    <!-- Mostrar tareas -->
    <h2>Tareas</h2>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Acciones</th>
        </tr>

        <?php foreach ($tareas as $tarea): ?>
            <tr>
                <td><?php echo htmlspecialchars($tarea['nombre']); ?></td>
                <td><?php echo htmlspecialchars($tarea['cantidad']); ?></td>
                <td>

                    <div style="    display: flex; flex-direction: row; gap: 1rem;">
                        <div>
                            <button>
                                <!-- Enlace para editar tarea -->
                                <a href="index.php?edit=<?php echo $tarea['id']; ?>"><span style="color: white;">Editar</span></a>
                            </button>
                        </div>
                        <div>
                            <button>
                                <!-- Enlace para eliminar tarea -->
                                <a href="index.php?delete=<?php echo $tarea['id']; ?>">Eliminar</a>
                            </button>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php
    // Si se va a editar una tarea, mostrar el formulario de edición
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $sql = "SELECT * FROM tasks WHERE id = $id";
        $result = $conn->query($sql);
        $task = $result->fetch_assoc();
    ?>

        <!-- Formulario para editar tarea -->
        <h3>Editar Tarea</h3>
        <form method="POST" action="index.php">
            <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
            <label for="nombre">Nombre de la tarea:</label>
            <input type="text" name="nombre" value="<?php echo htmlspecialchars($task['nombre']); ?>" required><br><br>
            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" value="<?php echo $task['cantidad']; ?>" required><br><br>
            <button type="submit" name="update">Actualizar Tarea</button>
        </form>

    <?php } ?>

</body>

</html>