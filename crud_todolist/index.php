<?php
// Incluir el modelo y controlador
include_once 'model/model.php';
include_once 'controller/controller.php';

// Conectar a la base de datos
$conn = dbConnect();

// Inicializar el controlador
$controller = new Controller($conn);

// Acciones de la aplicación
if (isset($_POST['create'])) {
    $controller->createTask($_POST['nombre'], $_POST['cantidad']);
}

if (isset($_POST['update'])) {
    $controller->updateTask($_POST['id'], $_POST['nombre'], $_POST['cantidad']);
}

if (isset($_GET['delete'])) {
    $controller->deleteTask($_GET['delete']);
}

$tareas = $controller->getTasks();

// Incluir la vista para mostrar tareas
include_once 'view/mainView.php';
?>
