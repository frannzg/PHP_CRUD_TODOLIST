<?php

// Función para conectar con la base de datos
function dbConnect() {
    $host = "localhost";
    $user = "root";  // Cambia esto con tu usuario
    $password = "";  // Cambia esto con tu contraseña
    $dbname = "todo_list"; // Tu base de datos

    $conn = new mysqli($host, $user, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    return $conn;
}

?>
