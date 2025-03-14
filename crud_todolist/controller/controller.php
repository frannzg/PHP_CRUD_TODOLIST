<?php

class Controller {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Crear tarea
    public function createTask($nombre, $cantidad) {
        $sql = "INSERT INTO tasks (nombre, cantidad) VALUES ('$nombre', '$cantidad')";
        if ($this->conn->query($sql) === TRUE) {
            echo "Nueva tarea creada con éxito";
        } else {
            echo "Error al crear la tarea: " . $this->conn->error;
        }
    }

    // Obtener tareas
    public function getTasks() {
        $sql = "SELECT * FROM tasks";
        $result = $this->conn->query($sql);
        $tareas = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $tareas[] = $row;
            }
        }
        return $tareas;
    }

    // Actualizar tarea
    public function updateTask($id, $nombre, $cantidad) {
        $sql = "UPDATE tasks SET nombre='$nombre', cantidad='$cantidad' WHERE id=$id";
        if ($this->conn->query($sql) === TRUE) {
            echo "Tarea actualizada con éxito";
        } else {
            echo "Error al actualizar la tarea: " . $this->conn->error;
        }
    }

    // Eliminar tarea
    public function deleteTask($id) {
        $sql = "DELETE FROM tasks WHERE id=$id";
        if ($this->conn->query($sql) === TRUE) {
            echo "Tarea eliminada con éxito";
        } else {
            echo "Error al eliminar la tarea: " . $this->conn->error;
        }
    }
}

?>
